<?php
// Redirection vers la page d'accueil
header("location: ..anglais/Controleur/pageAccueil2");

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
