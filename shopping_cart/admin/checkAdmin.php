<?php
session_start(); //啟動 session

//判斷是否登入 (確認先前指派的 session 索引是否存在)
if( !isset($_SESSION['username']) && !isset($_SESSION['identity']) ) {
    //3 秒後跳頁
    header("Refresh: 3; url=../login.php");
    echo "請確實登入…3秒後自動回登入頁";
    exit();
}

if($_SESSION['identity'] !== 'admin'){
    //3 秒後跳頁
    header("Refresh: 3; url=../login.php");
    echo "您無權使用該網頁…3秒後自動回登入頁";
    exit();
}