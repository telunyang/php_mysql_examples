<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<form name="myForm" method="post" action="./checkLogin.php">
帳號: <input type="text" name="username" value="" /><br />
密碼: <input type="password" name="pwd" value="" /><br />
買家 <input type="radio" name="identity" value="users" />
賣家 <input type="radio" name="identity" value="admin" checked />
<input type="submit" value="登入" />
</form>
</body>
</html>