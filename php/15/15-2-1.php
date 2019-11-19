<?php
//USB 的操作介面
interface USB {
    //掛載 USB
    public function mount();

    //讀取檔案
    public function readFile();

    //刪除檔案
    public function removeFile();

    //卸除 USB
    public function dismount();
}

//Sandisk 的 USB 操作類別
class Sandisk implements USB {
    //掛載 USB
    public function mount(){
        echo "Sandisk 的 USB 已經掛載好了<br />";
    }

    //讀取檔案
    public function readFile(){
        echo "Sandisk 的 USB 正在讀取檔案<br />";
    }

    //刪除檔案
    public function removeFile(){
        echo "Sandisk 的 USB 正在刪除檔案<br />";
    }

    //卸除 USB
    public function dismount(){
        echo "Sandisk 的 USB 已經卸除了<br />";
    } 
}

//Transcend 的 USB 操作類別
class Transcend implements USB {
    //掛載 USB
    public function mount(){
        echo "Transcend 的 USB 已經掛載好了<br />";
    }

    //讀取檔案
    public function readFile(){
        echo "Transcend 的 USB 正在讀取檔案<br />";
    }

    //刪除檔案
    public function removeFile(){
        echo "Transcend 的 USB 正在刪除檔案<br />";
    }

    //卸除 USB
    public function dismount(){
        echo "Transcend 的 USB 已經卸除了<br />";
    } 
}

$objS = new Sandisk();
$objS->mount();
$objS->readFile();
$objS->removeFile();
$objS->dismount();

echo "<hr />";

$objT = new Transcend();
$objT->mount();
$objT->readFile();
$objT->removeFile();
$objT->dismount();
?>