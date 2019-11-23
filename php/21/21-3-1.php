<?php
//確認檔案存在，則進行檔案刪除
if(file_exists("./tmp/test01.txt")) {
    ulink("./tmp/test01.txt");
}