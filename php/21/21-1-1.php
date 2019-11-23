<?php
//在 Linux 系統開啟唯讀檔
$fp = fopen("/tmp/file.txt", "r");

//在 Windows 系統開啟唯讀檔
$fp = fopen("C:\\xampp\htdocs\\files.txt", "r");

//開啟二進制檔案
$fp = fopen("C:\\xampp\htdocs\\img\\module_table_top.png", "r");

//將遠端網頁內容開啟為唯讀檔
$fp = fopen("https://darreninfo.cc/", "r");

//在 FTP 中開啟只能寫入的檔案
$fp = fopen("ftp://username:password@abc.com/file.txt", "r");

//當我們使用完 fopen() 以後，記得把檔案關起來
fclose($fp);