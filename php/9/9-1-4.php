<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$direction = "南";
switch($direction) {
    case '東':
        echo "我要往東走";
    break;
    case '南':
        echo "我要往南走";
    break;
    case '西':
        echo "我要往西走";
    break;
    case '北':
        echo "我要往北走";
    break;
    default:
        echo "我不知道要往哪裡走";
}
?>
</body>
</html>