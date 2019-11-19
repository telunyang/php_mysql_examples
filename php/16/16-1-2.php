<?php
header("Content-Type: text/html; charset=utf-8");
require_once './16-1-1.php';

$objMan = new AdultPeople();
$objMan->setData("Darren", "男", 36, 171, 80);
echo $objMan->strName." 的標準體重為: ";
echo $objMan->calcWeight();

echo "<hr />";

$objMan = new AdultPeople();
$objMan->setData("Beryl", "女", 33, 156, 60);
echo $objMan->strName." 的標準體重為: ";
echo $objMan->calcWeight();