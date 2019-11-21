<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
/**
 * 讓函式返回(回傳)值
 */

//定義第一個函式，取得地點
function getPlace(){
    return "[資策會]";
}

//定義第二個函式，取得身分
function getIdentity(){
    return "[學生]";
}

//定義第三個函式，取得課程
function getCourse(){
    return "[PHP & MySQL(MariaDB)]";
}

$strPlace = getPlace();
$strIdentity = getIdentity();
$strCourse = getCourse();

echo "我在 {$strPlace} 的角色是 {$strIdentity}，我正在學習 {$strCourse}";
?>
</body>
</html>