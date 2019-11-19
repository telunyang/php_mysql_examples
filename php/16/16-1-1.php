<?php
class People {
    public $strName;
    public $strGender;
    protected $intAge;
    protected $intHeight;
    protected $intWeight;

    //設定個人基本資料
    public function setData($name, $gender, $age, $height, $weight){
        $this->strName = $name;
        $this->strGender = $gender;
        $this->intAge = $age;
        $this->intHeight = $height;
        $this->intWeight = $weight;
    }

    //16 歲以下兒童標準體重: 年齡 * 2 + 8
    public function calcWeight(){
        return $this->intAge * 2 + 8;
    }
}

//這是成年人的類別
class AdultPeople extends People {
    /**
     * 說明: 
     *     由於成人與兒童標準體重計算不同，
     *     於是我們透過覆寫（overwrite），
     *     來修改父類別的方法
     */
    public function calcWeight(){
        if( $this->strGender === '男' ){
            return ($this->intHeight - 80) * 0.7;
        } else {
            return ($this->intHeight - 70) * 0.6;
        }
    }
}