<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('./28-1-1.php');

$sql_query = "SELECT * FROM `students`";
$result = $pdo->query($sql_query);
while($row_result = $result->fetch()) {
    foreach($row_result as $item => $value){
        echo $item . " = " . $value . "<br />";
    }
    echo "<hr />";
}