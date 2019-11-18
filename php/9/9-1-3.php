<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$score = 85;
if($score >= 60 && $score < 70) {
    echo '丙等';
} elseif($score >= 70 && $score < 80) {
    echo '乙等';
} elseif($score >= 80 && $score < 90) {
    echo '甲等';
} elseif($score >= 90 && $score <= 100) {
    echo '優等';
} else {
    echo '不及格';
}
?>
</body>
</html>