<?php
//引用資料庫連線
require_once('../28/28-1-1.php');

//SQL 敘述
$sql = "SELECT count(1) FROM `students`";

//取得總筆數
$total = $pdo->query($sql)->fetch(PDO::FETCH_NUM)[0];

echo "總筆數:" . $total;