<?php



Class Article{


    private $Article_ID;
    private $Title;
    private $Description;
    private $DateArticle;
    private $userId;
    private $Assurance_ID;

    



    public function __construct($Article_ID,$Title,$Description,$date,$userId){
        $this->Title= $Title;
        $this->Description = $Description ;
        $this->userId = $userId ;

$this->DateArticle = $date;
   $this->Article_ID = $Article_ID;
        


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
    public function getuserID(){
        return $this->userId;
    }
    public function getAssurance_ID(){
        return $this->Assurance_ID;
    }
   
    }
    

?>
