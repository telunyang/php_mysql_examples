<?php
//判斷上傳是否成功 (error === 0)
if( $_FILES["fileUpload"]["error"] === 0 ) {
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "./tmp/".$_FILES["fileUpload"]["name"]) ) {
        echo "上傳成功!!<br />";
        echo "檔案名稱: ".$_FILES["fileUpload"]["name"]."<br />";
        echo "檔案類型: ".$_FILES["fileUpload"]["type"]."<br />";
        echo "檔案大小: ".$_FILES["fileUpload"]["size"]."<br />";
    } else { //檔案移動失敗，則顯示錯誤訊息
        echo "上傳失敗…<br />";
        echo "<a href='javascript:windows.history.back();'>回上一頁</a>";
    }
}