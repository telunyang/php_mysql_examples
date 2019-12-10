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
<form name="myForm" method="POST" action="./insert.php" enctype="multipart/form-data">
<table class="border">
    <thead>
        <tr>
            <th class="border">學號</th>
            <th class="border">姓名</th>
            <th class="border">性別</th>
            <th class="border">生日</th>
            <th class="border">手機號碼</th>
            <th class="border">個人描述</th>
            <th class="border">上傳照片</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="studentId" id="studentId" value="" maxlength="9" />
            </td>
            <td class="border">
                <input type="text" name="studentName" id="studentName" value="" maxlength="10" />
            </td>
            <td class="border">
                <select name="studentGender" id="studentGender">
                    <option value="男" selected>男</option>
                    <option value="女">女</option>
                </select>
            </td>
            <td class="border">
                <input type="text" name="studentBirthday" id="studentBirthday" value="" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="studentPhoneNumber" id="studentPhoneNumber" value="" maxlength="10" />
            </td>
            <td class="border">
                <textarea name="studentDescription"></textarea>
            </td>
            <td class="border">
                <input type="file" name="studentImg" />
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="7"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>

</body>
</html>