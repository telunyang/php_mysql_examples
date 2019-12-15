<?php
session_start();
require_once('./db.inc.php');

if($_POST["username"] == "" || $_POST["pwd"] == "" || $_POST["name"] == "" || 
    $_POST["gender"] == "" || $_POST["phoneNumber"] == "" || $_POST["birthday"] == "" || 
    $_POST["address"] == "" ){
    header("Refresh: 3; url=./index.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "請輸入完整資料";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

$sql = "INSERT INTO `users` (`username`,`pwd`,`name`,`gender`,`phoneNumber`,`birthday`,`address`) 
        VALUES (?,?,?,?,?,?,?)";

$arrParam = [
    $_POST["username"],
    sha1($_POST["pwd"]),
    $_POST["name"],
    $_POST["gender"],
    $_POST["phoneNumber"],
    $_POST["birthday"],
    $_POST["address"]
];

//查詢
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

//若商品項目個數大於 0，則列出商品
if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./index.php");

    //註冊 session
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["name"] = $_POST["name"];

    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "註冊成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=./index.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "註冊失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

?>