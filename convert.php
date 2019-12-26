<?php
require_once('vendor/autoload.php');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');
// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
// $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
// echo $cellValue;

$inputFileName = './part5.xlsx';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();

require_once('./shopping_cart/db.inc.php');

for($i = 2; $i <= $highestRow; $i++) {
    //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
    if( $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue() === '' || $spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue() === null ) break;
    
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
    
    echo "[".$i."] ".$courseTerm." ".$courseName."\n";
    
    $sql = "insert into `courses` (
        `courseId`, `courseTerm`, `courseName`, `courseLecturer`, `courseLecturerIntroduction`, 
        `coursePlace`, `courseIntroduction`, `courseCredit`, `courseClassTime`, `courseCollaborator`, 
        `courseCollaboratorCategory`, `courseCollaboratorIntroduction`, `courseResult`, `courseSDGs`
        ) values (
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
    $stmt->execute($arrParam);
    if( $stmt->rowCount() > 0 ){
        echo $pdo->lastInsertId();
    }
}
?>