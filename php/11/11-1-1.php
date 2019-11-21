<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "when,you,say,nothing,at,all";
echo "原始字串: ".$strVar;
echo "<hr />";

$arrExplode = explode(",", $strVar);
echo "<pre>";
print_r($arrExplode);
echo "</pre>";
?>
</body>
</html>