<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$setResult = setcookie("myName", "Darren");

if($setResult){
    if(isset($_COOKIE['myName'])) {
        echo "cookie 的內容為: " . $_COOKIE['myName'];
    } else {
        echo "cookie 儲存成功，請重新整理頁面。";
    }
}
?>
</body>
</html>