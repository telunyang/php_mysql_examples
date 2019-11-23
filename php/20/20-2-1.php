<?php
//0個或1個a
$pattern01 = '/ba?/m';
$str01 = 'addbaccbaa';
preg_match_all($pattern01, $str01, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//0個或更多的a
$pattern02 = '/ba*/m';
$str02 = 'addbaaaaaccbaa';
preg_match_all($pattern02, $str02, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//1個或更多的 a
$pattern03 = '/ba+/m';
$str03 = 'addbaccbaaaaaa';
preg_match_all($pattern03, $str03, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//完整3個a
$pattern04 = '/a{3}/m';
$str04 = 'addbaaaaaaccbaa';
preg_match_all($pattern04, $str04, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//3個以上的 a
$pattern05 = '/a{3,}/m';
$str05 = 'addbaaaaaaccbaa';
preg_match_all($pattern05, $str05, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//3個到6個之間的 a
$pattern06 = '/a{3,6}/m';
$str06 = 'addbaaaaaaccbaa';
preg_match_all($pattern06, $str06, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";