<?php
//任何單一字元(任何字元)
$pattern01 = '/./m';
$str01 = 'AB123';
preg_match_all($pattern01, $str01, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//任何空白字元（\f \r \n \t \v）空格、換行、換頁等
$pattern02 = '/\s/m';
$str02 = ' AB123  ';
preg_match_all($pattern02, $str02, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//任何數字
$pattern03 = '/\d/m';
$str03 = 'AB123';
preg_match_all($pattern03, $str03, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//任何文字字元
$pattern04 = '/\w/m';
$str04 = 'AB123';
preg_match_all($pattern04, $str04, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";