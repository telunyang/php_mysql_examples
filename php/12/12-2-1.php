<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<form name="myForm" 
    action="./12-2-2.php" 
    method="POST" 
    enctype="application/x-www-form-urlencoded">
    <label>男: </label>
    <input type="radio" name="myGender" checked="checked" value="男" /> <br />
    <label>女: </label>
    <input type="radio" name="myGender" value="女" /> <br />
    <input type="submit" name="smb" value="送出" />
</body>
</html>