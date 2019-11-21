<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$msg = "這是全域變數<br />";
function showMsg(){
    global $msg;
    $msg = "這是區域變數<br />";
    echo $msg;
}
echo $msg; //先輸出全域變數的值
showMsg(); //函式中，使用 global 指令，將區域變數 $msg，變成全域變數
echo $msg; //最後輸出 $msg，發現全域 $msg 的值，在函式中被改變了
?>
</body>
</html>