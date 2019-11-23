<?php
//將字串代表的時間（例如 2019-10-02 10:24:18），轉換成時間戳記
echo "指定日期時間格式 - 時間戳記: " . strtotime("2019-10-02 10:02:00");
echo "<br />";
echo "現在 - 時間戳記: " . strtotime("now");
echo "<br />";
echo "三天後 - 時間戳記: " . strtotime("+ 3 days");
echo "<br />";
echo "三個月前 - 時間戳記: " . strtotime("- 3 months");
echo "<br />";
echo "上個禮拜五 - 時間戳記: " . strtotime("last Friday");

echo "<hr />";

date_default_timezone_set("Asia/Taipei");

//再將轉換出來的時間戳記，變成字串代表時間
echo "指定日期時間格式 - 時間戳記: " . date("Y-m-d H:i:s", strtotime("2019-10-02 10:02:00"));
echo "<br />";
echo "現在 - 時間戳記: " . date("Y-m-d H:i:s", strtotime("now"));
echo "<br />";
echo "三天後 - 時間戳記: " . date("Y-m-d H:i:s", strtotime("+ 3 days"));
echo "<br />";
echo "三個月前 - 時間戳記: " . date("Y-m-d H:i:s", strtotime("- 3 months"));
echo "<br />";
echo "上個禮拜五 - 時間戳記: " . date("Y-m-d H:i:s", strtotime("last Friday"));