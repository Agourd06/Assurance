<?php
require_once("../models/database.php");
require("AssurClientServiceInerface.php");

class AssurClientService extends Database implements AssurClientServiceInerface
{

    protected $db;


    public function addAssurofuser(AssurClient $assurClient)
    {

        $db = $this->connect();

        $Assurance_ID = $assurClient->getAssuranceId();
        $userId = $assurClient->getClientId();
  
       
       


 
        $addag = "INSERT INTO assurclient (userId,Assurance_ID)  VALUES ( :userId,:Assurance_ID)";
        $stmt = $db->prepare($addag);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":Assurance_ID", $Assurance_ID);
        
      

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
