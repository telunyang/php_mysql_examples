<?php
//啟動 session
session_start();

//判斷是否登入 (確認先前指派的 session 索引是否存在)
if( !isset($_SESSION['username']) ) {
    //3 秒後跳頁
    header("Refresh: 3; url=./18-3-3.php");
    echo "請確實登入…3秒後自動回登入頁";
    exit();
}

//判斷是否登入
if(isset($_GET['logout']) && $_GET['logout'] == '1'){
    //關閉 session
    session_destroy();

    //3 秒後跳頁
    header("Refresh: 3; url=./18-3-1.php");
    echo "您已登出…3秒後自動回登入頁";

    exit();
}
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
這裡是後端管理頁面 - <a href="./18-3-3.php?logout=1">登出</a>
</body>
</html>