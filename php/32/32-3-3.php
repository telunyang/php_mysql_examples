<?php
header("Content-Type: text/html; chartset=utf-8");

//引用資料庫連線
require_once('../28/28-1-1.php');

//整理取得的 http request body
$studentId = $_POST['studentId'];
$studentName = $_POST['studentName'];
$studentGender = $_POST['studentGender'];
$studentBirthday = $_POST['studentBirthday'];
$studentPhoneNumber = $_POST['studentPhoneNumber'];

//SQL 敘述
$sql = "INSERT INTO `students` (`studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`) ";
$sql.= "VALUES (?, ?, ?, ?, ?)";

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
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "新增成功";
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "新增失敗";
}