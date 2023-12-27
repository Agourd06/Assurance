<?php
require_once("AssuranceServiceinterface.php");
require_once("../models/Assurance.php");
require_once("../models/database.php");
class AssuranceService implements AssuranceServiceinterface{
    use Database;

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
            $AssuranceInfo = "SELECT * FROM assurance WHERE Assurance_ID  = $id";
            $getAssurance = $db->query($AssuranceInfo);
            $result = $getAssurance->fetch(PDO::FETCH_ASSOC);
        
            $logo = $result["Logo"];
            $name = $result["Name"];
         

        
            return [$name, $logo];
    
}


    public function UpdateAssurance(assurance $assurance,$id){
        $db = $this->connect();
        $name = $assurance->getAssuranceName();
        $logo = $assurance->getlogo();
      
        $query  = "UPDATE assurance SET Name=:name , Logo=:logo  WHERE Assurance_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":logo", $logo, PDO::PARAM_STR);

        $stmt->execute();

    }
    public function DeleteAssurance($id){
        $db = $this->connect();

        $query = "DELETE FROM assurance WHERE Assurance_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>