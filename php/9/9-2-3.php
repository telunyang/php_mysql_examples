<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$count = 0;
for($i = 1; $i <= 10; $i++) {
    $count+= $i;
}
echo $count;
?>
</body>
</html>