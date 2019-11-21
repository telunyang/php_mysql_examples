<?php
//啟動 session
session_start();

//預設帳號密碼，測試 session 登入用
$username = 'test';
$pwd = 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'; //sha1 雜湊後的字串

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    if( $_POST['username'] === $username && sha1($_POST['pwd']) === $pwd){
        //3 秒後跳頁
        header("Refresh: 3; url=./18-3-3.php");
        
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $username;

        echo "登入成功!!! 3秒後自動進入後端頁面";
    } else {
        header("Refresh: 3; url=./18-3-1.php");
        echo "登入失敗…3秒後自動回登入頁";
    }
} else {
    header("Refresh: 3; url=./18-3-1.php");
    echo "請確實登入…3秒後自動回登入頁";
}