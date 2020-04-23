<?php
//讀取 composer 所下載的套件
require_once('vendor/autoload.php');

//錯誤處理
try {
    //資料庫主機設定
    $db_host = "localhost";
    $db_username = "test";
    $db_password = "T1st@localhost";
    $db_name = "shopping_cart";
    $db_charset = "utf8mb4";
    $db_collate = "utf8mb4_unicode_ci";

    //設定 PDO 屬性
    $options = [
        PDO::ATTR_EMULATE_PREPARES => PDO::ATTR_EMULATE_PREPARES,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$db_charset} COLLATE {$db_collate}"
    ];

    //PDO 連線
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset}", $db_username , $db_password, $options);
} catch (PDOException $e) {
    echo "資料庫連結失敗，訊息: " . $e->getMessage();
}

/*
//官方範例
//URL: https://phpspreadsheet.readthedocs.io/en/latest/
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
$cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
echo $cellValue;
*/

//你的 excel 檔案路徑 (含檔名)
$inputFileName = './products.xlsx';

//透過套件功能來讀取 excel 檔
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

//讀取當前工作表(sheet)的資料列數
$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();

//依序讀取每一列，若是第一列為標題，建議 $i 從 2 開始
for($i = 2; $i <= $highestRow; $i++) {
    //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
    if( $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue() === '' || 
        $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue() === null ) break;
    
    //讀取 cell 值
    $courseTerm =                       $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue();
    $courseName =                       $spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue();
    $courseLecturer =                   $spreadsheet->getActiveSheet()->getCell('C'.$i)->getValue();
    $courseLecturerIntroduction =       $spreadsheet->getActiveSheet()->getCell('D'.$i)->getValue();
    $coursePlace =                      $spreadsheet->getActiveSheet()->getCell('E'.$i)->getValue();
    $courseIntroduction =               $spreadsheet->getActiveSheet()->getCell('F'.$i)->getValue();
    $courseId =                         $spreadsheet->getActiveSheet()->getCell('G'.$i)->getValue();
    $courseCredit =                     $spreadsheet->getActiveSheet()->getCell('H'.$i)->getValue();
    $courseClassTime =                  $spreadsheet->getActiveSheet()->getCell('I'.$i)->getValue();
    $courseCollaborator =               $spreadsheet->getActiveSheet()->getCell('J'.$i)->getValue();
    $courseCollaboratorCategory =       $spreadsheet->getActiveSheet()->getCell('K'.$i)->getValue();
    $courseCollaboratorIntroduction =   $spreadsheet->getActiveSheet()->getCell('L'.$i)->getValue();
    $courseResult =                     $spreadsheet->getActiveSheet()->getCell('M'.$i)->getValue();
    $courseSDGs =                       $spreadsheet->getActiveSheet()->getCell('N'.$i)->getValue();
    
    //預覽可能結果
    echo "[".$i."] ".$courseTerm." ".$courseName."\n";
    
    //寫入資料
    $sql = "INSERT INTO `courses` (
        `courseId`, `courseTerm`, `courseName`, `courseLecturer`, `courseLecturerIntroduction`, 
        `coursePlace`, `courseIntroduction`, `courseCredit`, `courseClassTime`, `courseCollaborator`, 
        `courseCollaboratorCategory`, `courseCollaboratorIntroduction`, `courseResult`, `courseSDGs`
        ) VALUE (
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?
        )";
    $stmt = $pdo->prepare($sql);
    $arrParam = [
        (string)$courseId,
        (string)$courseTerm,
        (string)$courseName,
        (string)$courseLecturer,
        (string)$courseLecturerIntroduction,
        (string)$coursePlace,
        (string)$courseIntroduction,
        (int)$courseCredit,
        (string)$courseClassTime,
        (string)$courseCollaborator,
        (string)$courseCollaboratorCategory,
        (string)$courseCollaboratorIntroduction,
        (string)$courseResult,
        (string)$courseSDGs,
    ];

    //繫結資料並執行
    $stmt->execute($arrParam);

    //若是成功寫入資料
    if( $stmt->rowCount() > 0 ){
        //印出 AutoIncrement 的流水號碼 (若沒設定，預設為 0)
        echo $pdo->lastInsertId();
    }
}
?>