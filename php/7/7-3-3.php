<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$a = 3;
$b = 5;

echo '$a = ' . $a;
echo "<br />";
echo '$b = ' . $b;
echo "<br />";

$a += $b; //等同於 $a = $a + $b;
echo '$a += $b 等於 '.$a;
?>
</body>
</html>