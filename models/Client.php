<?php


Class Client{

    private $userId;
    private $FullName;
    private $CIN;
    private $adress;

    private $Number;
    
    public function __construct($userId,$FullName,$CIN,$adress,$Number){
        $this->FullName= $FullName;
        $this->CIN = $CIN ;
        $this->adress = $adress;
        $this->Number = $Number ;
        $this->userId = $userId;
       

    }



    public function getuserId(){
        return $this->userId;
    }
    
    public function getusername(){
        return $this->FullName;
    }
    public function setusername($FullName){
        $this->FullName = $FullName;
    }
    public function getCIN(){
        return $this->CIN;
    }
    public function setCIN($CIN){
        $this->CIN = $CIN;
    }
   
 
    public function getadress(){
        return $this->adress;
    }
    public function setadress($adress){
        return $this->adress = $adress;
    }

    public function getNumber(){
        return $this->Number;
    }
    public function setNumber($Number){
        $this->Number = $Number;
    }
}



?>


