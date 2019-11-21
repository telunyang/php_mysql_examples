<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//建立一個空陣列
$a = array();

//也可以寫成這樣; 5.4 版之後支援
$a = [];

//可以在建立陣列時，給予初始值
$a = array(1,2,3);

//可以將陣列變數的值，指派（賦予）到另一個變數，讓該變數擁有陣列變數的值
$b = $a;

echo "<pre>";
print_r($b);
echo "</pre>";
?>
</body>
</html>