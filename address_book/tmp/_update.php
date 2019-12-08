<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//切割 primary key 的字串成陣列
$arrPk = explode(",", $_POST['pk']);

//SQL 語法
$sql = "UPDATE `students` SET ";
$sql.= "`studentId` = ? ,";
$sql.= "`studentName` = ? ,";
$sql.= "`studentGender` = ? ,";
$sql.= "`studentBirthday` = ? ,";
$sql.= "`studentPhoneNumber` = ? ";
$sql.= "WHERE `id` = ? ";

//更新筆數
$count = 0;

for($i = 0; $i < count($arrPk); $i++) {
    $arrParam = [
        $_POST['studentId_' . $arrPk[$i]],
        $_POST['studentName_' . $arrPk[$i]],
        $_POST['studentGender_' . $arrPk[$i]],
        $_POST['studentBirthday_' . $arrPk[$i]],
        $_POST['studentPhoneNumber_' . $arrPk[$i]],
        $arrPk[$i],
    ];

    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arrParam);
    $count += $pdo_stmt->rowCount();
}

if( $count > 0 ){
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "更新成功";
} else {
    header("Refresh: 3; url={$_SERVER['HTTP_REFERER']}");
    echo "沒有任何更新";
}