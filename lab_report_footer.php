<?php
/* =====================================================================
   Reusable lab report footer (approval flow)
   ---------------------------------------------------------------------
   Renders, for a given Category (radio.subtype):
     - Result Updated By  (name + designation, NO signature)
     - Result Checked By  (label, signature, name, designation)  x N
     - Consultant         (label, signature, name, designation)  x N

   Order inside every signatory block:
        1. Role label   2. Signature   3. Name   4. Designation

   Usage inside any FPDF-based lab report page (unit = mm):
        require_once('lab_report_footer.php');
        lab_render_approval_footer($pdf, $conn, $subtype, $resultby);

   $conn may be a PDO or a mysqli connection (both supported).
   $resultby is the staff login id stored in alltest/iinves/einves.resultby.
   $subtype  is the category. If '' it is looked up from radio by the
             calling script's filename (works for 1:1 report files).
   ===================================================================== */

if(!function_exists('lab_footer_rows')){

    /* run a SELECT against PDO or mysqli, return array of assoc rows */
    function lab_footer_rows($conn, $sql){
        $out = array();
        if($conn instanceof PDO){
            $st = $conn->query($sql);
            if($st){ $out = $st->fetchAll(PDO::FETCH_ASSOC); }
        } else {
            $r = mysqli_query($conn, $sql);
            if($r){ while($x = mysqli_fetch_assoc($r)){ $out[] = $x; } }
        }
        return $out;
    }

    /* escape a value for either driver */
    function lab_footer_esc($conn, $v){
        if($conn instanceof PDO){
            $q = $conn->quote((string)$v);
            return substr($q, 1, -1);          // strip the surrounding quotes
        }
        return mysqli_real_escape_string($conn, (string)$v);
    }

    /* Resolve subtype from a report filename (only reliable when 1:1). */
    function lab_subtype_for_report($conn, $basename){
        $b = lab_footer_esc($conn, $basename);
        $rows = lab_footer_rows($conn,
            "SELECT DISTINCT subtype FROM radio WHERE type='lab' AND report='$b' AND subtype<>''");
        if(count($rows) === 1){ return $rows[0]['subtype']; }
        return '';   // ambiguous or unknown -> caller must pass subtype explicitly
    }

    /* Draw one vertical signatory block at (x,y) within width w. Returns height used (mm). */
    function lab_footer_block($pdf, $x, $y, $w, $label, $name, $desig, $sig){
        $labelH = 4; $sigH = 13; $nameH = 4;

        // 1. label
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell($w, $labelH, $label, 0, 2, 'C');

        // 2. signature (image centred in the sig band; band kept even if empty for alignment)
        if($sig !== ''){
            $path = (strpos($sig, ':') !== false || $sig[0] === '/') ? $sig : __DIR__.'/'.$sig;
            if(@is_file($path)){
                $imgW = 34; $imgH = 12;
                @$pdf->Image($path, $x + ($w - $imgW) / 2, $y + $labelH + 0.5, $imgW, $imgH);
            }
        }

        // 3. name
        $pdf->SetXY($x, $y + $labelH + $sigH);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell($w, $nameH, $name, 0, 2, 'C');

        // 4. designation (may wrap to 2 lines)
        $pdf->SetXY($x, $y + $labelH + $sigH + $nameH);
        $pdf->SetFont('Times', '', 8);
        $pdf->MultiCell($w, 3.5, $desig, 0, 'C');

        return $labelH + $sigH + $nameH + 8;   // ~ block height incl. designation area
    }

    /**
     * Render the whole approval-flow footer.
     *
     * @param object       $pdf       FPDF/PDF_Code128 instance (unit mm)
     * @param PDO|mysqli   $conn      db connection
     * @param string       $subtype   category; '' => auto lookup by filename
     * @param string       $resultby  staff login id (alltest/iinves/einves.resultby)
     * @param array        $opts      optional: cols (default 3), startY (default current Y)
     */
    function lab_render_approval_footer($pdf, $conn, $subtype = '', $resultby = '', $opts = array()){

        if($subtype === ''){
            $self    = basename($_SERVER['SCRIPT_FILENAME']);
            $subtype = lab_subtype_for_report($conn, $self);
        }

        /* ---- Result Updated By (from staff3 by login id) ---- */
        $upName = ''; $upDesig = '';
        if($resultby !== ''){
            $rb   = lab_footer_esc($conn, $resultby);
            $srow = lab_footer_rows($conn, "SELECT sname, desig FROM staff3 WHERE sid='$rb' LIMIT 1");
            if($srow){ $upName = $srow[0]['sname']; $upDesig = $srow[0]['desig']; }
        }

        /* ---- Checked-by & Consultant from the approval flow ---- */
        $checked = array(); $consult = array();
        if($subtype !== ''){
            $se   = lab_footer_esc($conn, $subtype);
            $rows = lab_footer_rows($conn,
                "SELECT f.role, f.uname,
                        COALESCE(NULLIF(s.fullname,''), f.uname)  AS nm,
                        COALESCE(s.designation,'')                AS dg,
                        COALESCE(s.signature,'')                  AS sg
                 FROM lab_approval_flow f
                 LEFT JOIN lab_signature s ON s.uname = f.uname
                 WHERE f.subtype='$se' AND f.status='active'
                 ORDER BY f.role, f.sort_order, f.id");
            foreach($rows as $r){
                if($r['role'] === 'checked')    $checked[] = $r;
                if($r['role'] === 'consultant') $consult[] = $r;
            }
        }

        /* ---- build ordered block list ---- */
        $blocks = array();
        $blocks[] = array('label'=>'Result Updated By', 'name'=>$upName, 'desig'=>$upDesig, 'sig'=>'');
        foreach($checked as $r){ $blocks[] = array('label'=>'Result Checked By', 'name'=>$r['nm'], 'desig'=>$r['dg'], 'sig'=>$r['sg']); }
        foreach($consult as $r){ $blocks[] = array('label'=>'Consultant',        'name'=>$r['nm'], 'desig'=>$r['dg'], 'sig'=>$r['sg']); }

        /* ---- layout ---- */
        $cols   = isset($opts['cols']) ? (int)$opts['cols'] : 3;
        if($cols < 1) $cols = 1;

        // page width + margins, defensively (works for FPDF public props and TCPDF getters)
        if(method_exists($pdf, 'getPageWidth'))      $pageW = $pdf->getPageWidth();
        elseif(isset($pdf->w))                       $pageW = $pdf->w;
        else                                         $pageW = 210;
        if(method_exists($pdf, 'getMargins')){
            $mg = $pdf->getMargins(); $lm = $mg['left']; $rm = $mg['right'];
        } elseif(isset($pdf->lMargin)){
            $lm = $pdf->lMargin; $rm = $pdf->rMargin;
        } else { $lm = 17; $rm = 10; }

        $usableW = $pageW - $lm - $rm;
        $blockW  = $usableW / $cols;
        $startX  = $lm;
        $rowH    = 29;                       // per-row height (mm)

        $startY = isset($opts['startY']) ? $opts['startY'] : $pdf->GetY() + 6;

        // page-break guard if the block set won't fit
        $rowsNeeded = (int)ceil(count($blocks) / $cols);
        if(method_exists($pdf, 'CheckPageBreak') && is_callable([$pdf, 'CheckPageBreak'])){
            try {
                @$pdf->CheckPageBreak($rowsNeeded * $rowH);
                $startY = $pdf->GetY();
            } catch (\Throwable $e) {
                // CheckPageBreak exists but isn't publicly callable (e.g. TCPDF); skip the guard.
            }
        }

        $i = 0;
        foreach($blocks as $b){
            $col = $i % $cols;
            $row = intdiv($i, $cols);
            $x = $startX + $col * $blockW;
            $y = $startY + $row * $rowH;
            lab_footer_block($pdf, $x, $y, $blockW, $b['label'], $b['name'], $b['desig'], $b['sig']);
            $i++;
        }

        // leave cursor below the footer
        $pdf->SetXY($startX, $startY + $rowsNeeded * $rowH);
    }
}
