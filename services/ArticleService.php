<?php
require_once("ArticleServiceInterface.php");
require_once("../models/Article.php");
require_once("../models/database.php");
class ArticleService extends Database implements ArticleServiceInterface{

    protected $db;
    public function addArticle(Article $article){
        $db = $this->connect();
    
        $Title = $article->getTitle();
        $Description = $article->getDescription();
        $userId = $article->getUserId();
        $Assurance_ID = $article->getAssurance_ID();
    
        $query = "INSERT INTO article (Title, Description, userId, Assurance_ID) VALUES (:Title, :Description, :userId, :Assurance_ID)";
        
        try {
            $result = $db->prepare($query);
            $result->bindParam(":Title", $Title);
            $result->bindParam(":Description", $Description);
            $result->bindParam(":userId", $userId);
            $result->bindParam(":Assurance_ID", $Assurance_ID);
            
            $result->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    



public function ShowArticle(){
    $db = $this->connect();
    $query = "SELECT * FROM article ORDER BY  Article_ID DESC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $fetching = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Article = array(); 
    foreach($fetching as $row){
        $Article[] = new Article($row["Article_ID"], $row["Title"], $row["Description"], $row["Date"], $row["userId"]);
    }
    return $Article;
}


    
    public function editingArticle($id){
       

        $db = $this->connect();
            $articleInfo = "SELECT Title , Description FROM article WHERE Article_ID = $id";
            $getArticle = $db->query($articleInfo);
            $result = $getArticle->fetch(PDO::FETCH_ASSOC);
            $Title = $result["Title"];
            $description = $result["Description"];
            

        
            return [$Title,$description];
    
}

    public function UpdateArticle(Article $article,$id){
        $db = $this->connect();
        $Title = $article->getTitle();
        $description = $article->getDescription();
       
        $query  = "UPDATE article SET Title=:Title , Description=:Description   WHERE article_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":Title", $Title, PDO::PARAM_STR);
        $stmt->bindParam(":Description", $description, PDO::PARAM_STR);
        $stmt->execute();

    }
//     public function DeleteArticle($id){
//         $db = $this->connect();

//         $query = "DELETE FROM client WHERE userId = :id";
//         $stmt = $db->prepare($query);
//         $stmt->bindParam(":id", $id, PDO::PARAM_INT);
//         $stmt->execute();
//     }


}
?>