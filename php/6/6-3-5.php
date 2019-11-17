<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "你好，我是 %s ，我今年 %d 歲，身高 %d 公分，體重 %d 公斤";
echo "原始字串: ".$strVar;
echo "<hr />";
$name = "Darren";
$age = 18;
$height = 171;
$weight = 80;
printf($strVar, $name, $age, $height, $weight); //這裡不用 echo 或 print
echo "<hr />";
$strPrintf = sprintf($strVar, $name, $age, $height, $weight);
echo $strPrintf;
echo "<hr />";
$arr = [$name, $age, $height, $weight];
vprintf($strVar, $arr);
echo "<hr />";
$strVsprintf = vsprintf($strVar, $arr);
echo $strVsprintf;
?>
</body>
</html>