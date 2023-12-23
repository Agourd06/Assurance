<?php



Class Article{


    private $Article_ID;
    private $Title;
    private $Description;
    private $DateArticle;
    private $userId;
    private $Assurance_ID;

    



    public function __construct($Title,$Description,$DateArticle,$userId,$Assurance_ID){
        $this->Title= $Title;
        $this->Description = $Description ;
        $this->DateArticle = $DateArticle;
        $this->userId = $userId ;
        $this->Assurance_ID = $Assurance_ID;
        


    }




    public function getArticle_ID(){
        return $this->Article_ID;
    }
    
    public function getTitle(){
        return $this->Title;
    }
    public function setTitle($Title){
        $this->Title = $Title;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function setDescription($Description){
        $this->Description = $Description;
    }
    public function getDateArticle(){
        return $this->DateArticle;
    }
    public function setDateArticle($DateArticle){
        $this->DateArticle = $DateArticle;
    }
    public function getuserId(){
        return $this->userId;
    }
    public function getAssurance_ID(){
        return $this->Assurance_ID;
    }
   
    }
    

?>
