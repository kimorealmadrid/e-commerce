<?php

require_once("config.php");
include('entete1.php');
//Inclusion des classes objet
require_once("classes".DIRECTORY_SEPARATOR."article.php");
require_once("classes".DIRECTORY_SEPARATOR."produit.php");
require_once("classes".DIRECTORY_SEPARATOR."livre.php");
require_once("classes".DIRECTORY_SEPARATOR."catalogue.php");

require_once("functions".DIRECTORY_SEPARATOR."db.php");
require_once("functions".DIRECTORY_SEPARATOR."fonction.php");

// mon premier code PHP
$montitre = "Site e-commerce" ;

$db = connect();

if( isset($_GET["page"]) ){
	require_once("controller".DIRECTORY_SEPARATOR.$_GET["page"].".php");
}
else{
	require_once("controller".DIRECTORY_SEPARATOR."listeProduit.php");
}

mysqli_close($db);
include('footer.php');