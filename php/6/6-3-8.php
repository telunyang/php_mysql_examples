<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar01 = "Alex";
$strVar02 = "Bill";
$strVar03 = "alex";
echo "Alex 比對 Bill: ".strcmp($strVar01, $strVar02);
echo "<hr />";
echo "Bill 比對 Alex: ".strcmp($strVar02, $strVar01);
echo "<hr />";
echo "Alex 比對 alex (不分大小寫): ".strcasecmp($strVar01, $strVar03);
?>
</body>
</html>