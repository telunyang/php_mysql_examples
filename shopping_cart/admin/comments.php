<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
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
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<h3>評論頁面</h3>


<!-- <form name="myForm" method="POST" action="./insertComments.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">商品名稱</th>
                <th class="border">商品照片路徑</th>
                <th class="border">商品價格</th>
                <th class="border">商品數量</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border">
                    <input type="text" name="itemName" value="" maxlength="100" />
                </td>
                <td class="border">
                    <input type="file" name="itemImg" value="" />
                </td>
                <td class="border">
                    <input type="text" name="itemPrice" value="" maxlength="11" />
                </td>
                <td class="border">
                    <input type="text" name="itemQty" value="" maxlength="3" />
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="5"><input type="submit" name="smb" value="新增"></td>
            </tr>
        </tfoot>
    </table>
</form> -->

</body>
</html>