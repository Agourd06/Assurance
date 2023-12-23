<?php



Class Assurance{


private $Assurance_ID;
private $Name;
private $logo;

public function __construct($Assurance_ID,$Name,$logo){
$this->Assurance_ID = $Assurance_ID;
    $this->Name= $Name;
    $this->logo = $logo ;
   

}


public function getAssuranceId(){
    return $this->Assurance_ID;
}

public function getAssuranceName(){
    return $this->Name;
}
public function setAssuranceName($Name){
    $this->Name = $Name;
}
public function getlogo(){
    return $this->logo;
}
public function setlogo($logo){
    $this->logo = $logo;
}


}


?>