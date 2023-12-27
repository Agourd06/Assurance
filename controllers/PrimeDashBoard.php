<?php

require_once("../services/PrimeService.php");
require_once("../models/Prime.php");
require_once("../services/ClaimServices.php");
require_once("../models/Claim.php");
   

//Show Prime
$Prime = new PrimeServices();

    $Claims = new ClaimServices();
   $AffichClaims = $Claims->ShowClaimPrime();
   $AffichePrime = $Prime->ShowPrime();

    //Add Prime
    if(isset($_POST["addprime"])) {
    $Amount = $_POST["Amount"];
   $Claim_ID = $_POST["ClaimId"];
    $Prime_ID = '';
    $Date = date("Y-m-d h:i:sa");

    $prime = new Prime($Prime_ID, $Amount, $Date, $Claim_ID);

    $Prime->addPrime($prime);
 
   
    header('location:../views/prime.php');
    }

    //Display Prime data for edit

    $Amount = '';

session_start();


if (isset($_POST["edit"]) && isset($_POST["editing"])) {
    $id = $_POST["editing"];

    $PrimeData = $Prime->editingPrime($id);

    if ($PrimeData) {
        $_SESSION['editedPrimeData'] = $PrimeData;
        $_SESSION['PrimeId'] = $id;
        header('Location: ../views/prime.php');
        exit;
    } else {
        echo "Error retrieving client data.";
        exit;
    }
}

// edit claim
if(isset($_POST["update"])) {
    $Prime_ID = $_POST["update"];
    $Claim_ID = '';
   
    $Amount = $_POST["Amount"];
     $Date = date("Y-m-d h:i:sa");
    $prime = new prime($Prime_ID, $Amount, $Date, $Claim_ID);

    $Prime->UpdatePrime($prime, $Prime_ID);
    unset($_SESSION['PrimeId']);
    header('location:../views/prime.php');
}


    //delete client
    if(isset($_POST["delete"])) {
        $id = $_POST["delete"];
  
        $Prime->DeletePrime($id);
    header('location:../views/prime.php');
    
        }
?>