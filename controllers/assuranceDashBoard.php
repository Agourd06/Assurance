<?php

require_once("../services/AssuranceService.php");
require_once("../services/ClientServices.php");

require_once("../models/Assurance.php");
session_start();

if (isset($_POST["idAssur"])) {
    $id = $_POST["idAssur"];
    $_SESSION["idassur"] = $id;
    
    $clients = new ClientServices();
    $affichfiltredclient = $clients->ShowfiltredClient($id);

    $encodedData = urlencode(json_encode($affichfiltredclient));

    header('Location: ../views/Assureure.php?clientfiltered=' . $encodedData);
    exit();
}


//Show Assurance
        $asuurances = new AssuranceService();
        
    $AffichAssur = $asuurances->ShowAssurance();
// add assurance

if(isset($_POST["addAssurance"])) {
    $logo = $_POST["Logo"];
    $name = $_POST["Name"];
   
    $assurance_ID = '';

    $assurance = new Assurance($assurance_ID,$logo, $name);

    $asuurances->addAssurance($assurance);
header('location:../views/Assureure.php');
    }


    //    Display assurance data for edit

$logo = '';
$name = '';



if (isset($_POST["edit"]) && isset($_POST["editing"])) {
    $id = $_POST["editing"];

    $assuranceData = $asuurances->editingAssurance($id);

    if ($assuranceData) {
        $_SESSION['editedAssuranceData'] = $assuranceData;
        $_SESSION['Assurance_Id'] = $id;
        header('Location: ../views/Assureure.php');
        exit;
    } else {
        echo "Error retrieving client data.";
        exit;
    }
}

// edit assurances
if(isset($_POST["update"])) {
    $name = $_POST["Name"];
    $logo = $_POST["Logo"];
  
    $assurance_ID = $_POST["update"];

    $assurance = new Assurance($assurance_ID,$logo, $name);

    $asuurances->UpdateAssurance($assurance,$assurance_ID);
    unset($_SESSION["Assurance_Id"]);
header('location:../views/Assureure.php');

    }

    //delete client
    if(isset($_POST["delete"])) {
        $id = $_POST["delete"];
  
        $asuurances->DeleteAssurance($id);
    header('location:../views/Assureure.php');
    
        }
?>