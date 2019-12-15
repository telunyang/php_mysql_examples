<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php'); 
require_once('./tpl/header.php');
?>
<div class="container">
<form name="myForm" method="POST" action="./addUser.php">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUsername">帳號</label>
            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="請輸入帳號" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword">密碼</label>
            <input type="password" class="form-control" id="inputPassword" name="pwd" placeholder="請輸入密碼" value="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">姓名</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入您的姓名" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputGender">性別</label>
            <select id="inputGender" name="gender" class="form-control">
                <option value="男" selected>男</option>
                <option value="女">女</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPhoneNumber">手機號碼</label>
            <input type="text" class="form-control" id="inputPhoneNumber" name="phoneNumber" placeholder="請輸入手機電話號碼" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputBirthday">生日</label>
            <input type="text"" class="form-control" id="inputBirthday" name="birthday" placeholder="請輸入出生年月日" value="">
        </div>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="inputAddress">住址</label>
            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="請輸入住址">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">註冊</button>
</form>

</div>
<?php
require_once('./tpl/footer.php');
require_once('./tpl/tpl-html-foot.php'); 
?>