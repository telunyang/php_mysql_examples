<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//使用雙引號，變數可以嵌入字串來顯示
$myVar = "Darren";
echo "Hi, $myVar <br />";
echo "Hi, {$myVar} <br />";
echo "Hi, ${myVar} <br />";

echo "<br /><br />";

//使用單引號括住字串，變數會變成一般字串
echo 'Hi, $myVar <br />';
echo 'Hi, {$myVar} <br />';
echo 'Hi, ${myVar} <br />';
?>
</body>
</html>