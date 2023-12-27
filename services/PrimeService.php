<?php
require_once("PrimeServiceInterface.php");
require_once("../models/Prime.php");
require_once("../models/database.php");
class PrimeServices  implements PrimeServiceInterface{
    use Database;
    protected $db;
    public function addPrime(Prime $Prime){
        $db = $this->connect();
    
        $Amount = $Prime->getAmount();
        $Claim_ID = $Prime->getClaim_ID();
        $DatePrime = $Prime->getDatePrime();
    
        $query = "INSERT INTO prime ( Amount, Date,Claim_ID) VALUES ( :Amount, :Date,:Claim_ID )";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Amount", $Amount);
            $result->bindParam(":Date", $DatePrime);
            $result->bindParam(":Claim_ID", $Claim_ID);
            
            
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    



    public function ShowPrime(){
    $db = $this->connect();
    $query = "SELECT * FROM prime ORDER BY  Premium_ID DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Prime = array(); 
    foreach($fetching as $row){
        $Prime[] = new Prime($row["Premium_ID"], $row["Amount"],$row["Date"],$row["Claim_ID"]);
    }
    return $Prime;
}



public function editingPrime($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT Amount FROM prime WHERE Premium_ID = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $Amount = $result["Amount"];
            

        
            return [$Amount];
    
}

public function UpdatePrime(Prime $Prime,$id)
{
    try {
        $db = $this->connect();
        $Amount = $Prime->getAmount();
        $Date = $Prime->getDatePrime();

    $query = "UPDATE prime SET  Amount=:Amount ,Date=:Date WHERE Premium_ID = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
    $stmt->bindParam(":Amount", $Amount, PDO::PARAM_STR);
    $stmt->bindParam(":Date", $Date, PDO::PARAM_STR);
    $stmt->execute();
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

public function DeletePrime($id){
        $db = $this->connect();

        $query = "DELETE FROM prime WHERE Premium_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}
?>