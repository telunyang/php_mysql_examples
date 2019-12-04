<?php
$headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
];

$url = 'https://store.line.me/stickershop/product/14446/zh-Hant';

//透過 curl 取得 solr 查詢結果(資料總數)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$html = curl_exec($ch);
curl_close($ch);

$pattern = "/https:\/\/stickershop\.line-scdn.net\/stickershop\/v1\/sticker\/([0-9]+)\/android\/sticker\.png/m";

// echo $html;

//執行正規表達式
preg_match_all($pattern, $html, $matches);

// print_r($matches);
// print_r($arrImg);

//取得照片連結
$arrImgUrl = array_values(array_unique($matches[0]));

//取得照片編號
$arrImgNum = array_values(array_unique($matches[1]));

for( $i = 0; $i < count($arrImgUrl); $i++ ){
    shell_exec("curl {$arrImgUrl[$i]} -o stickers\\{$arrImgNum[$i]}.png");
}




?>