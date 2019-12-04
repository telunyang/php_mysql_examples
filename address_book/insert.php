<?php
header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//整理取得的 http request body
$studentId = $_POST['studentId'];
$studentName = $_POST['studentName'];
$studentGender = $_POST['studentGender'];
$studentBirthday = $_POST['studentBirthday'];
$studentPhoneNumber = $_POST['studentPhoneNumber'];

//SQL 敘述
$sql = "INSERT INTO `students` (`studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`) 
        VALUES (?, ?, ?, ?, ?)";

//繫結用陣列
$arr = [
    $studentId,
    $studentName,
    $studentGender,
    $studentBirthday,
    $studentPhoneNumber
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    header("Refresh: 3; url=./admin.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "新增失敗";
}