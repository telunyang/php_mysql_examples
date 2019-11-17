<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
$strVar = "page_id=1&query=資策會&status=good";
echo "原始字串: ".$strVar;
echo "<hr />";
parse_str($strVar);
printf("單位名稱: %s，狀態: %s，頁面代號: %d", $query, $status, $page_id);
echo "<hr />";
parse_str($strVar, $arr);
echo "<pre>";
print_r($arr);
echo "</pre>";
?>
</body>
</html>