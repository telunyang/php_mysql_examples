<?php
// $arr = [];
// $arr = ['Alex','Bill','Carl','Darren'];

// for($i = 0; $i < count($arr); $i++){
//     echo $arr[$i]."<br />";
// }

// $strTags = "glasses,hens,women,ccc";
// $arrTags = explode(',', $strTags);
// print_r($arrTags);

$arr = [
    [
        "productId" => 1,
        "productName" => "水壺",
        "productPrice" => 150
    ],
    [
        "productId" => 2,
        "productName" => "畫冊",
        "productPrice" => 350
    ],
    [
        "productId" => 3,
        "productName" => "原子筆",
        "productPrice" => 25
    ],
];

for($i = 0; $i < count($arr); $i++){
    echo "ProductId = {$arr[$i]['productId']} ";
    echo "ProductName = {$arr[$i]['productName']} ";
    echo "ProductPrice = {$arr[$i]['productPrice']} ";
    echo "<br />";
}

?>

