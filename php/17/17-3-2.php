<?php
//設定 cookie 存活時間為 1 個小時
setcookie('TestCookie', 'Hello World', time() + 3600);

//設定有效時間、暫存路徑、使用網域、安全性
// setcookie('TestCookie', 'Hello World', time() + 3600, "/tmp", "localhost", 0);

//設定到期時間(透過 mktime() 設定 2019 年 12 月 31 日 23 點 59 分 59 秒過期)
//格式: mktime(時, 分, 秒, 月, 日, 年);
// setcookie('TestCookie', 'Hello World', mktime(23, 59, 59, 12, 31, 2019));

//設定到期時間(透過 strtotime() 設定 時間字串 '2019-12-31-23-59-59')
// setcookie('TestCookie', 'Hello World', strtotime('2019-12-31-23-59-59'));