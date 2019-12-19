<div class="table-responsive">
    <form name="myForm" method="POST" action="insertComments.php">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>姓名</th>
                    <th>內容</th>
                    <th>評分</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border">
                        <input type="text" name="name" value="" maxlength="50" />
                    </td>
                    <td class="border">
                        <textarea name="content" value="" rows="10" cols="50"></textarea>
                    </td>
                    <td class="border">
                        <input type="hidden" name="rating" id="rating" value="5" maxlength="1" />
                        <div class="rating" data-rate-value="5"></div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="border" colspan="3">
                        <input type="button" name="btn_insertComments" id="btn_insertComments" value="新增">
                    </td>
                </tr>
            </tfoot>
        </table>

        <input type="hidden" name="itemId" value="<?php echo (int)$_GET['itemId']; ?>">
    </form>
</div>
