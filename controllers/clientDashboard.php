<?php

require_once("../services/ClientServices.php");
require_once("../services/AssuranceService.php");
require_once("../models/Client.php");
require_once("../services/AssurClientService.php");

    $asuurances = new AssuranceService();
    $AffichAssur = $asuurances->ShowAssurance();
//Show clients
        $clients = new ClientServices();
    $affichages = $clients->ShowClient();
        
   
$assurcliant = new AssurClientService();

    //Add Clients 

    if(isset($_POST["addclient"])) {
    $fullname = $_POST["fullname"];
    $CIN = $_POST["CIN"];
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $userId = '';
    $assuranceId=$_POST["assurId"];
    $client = new Client($userId,$fullname, $CIN, $adress, $phone);
    $clienId = $clients->addClient($client);

    $assurclient = new AssurClient($clienId,$assuranceId);
    $assurcliant->addAssurofuser($assurclient);
   
header('location:../views/assureure.php');
    }

//    Display client data for edit

$fullname = '';
$CIN = '';
$adress = '';
$phone = '';

session_start();


if (isset($_POST["edit"]) && isset($_POST["editing"])) {
    $id = $_POST["editing"];

    $clientData = $clients->editingClient($id);

    if ($clientData) {
        $_SESSION['editedClientData'] = $clientData;
        $_SESSION['userId'] = $id;
        header('Location: ../views/client.php');
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

    //delete client
    if(isset($_POST["delete"])) {
        $id = $_POST["delete"];
  
        $clients->DeleteClient($id);
    header('location:../views/client.php');
    
        }
?>