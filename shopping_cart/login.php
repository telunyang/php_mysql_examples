<?php
session_start();

//引用資料庫連線
require_once('./db.inc.php');

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    switch($_POST['identity']){
        case 'admin':
            //SQL 語法
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `admin` 
                    WHERE `username` = ? 
                    AND `pwd` = ? ";
        break;

        case 'users':
            //SQL 語法
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `users`
                    WHERE `username` = ? 
                    AND `pwd` = ? ";
        break;
    }

    $arrParam = [
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if( $stmt->rowCount() > 0 ){
        //取得資料
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //3 秒後跳頁
        if($_POST['identity'] === 'admin')
            header("Refresh: 3; url=./admin/admin.php");
        elseif($_POST['identity'] === 'users') 
            header("Refresh: 3; url=./index.php");

        
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $arr[0]['username'];
        $_SESSION['name'] = $arr[0]['name'];
        $_SESSION['identity'] = $_POST['identity'];

        echo "登入成功!!! 權限為「{$_SESSION['identity']}」，3秒後自動進入頁面";
        exit();
    } 

    header("Refresh: 3; url=./index.php");
    echo "登入失敗…3秒後自動回登入頁";
} else {
    header("Refresh: 3; url=./index.php");
    echo "請確實登入…3秒後自動回登入頁";
}