<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('./28-1-1.php');

$pdo_stmt = $pdo->prepare("SELECT * FROM `students` WHERE `studentGender` = ?");
$arr = ['女'];

if($pdo_stmt->execute($arr)){
    while($row = $pdo_stmt->fetch()){
        echo "您是 {$row['studentName']}, ";
        echo "你的學號是 {$row['studentId']}, ";
        echo "您是 {$row['studentGender']} 性<br />";
    }

}