<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
try {
    /**
     * 預期執行的程式。
     * 若是發生預期外的事，
     * 則 catch() 會捕捉錯誤訊息
     */
    $j = 10;
    for($i = 1; $i <= $j; $i++) {
        echo $i." ";
    }
} catch (Exception $e) {
    // try 區塊發生錯訊，會由這個區塊處理
    echo $e->getMessage();
} finally {
    //無論前面有沒有例外，最後都會執行
    echo 'try catch 結束';
}
?>
</body>
</html>