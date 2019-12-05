<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//SQL 語法
$sql = "UPDATE `students` SET ";
$sql.= "`studentId` = ? ,";
$sql.= "`studentName` = ? ,";
$sql.= "`studentGender` = ? ,";
$sql.= "`studentBirthday` = ? ,";
$sql.= "`studentPhoneNumber` = ? ";
$sql.= "WHERE `id` = ? ";


$arrParam = [
    $_POST['studentId'],
    $_POST['studentName'],
    $_POST['studentGender'],
    $_POST['studentBirthday'],
    $_POST['studentPhoneNumber'],
    (int)$_POST['editId'],
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arrParam);

if( $pdo_stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./admin.php");
    echo "更新成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "沒有任何更新";
}