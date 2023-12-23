<?php

require_once("../config/config.php");

class Database {
    protected $db;

    public function connect() {
        try {
            $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
            return $this->db;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // public function createTable() {
    //    
    //         $query = "CREATE TABLE IF NOT EXISTS Premium (
    //             Premium_ID INT PRIMARY KEY ,
    //             Amount INT ,
    //             Date DATETIME ,
    //             Claim_ID INT ,
    //             FOREIGN KEY (Claim_ID) REFERENCES Claim(Claim_ID) ON DELETE CASCADE ON UPDATE CASCADE
    //         );
            
            
            
    //         ";

    //         $this->db->exec($query);
    //  
    // }
}

// $database = new Database();
// $database->connect(); 
// $database->createTable(); 

?>
