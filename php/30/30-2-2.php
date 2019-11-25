<?php
//引用資料庫連線
require_once('../28/28-1-1.php');

//SQL 敘述
$sql = "SELECT count(1) FROM `students`";

//取得總筆數
$total = $pdo->query($sql)->fetch(PDO::FETCH_NUM)[0];

//每頁幾筆
$numPerPage = 5;

// 總頁數
$totalPages = ceil($total/$numPerPage); 

echo "總頁數: ".$totalPages;