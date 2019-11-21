<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "   <a href='https://www.iii.org.tw/' target='_blank'>超連結</a>''''(年年歲歲花相似?歲歲年年人不同.)\n[http://www.epochtimes.com/b5/17/2/2/n8770329.htm]***%%%---   ";
echo "原始字串: ".$strVar;
echo "<br /><br />";
echo "nl2br: ".nl2br($strVar);
echo "<br /><br />";
echo "strip_tags: ".strip_tags($strVar);
echo "<br /><br />";
echo "quotemeta: ".quotemeta($strVar);
echo "<br /><br />";
echo "addcslashes: ".addcslashes($strVar, '%-');
echo "<br /><br />";
echo "addslashes: ".addslashes($strVar);
echo "<br /><br />";
echo "stripcslashes: ".stripcslashes($strVar);
echo "<br /><br />";
echo "stripslashes: ".stripslashes($strVar);
echo "<br /><br />";
echo "trim: ".trim($strVar);
echo "<br /><br />";
echo "ltrim: ".ltrim($strVar);
echo "<br /><br />";
echo "rtrim: ".rtrim($strVar);
?>
</body>
</html>