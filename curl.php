<?php
//自訂 Request 標頭
$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
];

//LINE 官方貼圖網址
$url = 'https://store.line.me/stickershop/product/14696/zh-Hant';

//設定 cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); //設定網址
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //若網站導向其它頁面，自動導到正確可讀取的頁面
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //設置自訂標頭

//透過 curl 取得 LINE 官方貼圖的 html 原始碼
$html = curl_exec($ch);

//關閉 cURL 連線
curl_close($ch);

//正規表達式
$pattern = "/https:\/\/stickershop\.line-scdn.net\/stickershop\/v1\/sticker\/([0-9]+)\/android\/sticker\.png/m";

//執行正規表達式
preg_match_all($pattern, $html, $matches);

// print_r($matches);

//取得圖片連結
$arrImgUrl = array_values(array_unique($matches[0]));

//取得圖片編號
$arrImgNum = array_values(array_unique($matches[1]));

//指定圖片下載路徑
$folderPath = './line_images';

//若是沒有圖片下載路徑所指定的資料夾
if( !file_exists($folderPath) ){
    //新增路徑所在的資料夾
    mkdir($folderPath);
}

//下載筆數
$count = 0;

//轉成 json 用的 associative array
$obj = [];
$obj['success'] = false;
$obj['info'] = '下載失敗'; 

//下載貼圖
for( $i = 0; $i < count($arrImgUrl); $i++ ){
    shell_exec("curl {$arrImgUrl[$i]} -o {$folderPath}\\{$arrImgNum[$i]}.png");
    $count++;
}

if($count > 0){
    $obj['success'] = true;
    $obj['info'] = "下載完成，共 {$count} 張貼圖";
}

echo json_encode($obj, JSON_UNESCAPED_UNICODE);
?>