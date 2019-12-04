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
?>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
    for($i = 0; $i < count($arr); $i++){
        echo "<tr>
            <td>{$arr[$i]['productId']}</td>
            <td>{$arr[$i]['productName']}</td>
            <td>{$arr[$i]['productPrice']}</td>
        </tr>";
    }
    ?>

    <?php
    for($i = 0; $i < count($arr); $i++){
        echo "<tr>
            <td>{$arr[$i]['productId']}</td>
            <td>{$arr[$i]['productName']}</td>
            <td>{$arr[$i]['productPrice']}</td>
        </tr>";
    }
    ?>
    </tbody>
</table>


