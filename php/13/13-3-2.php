<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$x = 2;
function showDouble(&$x){
    $x = $x * 2;
    echo "函式中的值為: " . $x . "<br />";
}
showDouble($x);
echo "函式外的值為: ".$x;
?>
</body>
</html>