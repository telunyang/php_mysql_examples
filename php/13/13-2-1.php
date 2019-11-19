<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$msg = "這是全域變數<br />"; //這裡的 $msg，與區域變數互不侵犯
function showMsg(){
    $msg = "這是區域變數<br />"; //同樣的名稱，這裡的 $msg，不會影響到全域變數
    echo $msg;
}
echo $msg; //先輸出全域變數的值
showMsg(); //透過函式輸出區域變數的值
echo $msg; //最後再輸出全域變數的值
?>
</body>
</html>