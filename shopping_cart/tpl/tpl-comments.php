<form name="myForm" method="POST" action="insertComments.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">姓名</th>
                <th class="border">內容</th>
                <th class="border">評分</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border">
                    <input type="text" name="name" value="" maxlength="50" />
                </td>
                <td class="border">
                    <textarea name="content" value=""></textarea>
                </td>
                <td class="border">
                    <input type="text" name="ranking" value="5" maxlength="1" />
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="3"><input type="submit" name="smb" value="新增"></td>
            </tr>
        </tfoot>
    </table>

    <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId']; ?>">

</form>