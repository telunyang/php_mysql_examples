<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
/**
 * 讓函式內部直接輸出文字，不用返回(回傳)任何值
 */

//定義第一個函式，印出地點
function getPlace(){
    echo "[資策會]";
}

//定義第二個函式，印出身分
function getIdentity(){
    echo "[學生]";
}

//定義第三個函式，印出課程
function getCourse(){
    echo "[PHP & MySQL(MariaDB)]";
}

echo "我在 ";
getPlace();
echo " 的角色是 ";
getIdentity();
echo "，我正在學習 ";
getCourse();
?>
</body>
</html>