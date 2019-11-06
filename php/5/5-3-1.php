<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
    <?php
        $name = 'myVar';
        $$name = '真正的值';

        //可以用「.」來串接變數和文字、數值，進行輸出
        echo $name . ' 變數的值為: ' . $$name;
    ?>
</body>
</html>