<?php
$lang = (isset($_GET['lang']) && $_GET['lang'] === 'en') ? 'en' : 'bn';
$title = $lang === 'en' ? 'Operation Theater - Patient Status' : 'অপারেশন থিয়েটার - রোগীর অবস্থা';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlspecialchars($title); ?></title>
<style>
    * { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; background: #0b1f33; color: #12263a; font-family: "Nirmala UI", "Noto Sans Bengali", "SolaimanLipi", "Segoe UI", Arial, sans-serif; }
    .topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 16px 28px; background: #0d3b66; color: #fff; border-bottom: 4px solid #f4a259; }
    .topbar h1 { margin: 0; font-size: 30px; font-weight: 700; letter-spacing: .5px; }
    .right { display: flex; align-items: center; gap: 18px; }
    .lang a { color: #cfe0f0; text-decoration: none; font-size: 18px; font-weight: 700; padding: 4px 10px; border-radius: 6px; }
    .lang a.active { background: #f4a259; color: #0b1f33; }
    #span { font-size: 26px; font-weight: 700; white-space: nowrap; }
    .wrap { padding: 18px 28px 28px; }
    table.board { border-collapse: collapse; width: 100%; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,.35); }
    table.board th, table.board td { padding: 16px 20px; font-size: 30px; text-align: left; border-bottom: 1px solid #dbe4ec; }
    table.board thead th { background: #14507f; color: #fff; font-size: 22px; letter-spacing: .5px; }
    table.board tbody tr:nth-child(even) { background: #f2f7fb; }
    .col-no { width: 90px; text-align: center; color: #6b7c8d; }
    td.col-no { text-align: center; }
    .col-name { font-weight: 700; }
    .col-mrn { white-space: nowrap; }
    .empty { text-align: center; font-size: 30px; color: #6b7c8d; padding: 60px 18px; }
    .badge { display: inline-block; padding: 8px 20px; border-radius: 999px; font-size: 24px; font-weight: 700; color: #fff; white-space: nowrap; }
    .st-ot { background: #1971c2; }
    .st-obs { background: #e8850c; }
    .st-bed { background: #2f9e44; }
    .st-icu { background: #b02a37; }
    #txtHint .loading { color: #cdd9e5; font-size: 26px; padding: 40px 0; }
</style>
<script>
    var BOARD_LANG = "<?php echo $lang; ?>";
    function showUser() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "board_data.php?lang=" + BOARD_LANG + "&t=" + new Date().getTime(), true);
        xmlhttp.send();
    }
    showUser();
    setInterval(function() { showUser(); }, 10000);
</script>
</head>
<body>

<div class="topbar">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <div class="right">
        <div class="lang">
            <a href="board.php?lang=bn" class="<?php echo $lang === 'bn' ? 'active' : ''; ?>">বাংলা</a>
            <a href="board.php?lang=en" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">English</a>
        </div>
        <div id="span"></div>
    </div>
</div>

<div class="wrap">
    <div id="txtHint"><div class="loading">&hellip;</div></div>
</div>

<script>
    var span = document.getElementById('span');
    function time() {
        var d = new Date();
        var day = d.getDate(), month = d.getMonth() + 1, year = d.getFullYear();
        var s = d.getSeconds(), m = d.getMinutes(), h = d.getHours();
        span.textContent =
            ("0" + day).substr(-2) + "/" + ("0" + month).substr(-2) + "/" + year + " " +
            ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
    }
    time();
    setInterval(time, 1000);
</script>

</body>
</html>
