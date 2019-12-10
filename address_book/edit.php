<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');
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
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<form name="myForm" method="POST" action="updateEdit.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, 
                        `studentPhoneNumber`, `studentDescription`, `studentImg`
                FROM `students` 
                WHERE `id` = ?";

        //設定繫結值
        $arrParam = [(int)$_GET['editId']];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($arr) > 0) {
        ?>
            <tr>
                <td class="border">學號</td>
                <td class="border">
                    <input type="text" name="studentId" value="<?php echo $arr[0]['studentId']; ?>" maxlength="9" />
                </td>
            </tr>
            <tr>
                <td class="border">姓名</td>
                <td class="border">
                    <input type="text" name="studentName" value="<?php echo $arr[0]['studentName']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">性別</td>
                <td class="border">
                    <select name="studentGender">
                        <option value="<?php echo $arr[0]['studentGender']; ?>" selected><?php echo $arr[0]['studentGender']; ?></option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="border">生日</td>
                <td class="border">
                    <input type="text" name="studentBirthday" value="<?php echo $arr[0]['studentBirthday']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">手機號碼</td>
                <td class="border">
                    <input type="text" name="studentPhoneNumber" value="<?php echo $arr[0]['studentPhoneNumber']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">個人描述</td>
                <td class="border">
                    <textarea name="studentDescription"><?php echo $arr[0]['studentDescription']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">大頭貼</td>
                <td class="border">
                <?php if($arr[0]['studentImg'] !== NULL) { ?>
                    <img class="w200px" src="./files/<?php echo $arr[0]['studentImg']; ?>" />
                <?php } ?>
                <input type="file" name="studentImg" />
                </td>
            </tr>
            <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./delete.php?deleteId=<?php echo $arr[0]['id']; ?>">刪除</a>
                </td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="editId" value="<?php echo (int)$_GET['editId']; ?>">
</form>
</body>
</html>