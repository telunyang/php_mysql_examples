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
echo "<br /><br />";
echo "strlen (一個 utf-8 中文字，佔 3 個字元): ".strlen($strVar);
echo "<br /><br />";
echo "mb_strlen: ".mb_strlen($strVar);
echo "<br /><br />";
echo "strpos (一個 utf-8 中文字，佔 3 個字元): ".strpos($strVar, "所");
echo "<br /><br />";
echo "mb_strpos: ".mb_strpos($strVar, "所");
echo "<br /><br />";
echo "substr_count: ".substr_count($strVar, "所");
?>
</body>
</html>