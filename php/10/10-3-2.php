<?php
//使用陣列索引鍵
$season = array(
    '學號' => '103',
    '姓名' => '孫小美',
    '性別' => '女',
    '生日' => '2000/7/15',
    '手機號碼' => '0939666999'
);

foreach($season as $key => $value) {
    echo $key.": ".$value."<br />";
}