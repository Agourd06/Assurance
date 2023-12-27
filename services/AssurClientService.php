<?php
require_once("../models/database.php");
require_once("../models/AssurClient.php");
require("AssurClientServiceInerface.php");

class AssurClientService implements AssurClientServiceInerface
{
    use Database;

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

    public function ShowAssurClient($id)
    {
        $db = $this->connect();
    
        if (empty($id)) {
            return null; 
        }
    

        $query = "SELECT Assurance_ID FROM assurclient WHERE userId = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $fetching = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fetching;
    }
    
}
