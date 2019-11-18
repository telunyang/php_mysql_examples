<?php
$arrStudents[] = array(
    '學號' => '101',
    '姓名' => '阿土伯',
    '性別' => '男',
    '生日' => '2000/3/14',
    '手機號碼' => '0910123456'
);

$arrStudents[] = array(
    '學號' => '102',
    '姓名' => '錢夫人',
    '性別' => '女',
    '生日' => '2000/6/6',
    '手機號碼' => '0978222333'
);

$arrStudents[] = array(
    '學號' => '103',
    '姓名' => '孫小美',
    '性別' => '女',
    '生日' => '2000/7/15',
    '手機號碼' => '0939666999'
);

$arrStudents[] = array(
    '學號' => '104',
    '姓名' => '約翰喬',
    '性別' => '男',
    '生日' => '2000/8/7',
    '手機號碼' => '0910765432'
);

// $arrStudents[0]['學號'] = '101';
// $arrStudents[0]['姓名'] = '阿土伯';
// $arrStudents[0]['性別'] = '男';
// $arrStudents[0]['生日'] = '2000/3/14';
// $arrStudents[0]['手機號碼'] = '0910123456';
// $arrStudents[1]['學號'] = '102';
// $arrStudents[1]['姓名'] = '錢夫人';
// $arrStudents[1]['性別'] = '女';
// $arrStudents[1]['生日'] = '2000/6/6';
// $arrStudents[1]['手機號碼'] = '0978222333';
// $arrStudents[2]['學號'] = '103';
// $arrStudents[2]['姓名'] = '孫小美';
// $arrStudents[2]['性別'] = '女';
// $arrStudents[2]['生日'] = '2000/7/15';
// $arrStudents[2]['手機號碼'] = '0939666999';
// $arrStudents[3]['學號'] = '104';
// $arrStudents[3]['姓名'] = '約翰喬';
// $arrStudents[3]['性別'] = '男';
// $arrStudents[3]['生日'] = '2000/8/7';
// $arrStudents[3]['手機號碼'] = '0910765432';

echo "<pre>";
print_r($arrStudents);
echo "</pre>";

//這個案例的整數索引，從 0 開始；count() 函式可以算出陣列的長度：4
for($i = 0; $i < count($arrStudents); $i++){
    echo '學號: '.$arrStudents[$i]['學號']."<br />";
    echo '姓名: '.$arrStudents[$i]['姓名']."<br />";
    echo '性別: '.$arrStudents[$i]['性別']."<br />";
    echo '生日: '.$arrStudents[$i]['生日']."<br />";
    echo '手機號碼: '.$arrStudents[$i]['手機號碼']."<br />";
}