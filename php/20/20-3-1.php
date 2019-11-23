<?php
//0個或1個a
$pattern01 = '/^Eric/m';
$str01 = 'EricClapton';
preg_match_all($pattern01, $str01, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";

//0個或更多的a
$pattern02 = '/Clapton$/m';
$str02 = 'EricClapton';
preg_match_all($pattern02, $str02, $matches);
echo "<pre>";
print_r($matches);
echo "</pre>";