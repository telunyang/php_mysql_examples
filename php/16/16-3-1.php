<?php
//這行程式，可以引用所有的套件，包括我們即將用到的 PhpSpreadsheet
require '../../vendor/autoload.php';

//引入套件類別，
//等同於 use PhpOffice\PhpSpreadsheet\Spreadsheet as Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

//引入套件類別，
//等同於 use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Xlsx
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//建立 Spreadsheet 物件（實體化）
$spreadsheet = new Spreadsheet();

//取得工作表（sheet）
$sheet = $spreadsheet->getActiveSheet();

//指定欄（cell），並設定自訂的值
$sheet->setCellValue('A1', 'Hello World !');

//建立 Xlsx 物件（實體化）
$writer = new Xlsx($spreadsheet);

//存成檔案 hello_world.xlsx
$writer->save('./tmp/hello_world.xlsx');

echo "新增 xlsx 檔案結束";