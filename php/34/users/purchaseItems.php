<?php
//啟動 session
session_start();

//引入登入判斷
require_once('./checkUsers.php');

//引用資料庫連線
require_once('../db.inc.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(document).on('click', 'button#putItems', function(){
            var btn = $(this);
            var itemId = btn.attr('data-item-id');
            var checkQty = $('input#checkQty').val();
            var itemQty = $('input[type="hidden"][name="itemQty"]').val();
            if( checkQty > itemQty ){
                alert('購買數量不得大於庫存數量');
                return false;
            }

            $.ajax({
                url: 'URL',
                type: 'POST',
                data: {
                    itemId: itemId
                },
                datatype: 'json'
            })
            .done(function (data) { successFunction(data); })
            .fail(function (jqXHR, textStatus, errorThrown) { serrorFunction(); });

        });
    });
    </script>
</head>
<body>
這裡是使用者購物頁面 | <a href="./usersConsole.php">商品列表</a> | <a href="./cartList.php">購物車</a> | <a href="./history.php">訂單</a> | <a href="../logout.php?logout=1">登出</a>
<hr />
<h3>賣場商品列表</h3>
<form name="myForm" enctype="multipart/form-data" method="POST" action="addItems.php">
<table class="border">
    <thead>
        <tr>
            <th class="border">商品名稱</th>
            <th class="border">商品照片</th>
            <th class="border">商品價格</th>
            <th class="border">庫存數量</th>
            <th class="border">購買數量</th>
        </tr>
    </thead>
    <tbody>
    <?php
        //SQL 敘述
        $sql = "SELECT `itemId`, `itemName`, `itemImg`, `itemPrice`, `itemQty`, `created_at`, `updated_at` ";
        $sql.= "FROM `items` ";
        $sql.= "WHERE `itemID` = ? ";

        $arrParam = [
            (int)$_GET['itemId']
        ];

        //查詢
        $pdo_stmt = $pdo->prepare($sql);
        $pdo_stmt->execute($arrParam);

        if($pdo_stmt->rowCount() > 0) {
            $row = $pdo_stmt->fetch();
        ?>
            <tr>
                <td class="border"><?php echo $row['itemName']; ?></td>
                <td class="border">
                    <img class="itemImg" src="../<?php echo $row['itemImg']; ?>" />
                </td>
                <td class="border"><?php echo $row['itemPrice']; ?></td>
                <td class="border"><?php echo $row['itemQty']; ?></td>
                <th class="border">
                    <input type="text" name="checkQty" id="checkQty" value="1" maxlength="3" />
                </th>

            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td colspan="5">沒有資料</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="5"><button type="button" name="putItems" id="putItems" data-item-id="<?php echo (int)$_GET['itemId']; ?>">加入購物車</button></td>
        </tr>
    </tfoot>
</table>
<input type="hidden" name="pk" value="<?php echo (int)$_GET['itemId']; ?>">

<input type="hidden" name="itemQty" value="<?php echo $row['itemQty']; ?>" />

</form>
</body>
</html>