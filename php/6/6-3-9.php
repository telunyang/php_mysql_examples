<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "abcd1234";
echo "原始字串: ".$strVar;
echo "<hr />";
echo "md5: ".md5($strVar);
echo "<hr />";
echo "sha1: ".sha1($strVar);
?>
</body>
</html>