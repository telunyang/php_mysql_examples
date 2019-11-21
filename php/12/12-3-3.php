<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<form name="myForm" 
    action="./12-3-4.php" 
    method="POST" 
    enctype="multipart/form-data">
    <h3>請選擇所要上傳的檔案</h3>
    <label>檔案 1: </label><input type="file" name="fileUpload[]" /><br />
    <label>檔案 2: </label><input type="file" name="fileUpload[]" /><br />
    <label>檔案 3: </label><input type="file" name="fileUpload[]" /><br />
    <input type="submit" value="送出資料" />
</body>
</html>