<?php
class MyCar {
    var $wheels;
    var $seats;
    var $color;
    var $doors;
    var $brand;
    var $isNewArrival; //新增一個屬性

    //建構子
    function __construct(){
        $this->wheels = 4;
        $this->seats = 4;
        $this->color = 'red';
        $this->doors = 5;
        $this->isNewArrival = true; //對剛新增的屬性，設定初始值
    }

    /**
     * 說明: 取得車子詳細資訊
     * 回傳型別: Object 
     */
    function getCarDetail(){
        $obj = [];
        $obj['wheels'] = $this->wheels;
        $obj['seats'] = $this->seats;
        $obj['color'] = $this->color;
        $obj['doors'] = $this->doors;
        $obj['brand'] = $this->brand;
        $obj['isNewArrival'] = $this->isNewArrival; //將新增屬性的值，指派到物件屬性
        return $obj;
    }

    /**
     * 說明: 設定廠牌
     * 回傳型別: (不傳回值)
     */
    function setBrand($strBrand){
        $this->brand = $strBrand;
    }

    //解構子
    function __destruct(){}
}

$objCar = new MyCar();                  //創造 MyCar 類別的物件 $objCar
$objCar->setBrand('Toyota');            //設定廠牌名稱
$objDetail = $objCar->getCarDetail();   //取得 $objCar 的詳細資訊
unset($objCar);                         //消滅 $objCar 物件
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>
<?php
echo "[汽車資訊]<br />";
echo "廠牌: {$objDetail["brand"]} <br />";

echo "是否新登場: ";
echo ($objDetail["isNewArrival"]) ? '是' : '不是';
echo "<br />";

echo "輪子數: {$objDetail["wheels"]} <br />";
echo "座位數: {$objDetail["seats"]} <br />";
echo "顏色: {$objDetail["color"]} <br />";
echo "車門數: {$objDetail["doors"]} <br />";
?>
</body>
</html>