<?php
//使用 fwrite 寫入檔案
$fp = fopen("./tmp/test01.txt", "w+");
fwrite($fp, "這是 fwrite()");
fclose($fp);

//使用 fputs 寫入檔案
$fp = fopen("./tmp/test02.txt", "w+");
fputs($fp, "這是 fputs()");
fclose($fp);

//使用 fgets 讀取 test01.txt 檔案
$fp = fopen("./tmp/test01.txt", "r");
while( $line = fgets($fp) ) {
    echo $line. "<br />";
}
fclose($fp);