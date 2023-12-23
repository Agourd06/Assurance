<?php

require_once("../services/AssuranceService.php");
require_once("../models/Assurance.php");


//Show clients
        $clients = new AssuranceService();
        
    $affichages = $clients->ShowAssurance();
   ?>