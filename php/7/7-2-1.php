<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$numVar01 = 3;
$numVar02 = 4;
$numVar03 = 7;
$numVar04 = "7";
echo "比較運算子";
echo "<hr />";
echo "($numVar01 == $numVar02) 的結果: ";
echo ($numVar01 == $numVar02) ? 'true' : 'false';
echo "<hr />";
echo "($numVar03 == '$numVar04') 的結果: ";
echo ($numVar03 == $numVar04) ? 'true' : 'false';
echo "<hr />";
echo "($numVar03 === '$numVar04') 的結果: ";
echo ($numVar03 === $numVar04) ? 'true' : 'false';
echo "<hr />";
echo "($numVar01 != $numVar02) 的結果: ";
echo ($numVar01 != $numVar02) ? 'true' : 'false';
echo "<hr />";
echo "($numVar03 !== '$numVar04') 的結果: ";
echo ($numVar03 !== $numVar04) ? 'true' : 'false';
echo "<hr />";
echo "($numVar01 < $numVar02) 的結果: ";
echo ($numVar01 < $numVar02) ? 'true' : 'false';
echo "<hr />";
echo "($numVar01 > $numVar02) 的結果: ";
echo ($numVar01 > $numVar02) ? 'true' : 'false';
echo "<hr />";
echo "($numVar01 <= $numVar02) 的結果: ";
echo ($numVar01 <= $numVar02) ? 'true' : 'false';
echo "<hr />";
echo "($numVar01 >= $numVar02) 的結果: ";
echo ($numVar01 >= $numVar02) ? 'true' : 'false';
?>
</body>
</html>