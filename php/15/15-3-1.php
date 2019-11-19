<?php
namespace ns_15_3_1_A;

class A {
    private $strName;
    private $strMsg;
    public function __construct(){
        $this->strMsg = 'ns_15_3_1_A';
    }
    public function setName($name){
        $this->strName = $name;
    }
    public function getName(){
        return $this->strName;
    }
    public function getMsg(){
        return $this->strMsg;
    }
    public function __destruct(){
        echo "...再見了".$this->strName;
    }
}