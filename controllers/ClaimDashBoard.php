<?php

require_once("../services/ClaimServices.php");
require_once("../models/Claim.php");
require_once("../services/ArticleService.php");
require_once("../models/Article.php");
   

//Show claim
$Articles = new ArticleService();

    $Claims = new ClaimServices();
   $AffichClaims = $Claims->ShowClaim();
   $Afficharticle = $Articles->ShowArticle();


    //Add claim 

    if(isset($_POST["addClaim"])) {
    $Description = $_POST["Description"];
   $Article_ID = $_POST["ArticleId"];
    $Claim_ID = '';
    $Date = date("Y-m-d h:i:sa");

    $claim = new Claim($Claim_ID, $Description, $Date, $Article_ID);

    $Claims->addClaim($claim);
 
   
    header('location:../views/Claim.php');
    }

    //Display claim data for edit

    $Descreption = '';

session_start();


if (isset($_POST["edit"]) && isset($_POST["editing"])) {
    $id = $_POST["editing"];

    $ClaimData = $Claims->editingClaim($id);

    if ($ClaimData) {
        $_SESSION['editedClaimData'] = $ClaimData;
        $_SESSION['ClaimId'] = $id;
        header('Location: ../views/claim.php');
        exit;
    } else {
        echo "Error retrieving client data.";
        exit;
    }
}

// edit claim
if(isset($_POST["update"])) {
    $Claim_ID = $_POST["update"];
    $Description = $_POST["Description"];
    $ArticleId = '';
    $Date = date("Y-m-d h:i:sa");

    $Claim = new Claim($Claim_ID, $Description, $Date, $ArticleId);

    $Claims->UpdateClaim($Claim, $Claim_ID);
    unset($_SESSION['ClaimId']);
    header('location:../views/claim.php');
}


    //delete client
    if(isset($_POST["delete"])) {
        $id = $_POST["delete"];
  
        $Claims->DeleteClaim($id);
    header('location:../views/claim.php');
    
        }
?>