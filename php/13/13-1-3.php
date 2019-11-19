<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//自訂函式 sumNum，給兩個參數，各自的預設值 0
function sumNum($num1 = 0, $num2 = 0){
    echo "$num1 + $num2 = ";
    echo $num1+$num2."<br />";
}

//呼叫函式的時候，括號裡面所放的，稱為之引號（arguments）
sumNum(); //若是沒有引數，則以自訂函式參數的預設值為主
sumNum(1); //只有一個引數，代表會傳遞到自訂函式的 $num1
sumNum(5, 6); //引數分別為 5 跟 6，代表自訂函式的 $num1 和 $num2
?>
</body>
</html>