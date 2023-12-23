<?php



Class AssurClient{


private $Assurance_ID;
private $userId;

public function __construct($userId,$Assurance_ID){

    $this->userId= $userId;
    $this->Assurance_ID = $Assurance_ID ;
   

}


public function getAssuranceId(){
    return $this->Assurance_ID;
}
public function getClientId(){
    return $this->userId;
}




}


?>