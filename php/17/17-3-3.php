<?php
//刪除 cookie (透過指定過去時間)
setcookie('TestCookie', '', time() - 3600);