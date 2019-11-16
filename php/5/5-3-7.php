<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$arr[0][0] = '00同學';
$arr[0][1] = '01同學';
$arr[0][2] = '02同學';
$arr[0][3] = '03同學';
$arr[0][4] = '04同學';
$arr[1][0] = '10同學';
$arr[1][1] = '11同學';
$arr[1][2] = '12同學';
$arr[1][3] = '13同學';
$arr[1][4] = '14同學';
$arr[2][0] = '20同學';
$arr[2][1] = '21同學';
$arr[2][2] = '22同學';
$arr[2][3] = '23同學';
$arr[2][4] = '24同學';

for($i = 0; $i < count($arr); $i++){
    for($j = 0; $j < count($arr[$i]); $j++){
        echo $arr[$i][$j] . "<br />";
    }
}
?>
</body>
</html>