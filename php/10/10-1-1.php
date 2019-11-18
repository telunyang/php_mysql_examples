<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$arr[] = '星期一';
$arr[] = '星期二';
$arr[] = '星期三';
$arr[] = '星期四';
$arr[] = '星期五';
$arr[] = '星期六';
$arr[] = '星期日';
for($i = 0; $i < count($arr); $i++){
    echo $arr[$i] . "<br />";
}
?>
</body>
</html>