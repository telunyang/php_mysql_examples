<?php
//建立種類列表
function buildTree($pdo, $parentId = 0){
    $sql = "SELECT `categoryId`, `categoryName`, `categoryParentId`
            FROM `categories` 
            WHERE `categoryParentId` = ?";
    $stmt = $pdo->prepare($sql);
    $arrParam = [$parentId];
    $stmt->execute($arrParam);
    if($stmt->rowCount() > 0) {
        echo "<ul>";
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
            echo "<li>";
            echo "<a href='./itemList.php?categoryId={$arr[$i]['categoryId']}'>{$arr[$i]['categoryName']}</a>";
            buildTree($pdo, $arr[$i]['categoryId']);
            echo "</li>";
        }
        echo "</ul>";
    }
}