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
     * 則 catch() 會捕捉錯誤訊息，
     * new Exception() 裡面的引數，
     * 會透過 catch 捕捉後，
     * 用 Exception $e 的 $e->getMessage(); 
     * 來顯示自訂文字輸出
     */
    throw new Exception('發生錯誤');
} catch (Exception $e) {
    // try 區塊發生錯訊，會由這個區塊處理
    echo "我的例外訊息: ".$e->getMessage();
} finally {
    //無論前面有沒有例外，最後都會執行
    echo 'try catch 結束';
}
?>
</body>
</html>