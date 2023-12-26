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
    $assuranceId = $assurclient->ShowAssurClient($clientId);
foreach($assuranceId as $assId) {
    $Article = new Article($Article_Id,$titre,$Description,$clientId,$assId);
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
        
        header('Location: ../views/article.php');
        exit;
    } else {
        echo "Error retrieving client data.";
        exit;
    }
}

// edit clinent
if(isset($_POST["update"])) {
    $fullname = $_POST["fullname"];
    $CIN = $_POST["CIN"];
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $userId = $_POST["update"];

    $client = new Client($userId,$fullname, $CIN, $adress, $phone);

    $clients->UpdateClient($client,$userId);
    unset($_SESSION["userId"]);
header('location:../views/client.php');

    }

//     //delete client
//     if(isset($_POST["delete"])) {
//         $id = $_POST["delete"];
  
//         $clients->DeleteClient($id);
//     header('location:../views/client.php');
    
//         }
?>