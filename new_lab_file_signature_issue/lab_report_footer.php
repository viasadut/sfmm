<?php

if (!function_exists('lab_footer_rows')) {

    /* run a SELECT against PDO or mysqli, return array of assoc rows */
    function lab_footer_rows($conn, $sql)
    {
        $out = array();
        if ($conn instanceof PDO) {
            $st = $conn->query($sql);
            if ($st) {
                $out = $st->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $r = mysqli_query($conn, $sql);
            if ($r) {
                while ($x = mysqli_fetch_assoc($r)) {
                    $out[] = $x;
                }
            }
        }
        return $out;
    }

    /* escape a value for either driver */
    function lab_footer_esc($conn, $v)
    {
        if ($conn instanceof PDO) {
            $q = $conn->quote((string)$v);
            return substr($q, 1, -1);          // strip the surrounding quotes
        }
        return mysqli_real_escape_string($conn, (string)$v);
    }

    /* Resolve subtype from a report filename (only reliable when 1:1). */
    function lab_subtype_for_report($conn, $basename)
    {
        $b = lab_footer_esc($conn, $basename);
        $rows = lab_footer_rows(
            $conn,
            "SELECT DISTINCT subtype FROM radio WHERE type='lab' AND report='$b' AND subtype<>''"
        );
        if (count($rows) === 1) {
            return $rows[0]['subtype'];
        }
        return '';   // ambiguous or unknown -> caller must pass subtype explicitly
    }

    function lab_footer_block($pdf, $x, $y, $w, $label, $name, $desig, $sig)
    {
        $labelH = 3.5;
        $sigH = 10;
        $nameH = 4;
        $desigH = 3.5;

        // 1. label
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell($w, $labelH, $label, 0, 2, 'C');

        // 2. signature (scaled to fit the band, aspect ratio preserved; band kept even if
        //    empty so every block in the row stays aligned)
        if ($sig !== '') {
            $path = (strpos($sig, ':') !== false || $sig[0] === '/') ? $sig : __DIR__ . '/' . $sig;
            if (@is_file($path)) {
                $boxW = 30;
                $boxH = $sigH;
                if ($boxW > $w - 2) $boxW = $w - 2;          // never wider than the column
                $sz = @getimagesize($path);
                if ($sz && $sz[0] > 0 && $sz[1] > 0) {
                    $imgW = $boxW;
                    $imgH = $imgW * $sz[1] / $sz[0];
                    if ($imgH > $boxH) {                       // tall image: fit by height instead
                        $imgH = $boxH;
                        $imgW = $imgH * $sz[0] / $sz[1];
                    }
                    @$pdf->Image(
                        $path,
                        $x + ($w - $imgW) / 2,               // centred in the column
                        $y + $labelH + ($boxH - $imgH) / 2,  // centred in the band
                        $imgW,
                        $imgH
                    );
                }
            }
        }

        // 3. name
        $pdf->SetXY($x, $y + $labelH + $sigH);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell($w, $nameH, $name, 0, 2, 'C');

        // 4. designation (may wrap to 2 lines)
        $pdf->SetXY($x, $y + $labelH + $sigH + $nameH);
        $pdf->SetFont('Times', '', 8);
        $pdf->MultiCell($w, $desigH, $desig, 0, 'C');

        return $labelH + $sigH + $nameH + 2 * $desigH;   // block height incl. 2 designation lines
    }

    /**
     * Render the whole approval-flow footer.
     *
     * @param object       $pdf       FPDF/PDF_Code128 instance (unit mm)
     * @param PDO|mysqli   $conn      db connection
     * @param string       $subtype   category; '' => auto lookup by filename
     * @param string       $resultby  staff login id (alltest/iinves/einves.resultby)
     * @param string       $checkedByActual  report row's own checked_by (alltest/iinves/einves)
     * @param string       $consultByActual  report row's own consultant value (alltest.cby; iinves/einves.conby)
     * @param array        $opts      optional: cols (default 3), startY (default current Y)
     */
    function lab_render_approval_footer($pdf, $conn, $subtype = '', $resultby = '', $checkedByActual = '', $consultByActual = '', $opts = array())
    {

        if ($subtype === '') {
            $self    = basename($_SERVER['SCRIPT_FILENAME']);
            $subtype = lab_subtype_for_report($conn, $self);
        }

        /* ---- Result Updated By (from staff3 by login id) ---- */
        $upName = '';
        $upDesig = '';
        if ($resultby !== '') {
            $rb   = lab_footer_esc($conn, $resultby);
            $srow = lab_footer_rows($conn, "SELECT sname, desig FROM staff3 WHERE sid='$rb' LIMIT 1");
            if ($srow) {
                $upName = $srow[0]['sname'];
                $upDesig = $srow[0]['desig'];
            }
        }

        /* ---- Checked-by & Consultant: only the person who actually signed off THIS report ---- */
        $checked = array();
        $consult = array();
        if ($subtype !== '' && ($checkedByActual !== '' || $consultByActual !== '')) {
            $se    = lab_footer_esc($conn, $subtype);
            $conds = array();
            if ($checkedByActual !== '') $conds[] = "(f.role='checked' AND TRIM(f.uname)=TRIM('" . lab_footer_esc($conn, $checkedByActual) . "'))";
            if ($consultByActual !== '') $conds[] = "(f.role='consultant' AND TRIM(f.uname)=TRIM('" . lab_footer_esc($conn, $consultByActual) . "'))";
            $rows = lab_footer_rows(
                $conn,
                "SELECT f.role, f.uname,
                        COALESCE(NULLIF(s.fullname,''), f.uname)  AS nm,
                        COALESCE(s.designation,'')                AS dg,
                        COALESCE(s.signature,'')                  AS sg
                 FROM lab_approval_flow f
                 LEFT JOIN lab_signature s ON s.uname = f.uname
                 WHERE f.subtype='$se' AND f.status='active' AND (" . implode(' OR ', $conds) . ")
                 ORDER BY f.role, f.sort_order, f.id"
            );
            foreach ($rows as $r) {
                if ($r['role'] === 'checked')    $checked[] = $r;
                if ($r['role'] === 'consultant') $consult[] = $r;
            }
        }

        /* ---- build ordered block list ---- */
        $blocks = array();
        $blocks[] = array('label' => 'Result Updated By', 'name' => $upName, 'desig' => $upDesig, 'sig' => '');
        foreach ($checked as $r) {
            $blocks[] = array('label' => 'Result Checked By', 'name' => $r['nm'], 'desig' => $r['dg'], 'sig' => $r['sg']);
        }
        foreach ($consult as $r) {
            $blocks[] = array('label' => 'Consultant',        'name' => $r['nm'], 'desig' => $r['dg'], 'sig' => $r['sg']);
        }

        /* ---- layout ---- */
        $cols   = isset($opts['cols']) ? (int)$opts['cols'] : 3;
        if ($cols < 1) $cols = 1;

        // page width + margins, defensively (works for FPDF public props and TCPDF getters)
        if (method_exists($pdf, 'getPageWidth'))      $pageW = $pdf->getPageWidth();
        elseif (isset($pdf->w))                       $pageW = $pdf->w;
        else                                         $pageW = 210;
        if (method_exists($pdf, 'getMargins')) {
            $mg = $pdf->getMargins();
            $lm = $mg['left'];
            $rm = $mg['right'];
        } elseif (isset($pdf->lMargin)) {
            $lm = $pdf->lMargin;
            $rm = $pdf->rMargin;
        } else {
            $lm = 17;
            $rm = 10;
        }

        $usableW = $pageW - $lm - $rm;
        $blockW  = $usableW / $cols;
        $startX  = $lm;
        $rowH    = 25;                       // per-row height (mm), matches lab_footer_block()

        $startY = isset($opts['startY']) ? $opts['startY'] : $pdf->GetY() + 3;

        $rowsNeeded = (int)ceil(count($blocks) / $cols);
        $needed     = $rowsNeeded * $rowH;

        if (method_exists($pdf, 'getPageHeight'))     $pageH = $pdf->getPageHeight();
        elseif (isset($pdf->h))                       $pageH = $pdf->h;
        else                                         $pageH = 297;
        // top/bottom margins: public props on FPDF, getMargins() on TCPDF
        $mgs  = method_exists($pdf, 'getMargins') ? $pdf->getMargins() : array();
        if (isset($pdf->tMargin))        $topM = $pdf->tMargin;
        elseif (isset($mgs['top']))      $topM = $mgs['top'];
        else                            $topM = 10;

        $safetyBottom = isset($opts['safetyBottom']) ? (float)$opts['safetyBottom'] : 10;
        $bottomLimit  = $pageH - $safetyBottom;

        if ($startY + $needed > $bottomLimit) {
            $orient = isset($pdf->CurOrientation) ? $pdf->CurOrientation : '';
            $pdf->AddPage($orient);
            $startY = $topM;
        }

        // suspend auto page break while the blocks are drawn, then restore it
        $prevAuto    = isset($pdf->AutoPageBreak) ? $pdf->AutoPageBreak : true;
        $prevBMargin = isset($pdf->bMargin) ? $pdf->bMargin
            : (isset($mgs['bottom']) ? $mgs['bottom'] : 20);
        if (method_exists($pdf, 'SetAutoPageBreak')) $pdf->SetAutoPageBreak(false);

        $i = 0;
        foreach ($blocks as $b) {
            $col = $i % $cols;
            $row = intdiv($i, $cols);
            $x = $startX + $col * $blockW;
            $y = $startY + $row * $rowH;
            lab_footer_block($pdf, $x, $y, $blockW, $b['label'], $b['name'], $b['desig'], $b['sig']);
            $i++;
        }

        if (method_exists($pdf, 'SetAutoPageBreak')) $pdf->SetAutoPageBreak($prevAuto, $prevBMargin);

        // leave cursor below the footer, clamped so a trailing Ln() cannot spawn a blank page
        $endY = $startY + $needed;
        if ($endY > $bottomLimit) $endY = $bottomLimit;
        $pdf->SetXY($startX, $endY);
    }
}
