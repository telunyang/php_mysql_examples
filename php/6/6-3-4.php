<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "資策會數位教育研究所，資訊，數位，教育，研究";
echo "原始字串: ".$strVar;
echo "<hr />";
echo "substr: ".substr($strVar, 9, 21);
echo "<hr />";
echo "mb_substr: ".mb_substr($strVar, 3, 7);
echo "<hr />";
echo "str_replace: ".str_replace("數位", "digital", $strVar);
echo "<hr />";
echo "str_pad: ".str_pad($strVar, 70, "=", STR_PAD_RIGHT);
echo "<hr />";
echo "str_repeat: ".str_repeat($strVar, 2);
?>
</body>
</html>