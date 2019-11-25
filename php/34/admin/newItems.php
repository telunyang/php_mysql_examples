<?php
//啟動 session
session_start();

//引入登入判斷
require_once('./checkAdmin.php');


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
這裡是後端管理頁面 | <a href="./adminConsole.php">商品列表</a> | <a href="../logout.php?logout=1">登出</a>
<hr />
<h3>新增商品</h3>
<form name="myForm" enctype="multipart/form-data" method="POST" action="addItems.php">
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
            <td class="border" colspan="4"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>
</body>
</html>