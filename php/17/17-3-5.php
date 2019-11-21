<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
setcookie("students[name]", "Darren");
setcookie("students[age]", 18);
setcookie("students[height]", 171);
setcookie("students[weight]", 80);

if(isset($_COOKIE['students'])) {
    echo "您的姓名: " . $_COOKIE['students']['name'] ."<br />";
    echo "您的姓名: " . $_COOKIE['students']['age'] ."<br />";
    echo "您的姓名: " . $_COOKIE['students']['height'] ."<br />";
    echo "您的姓名: " . $_COOKIE['students']['weight'] ."<br />";
} else {
    echo "cookie 儲存成功，請重新整理頁面。";
}
?>
</body>
</html>