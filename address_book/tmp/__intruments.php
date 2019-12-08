<?php
//資料庫主機設定
$db_host = "localhost";
$db_username = "test";
$db_password = "T1st@localhost";
$db_name = "address_book";
$db_charset = "utf8mb4";
$db_collate = "utf8mb4_unicode_ci";

//錯誤處理
try {
    //PDO 連線
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset}", $db_username , $db_password);

    //PDO 屬性設定
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute (PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES {$db_charset} COLLATE {$db_collate}");
} catch (PDOException $e) {
    echo "資料庫連結失敗，訊息: " . $e->getMessage();
}

/** 
 * 取得資料表裡面的資料
*/
$sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber` 
        FROM `students` 
        ORDER BY `id` ASC 
        LIMIT ?,?";
$arrParam = [0, 5];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($arr);
echo "</pre>";

/** 
 * 取得總筆數
*/
$sqlTotal = "SELECT count(1) FROM `students`";
$stmt = $pdo->query($sqlTotal);
$total = $stmt->fetch(PDO::FETCH_NUM)[0];
echo $total;


/**
 * 新增、修改、刪除後
 */
$sql = "INSERT INTO `students` (`studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`) 
        VALUES (?, ?, ?, ?, ?)";

// $sql = "UPDATE `students` 
//         SET `studentId` = ? ,
//             `studentName` = ? ,
//             `studentGender` = ? ,
//             `studentBirthday` = ? ,
//             `studentPhoneNumber` = ? 
//         WHERE `id` = ? ";
        
// $sql = "DELETE FROM `students` 
//         WHERE `id` = ? ";

//繫結用陣列
$arr = [
    'S999',
    '超人',
    '男',
    '2000-12-30',
    '0900000000'
];
$stmt = $pdo->prepare($sql);
$stmt->execute($arr_param);

//取得影響列數
echo $stmt->rowCount();

//若主鍵是自動編號 (auto increment)，取得最後新增所產生的 id
$id = $pdo->lastInsertId();
echo $id;