<?php
require_once("ClientServicesInterface.php");
require_once("../models/Client.php");
require_once("../models/database.php");
class ClientServices extends Database implements ClientServicesInterface{

    protected $db;
    public function addClient(Client $client){
        $db = $this->connect();

        $FullName = $client->getusername();
        $CIN = $client->getCIN();
        $adress = $client->getadress();
        $Phone = $client->getNumber();

        $query = "INSERT INTO client (FullName,CIN,Adress,Number) VALUES (:FullName,:CIN,:adress,:Phone)";
        $result = $db->prepare($query);
        $result->bindparam(":FullName", $FullName);
        $result->bindparam(":CIN", $CIN);
        $result->bindparam(":adress", $adress);
        $result->bindparam(":Phone", $Phone);
        $result->execute();
        $userid = $db->lastInsertId();
        return $userid;
    }



public function ShowClient(){
    $db = $this->connect();
    $query = "SELECT * FROM client ORDER BY  userId DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $clients = array(); 
    foreach($fetching as $row){
        $clients[] = new client($row["userId"], $row["FullName"], $row["CIN"], $row["Adress"], $row["Number"]);
    }
    return $clients;
}

public function ShowfiltredClient($id){
    $db = $this->connect();
    $query = "SELECT client.userId, client.FullName FROM client
    JOIN assurclient ON assurclient.userId = client.userId
    WHERE assurclient.Assurance_ID = $id
    ORDER BY userId DESC";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $fetching;
}

    
    public function editingClient($id){
       

        $db = $this->connect();
            $clientInfo = "SELECT * FROM client WHERE userId = $id";
            $getClient = $db->query($clientInfo);
            $result = $getClient->fetch(PDO::FETCH_ASSOC);
            $userId = $result["userId"];
            $fullname = $result["FullName"];
            $adress = $result["Adress"];
            $CIN = $result["CIN"];
            $phone = $result["Number"];

        
            return [$userId,$fullname, $adress,$CIN, $phone];
    
}

    public function UpdateClient(Client $client,$id){
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
    public function DeleteClient($id){
        $db = $this->connect();

        $query = "DELETE FROM client WHERE userId = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>