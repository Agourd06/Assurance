<?php

require_once("../services/ClientServices.php");
require_once("../models/Client.php");


//Show clients
        $clients = new ClientServices();
        
    $affichages = $clients->ShowClient();
   


    //Add Clients

    if(isset($_POST["addclient"])) {
    $fullname = $_POST["fullname"];
    $CIN = $_POST["CIN"];
    $adress = $_POST["adress"];
    $phone = $_POST["phone"];
    $userId = '';

    $client = new Client($userId,$fullname, $CIN, $adress, $phone);

    $clients->addClient($client);
header('location:../views/client.php');
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