<?php



Class Claim{




    private $Claim_ID;
    private $Descreption;
    private $DateClaim;
    private $Article_ID;
    
    public function __construct($Descreption,$DateClaim, $Article_ID){
    
      $this->Descreption = $Descreption;
      $this->DateClaim = $DateClaim;
      $this->Article_ID = $Article_ID;
       
    
    }
    
    
 
    public function getClaim_ID(){
        return $this->Claim_ID;
    }



    public function getDescreption(){
        return $this->Descreption;
    }
    public function setDescreption($Descreption){
        $this->Descreption = $Descreption;
    }
   
 
    public function getDateClaim(){
        return $this->DateClaim;
    }
    public function setDateClaim($DateClaim){
        return $this->DateClaim = $DateClaim;
    }

    public function getArticle_ID(){
        return $this->Article_ID;
    }
   


}



?>