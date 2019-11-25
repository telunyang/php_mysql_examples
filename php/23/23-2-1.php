<?php
//參考連結: https://stackoverflow.com/questions/35091757/parse-javascript-fetch-in-php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$obj = [];
$obj["name"] = "Lucy";
$obj["age"] = 25;
$obj["height"] = 173;
$obj["weight"] = 56;

if($data["postMethod"] === 1){
    echo json_encode($obj);
}