<?php
session_start();

//引用資料庫連線
require_once('./db.inc.php');

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    switch($_POST['identity']){
        case 'admin':
            //SQL 語法
            $sql = "SELECT `username`, `pwd` ";
            $sql.= "FROM `admin` ";
            $sql.= "WHERE `username` = ? ";
            $sql.= "AND `pwd` = ? ";
        break;

        case 'users':
            //SQL 語法
            $sql = "SELECT `username`, `pwd` ";
            $sql.= "FROM `users` ";
            $sql.= "WHERE `username` = ? ";
            $sql.= "AND `pwd` = ? ";
        break;
    }

    $arrParam = [
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arrParam);

    if( $pdo_stmt->rowCount() > 0 ){
        //3 秒後跳頁
        if($_POST['identity'] === 'admin')
            header("Refresh: 3; url=./admin/adminConsole.php");
        elseif($_POST['identity'] === 'users') 
            header("Refresh: 3; url=./users/usersConsole.php");

        
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['identity'] = $_POST['identity'];

        echo "登入成功!!! 3秒後自動 {$_POST['identity']} 進入後端頁面";
        exit();
    } 

    header("Refresh: 3; url=./login.php");
    echo "登入失敗…3秒後自動回登入頁";
} else {
    header("Refresh: 3; url=./login.php");
    echo "請確實登入…3秒後自動回登入頁";
}