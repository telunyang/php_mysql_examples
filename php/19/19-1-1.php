<?php
# 關閉錯誤輸出
ini_set('display_errors','off');

# 開啟錯誤輸出
ini_set('display_errors','on');     

// 關閉所有 PHP 錯誤報告
error_reporting(0);

// 報告簡單的執行錯誤
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// 報告簡單的執行錯誤外，還會報告尚未初始化的變數或變數名稱的拼寫錯誤等
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// 除了 E_NOTICE，報告所有 PHP 錯誤
error_reporting(E_ALL ^ E_NOTICE);

// 報告所有 PHP 錯誤
error_reporting(E_ALL);

// 報告所有 PHP 錯誤
error_reporting(-1);

// 和 error_reporting(E_ALL); 一樣
ini_set('error_reporting', E_ALL);
?>