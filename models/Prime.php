<?php



Class Prime{



    private $Premium_ID;
    private $Amount;
    private $DatePrime;
    private $Claim_ID;
    
    public function __construct($Amount,$DatePrime, $Claim_ID){
    
      $this->Amount = $Amount;
      $this->DatePrime = $DatePrime;
      $this->Claim_ID = $Claim_ID;
       
    
    }
    
    
 
    
    public function getPremium_ID(){
        return $this->Premium_ID;
    }


    public function getAmount(){
        return $this->Amount;
    }
    public function setAmount($Amount){
        $this->Amount = $Amount;
    }
   
 
    public function getDatePrime(){
        return $this->DatePrime;
    }
    public function setDatePrime($DatePrime){
        return $this->DatePrime = $DatePrime;
    }

  
   

    public function getClaim_ID(){
        return $this->Claim_ID;
    }
}



?>