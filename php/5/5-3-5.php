<?php
class MyCar {
    private $wheels;
    private $seats;
    private $color;
    private $doors;
    private $brand;

    //建構子
    public function __construct(){
        $this->wheels = 4;
        $this->seats = 4;
        $this->color = 'red';
        $this->doors = 5;
    }

    /**
     * 說明: 取得車子詳細資訊
     * 回傳型別: Object 
     */
    public function getCarDetail(){
        $obj = [];
        $obj['wheels'] = $this->wheels;
        $obj['seats'] = $this->seats;
        $obj['color'] = $this->color;
        $obj['doors'] = $this->doors;
        $obj['brand'] = $this->brand;
        return $obj;
    }

    /**
     * 說明: 設定廠牌
     * 回傳型別: (不傳回值)
     */
    public function setBrand($strBrand){
        $this->brand = $strBrand;
    }

    //解構子
    public function __destruct(){}
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

<pre>
<?php
    print_r($objDetail);
?>
</pre>

</body>
</html>