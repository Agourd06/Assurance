<?php
require_once("AssuranceServiceinterface.php");
require_once("../models/Assurance.php");
require_once("../models/database.php");
class AssuranceService extends Database implements AssuranceServiceinterface{

    protected $db;
    public function addAssurance(assurance $assurance){
        $db = $this->connect();

        $name = $assurance->getAssuranceName();
        $logo = $assurance->getlogo();
        

        $query = "INSERT INTO assurance (Name,Logo) VALUES (:Name,:Logo)";
        $result = $db->prepare($query);
        $result->bindparam(":Name", $name);
        $result->bindparam(":Logo", $logo);
   
        $result->execute();
    }





public function ShowAssurance(){
    $db = $this->connect();
    $query = "SELECT * FROM assurance ORDER BY  Assurance_ID DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $assurances = array(); 
    foreach($fetching as $row){
        $assurances[] = new Assurance($row["Assurance_ID"], $row["Name"], $row["Logo"]);
    }
    return $assurances;
}


    
    public function editingAssurance($id){
       

        $db = $this->connect();
            $clientInfo = "SELECT * FROM client WHERE userId = $id";
            $getClient = $db->query($clientInfo);
            $result = $getClient->fetch(PDO::FETCH_ASSOC);
        
            $fullname = $result["FullName"];
            $adress = $result["Adress"];
            $CIN = $result["CIN"];
            $phone = $result["Number"];

        
            return [$fullname, $adress,$CIN, $phone];
    
}


    public function UpdateAssurance(assurance $assurance,$id){
        $db = $this->connect();
        $FullName = $client->getusername();
        $CIN = $client->getCIN();
        $adress = $client->getadress();
        $Phone = $client->getNumber();
        $query  = "UPDATE client SET FullName=:FullName , CIN=:CIN , Adress=:adress, Number=:Phone WHERE userId = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":FullName", $FullName, PDO::PARAM_STR);
        $stmt->bindParam(":adress", $adress, PDO::PARAM_STR);
        $stmt->bindParam(":CIN", $CIN, PDO::PARAM_STR);
        $stmt->bindParam(":Phone", $Phone, PDO::PARAM_STR);
        $stmt->execute();

    }
    public function DeleteAssurance($id){
        $db = $this->connect();

        $query = "DELETE FROM client WHERE userId = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>