<?php
// Redirection vers la page d'accueil
header("location: ../Controleur/pageAccueil2.php");

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
