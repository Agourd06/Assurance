<?php

require_once("../services/ClientServices.php");
require_once("../models/Client.php");
require_once("../services/ArticleService.php");
require_once("../models/Article.php");
require_once("../services/AssurClientService.php");
    // $asuurances = new AssuranceService();
    // $AffichAssur = $asuurances->ShowAssurance();

//Show Article
      
    $Articles = new ArticleService();
   $assurclient = new  AssurClientService();    
   $Afficharticle = $Articles->ShowArticle();

    //Add Article 

    if(isset($_POST["addArticle"])) {
    $titre = $_POST["Titre"];
    $Description = $_POST["Description"];
    $clientId = $_POST["clienId"];
    $Article_Id = '';
    $Date = date("Y-m-d h:i:sa");

    $assuranceId = $assurclient->ShowAssurClient($clientId);
foreach($assuranceId as $assId) {
    $Article = new Article($Article_Id, $titre, $Description, $Date, $clientId, $assId);
}
   $Articles->addArticle($Article);
 
   
    header('location:../views/Article.php');
    }

    //Display article data for edit

$Title = '';
$description = '';

session_start();


if (isset($_POST["edit"]) && isset($_POST["editing"])) {
    $id = $_POST["editing"];

    $ArticleData = $Articles->editingArticle($id);

    if ($ArticleData) {
        $_SESSION['editedArticleData'] = $ArticleData;
        $_SESSION['ArticleId'] = $id;
        header('Location: ../views/article.php');
        exit;
    } else {
        echo "Error retrieving client data.";
        exit;
    }
}

// edit Articles
if(isset($_POST["update"])) {
    $Article_ID = $_POST["update"];
    $titre = $_POST["Titre"];
    $Description = $_POST["Description"];
    $clientId = '';
    $assuranceId = '';
    $Date = date("Y-m-d h:i:sa");

    $Article = new Article($Article_ID, $titre, $Description, $Date,$clientId, $assuranceId);

    $Articles->UpdateArticle($Article, $Article_ID);
    unset($_SESSION['ArticleId']);
    header('location:../views/article.php');
}


    //delete client
    if(isset($_POST["delete"])) {
        $id = $_POST["delete"];
  
        $Articles->DeleteArticle($id);
    header('location:../views/article.php');
    
        }
?>