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

//放置新增結果的訊息
$obj = [];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    $obj['success'] = true;
    $obj['code'] = 200;
    $obj['info'] = 'ok';
} else {
    $obj['success'] = false;
    $obj['code'] = 410;
    $obj['info'] = 'Gone';
}

echo json_encode($obj, true);