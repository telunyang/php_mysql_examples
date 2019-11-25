<?php
//啟動 session
session_start();

//引入登入判斷
require_once('./checkUsers.php');

//引用資料庫連線
require_once('../db.inc.php');

//SQL 敘述
$sqlTotal = "SELECT count(1) FROM `items`";

//取得總筆數
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0];

//每頁幾筆
$numPerPage = 5;

// 總頁數
$totalPages = ceil($total/$numPerPage); 

//目前第幾頁
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    img.itemImg {
        width: 250px;
    }
    </style>
</head>
<body>
這裡是使用者購物頁面 | <a href="./usersConsole.php">商品列表</a> | <a href="./cartList.php">購物車</a> | <a href="./history.php">訂單</a> - <a href="../logout.php?logout=1">登出</a>
<hr />
<h3>商品列表</h3>
<form name="myForm" entype= "multipart/form-data" method="POST" action="updateItems.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">商品名稱</th>
                <th class="border">商品照片</th>
                <th class="border">商品價格</th>
                <th class="border">商品數量</th>
                <th class="border">上架時間</th>
                <th class="border">更新時間</th>
                <th class="border">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `itemId`, `itemName`, `itemImg`, `itemPrice`, `itemQty`, `created_at`, `updated_at` ";
        $sql.= "FROM `items` ";
        $sql.= "ORDER BY `itemId` ASC ";
        $sql.= "LIMIT %s, %s ";
        $sql = sprintf($sql, ($page - 1) * $numPerPage, $numPerPage);

        //查詢
        $pdo_stmt = $pdo->query($sql);

        //整理 primary key
        $strPk = '';

        if($total > 0) {
            while($row = $pdo_stmt->fetch()) {
        ?>
            <tr>
                <td class="border"><?php echo $row['itemName']; ?></td>
                <td class="border"><img class="itemImg" src="../<?php echo $row['itemImg']; ?>" /></td>
                <td class="border"><?php echo $row['itemPrice']; ?></td>
                <td class="border"><?php echo $row['itemQty']; ?></td>
                <td class="border"><?php echo $row['created_at']; ?></td>
                <td class="border"><?php echo $row['updated_at']; ?></td>
                <td class="border">
                    <a href="./purchaseItems.php?itemId=<?php echo $row['itemId']; ?>">加入購物車</a> | 
                    <a href="./preferItems.php?itemId=<?php echo $row['itemId']; ?>">加入最愛</a>
                </td>
            </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="7">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="7">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?=$i?>"><?= $i ?></a>
                <?php } ?>
                </td>
            </tr>            
        </tfoo>
    </table>
</form>
</body>
</html>