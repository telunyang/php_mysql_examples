<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//只要 $i 「不是奇數」，就會執行 break;，直接跳出 for()
for($i = 1; $i <= 10; $i++) {
    if($i % 2 != 0) {
        echo $i."&nbsp;";
    } else {
        break;
    }
}
?>
</body>
</html>