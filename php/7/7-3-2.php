<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$var01 = 5;
$var02 = ($var01 > 0 && $var01 < 10) ? '是個位數' : '不是個位數';
echo "邏輯運算子";
echo "<hr />";
echo '$var01 = '.$var01;
echo "<hr />";
echo '$var01' . $var02;
?>
</body>
</html>