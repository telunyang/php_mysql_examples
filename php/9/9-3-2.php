<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
//只要 $i 「不是奇數」，不會立刻結束迴圈，而是 $++ 後，繼續執行迴圈內的程式內容
for($i = 1; $i <= 10; $i++) {
    if($i % 2 != 0) {
        echo $i."&nbsp;";
    } else {
        continue;
    }
}
?>
</body>
</html>