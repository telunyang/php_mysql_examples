<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
echo "邏輯運算子";
echo "<hr />";
echo "(true and true) 的結果: ";
echo ((true and true) ? 'true' : 'false');
echo "<hr />";
echo "(true && true) 的結果: ";
echo ((true && true) ? 'true' : 'false');
echo "<hr />";
echo "(true or false) 的結果: ";
echo ((true or false) ? 'true' : 'false');
echo "<hr />";
echo "(false || false) 的結果: ";
echo ((false || false) ? 'true' : 'false');
echo "<hr />";
echo "(true xor true) 的結果: ";
echo ((true xor true) ? 'true' : 'false');
echo "<hr />";
echo "(!true) 的結果: ";
echo ((!true) ? 'true' : 'false');
?>
</body>
</html>