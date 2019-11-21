<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//建立一個空陣列
$arr = array();

$arr[0] = "";
$arr[1] = 0;
$arr[2] = 10;
$arr[3] = NULL;

echo '$a[0] 是否為空? ';
echo empty($arr[0]) ? '為空' : '不為空';
echo "<hr />";
echo '$a[1] 是否為空? ';
echo empty($arr[1]) ? '為空' : '不為空';
echo "<hr />";
echo '$a[2] 是否為空? ';
echo empty($arr[2]) ? '為空' : '不為空';
echo "<hr />";
echo '$a[3] 是否為空? ';
echo empty($arr[3]) ? '為空' : '不為空';
?>
</body>
</html>