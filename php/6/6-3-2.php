<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "洛陽城東桃李花 飛來飛去落誰家 洛陽女兒顏色好 坐見落花長嘆息 今年花落顏色改 明年花落復誰在 已見松柏摧為薪 更聞桑田變滄海 古人無復洛陽東 今人還對落花風 年年歲歲花相似 歲歲年年人不同";
echo "原始字串: ".$strVar;
echo "<hr />";

$arrExplode = explode(" ", $strVar);
echo "<pre>";
print_r($arrExplode);
echo "</pre>";

echo "<hr />";

$arrImplode = implode("-", $arrExplode);
echo "<pre>";
print_r($arrImplode);
echo "</pre>";

echo "<hr />";

$arrImplode = join("～", $arrExplode);
echo "<pre>";
print_r($arrImplode);
echo "</pre>";
?>
</body>
</html>