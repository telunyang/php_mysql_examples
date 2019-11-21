<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<form name="myForm" 
    action="./12-3-2.php" 
    method="POST" 
    enctype="multipart/form-data">
    <h3>請選擇所要上傳的檔案</h3>
    <input type="file" name="fileUpload" /><br />
    <input type="submit" value="送出資料" />
</body>
</html>