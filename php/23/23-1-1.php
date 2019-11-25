<?php
header('Content-type: application/json');

//資料來源
$obj01 = [];
$obj01["name"] = "Darren";
$obj01["age"] = 18;
$obj01["height"] = 171;
$obj01["weight"] = 80;

$obj02 = [];
$obj02["name"] = "Alex";
$obj02["age"] = 21;
$obj02["height"] = 183;
$obj02["weight"] = 85;

if(isset($_GET['getMethod']) && $_GET['getMethod'] === '1'){
    echo json_encode($obj01);
} elseif (isset($_POST['postMethod']) && $_POST['postMethod'] === '1'){
    echo json_encode($obj02);
}