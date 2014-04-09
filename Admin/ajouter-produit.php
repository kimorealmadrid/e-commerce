<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/
DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr-fr">
 
<head>
 
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
  <link href="../style.css" rel="stylesheet" type="text/css"/>
  <title>Ajouter un produit</title>
</head>
 
 
<body>
 <?php include('entete.php');?>   
<div id="moncadre">
 
<div class="cadrecentrale">
<h1>Ajouter un produit</h1>
<?php
//Si l'action de valider a été faite
if(isset($_POST["Valider"]))
{
$titre = htmlspecialchars(stripcslashes(trim($_POST["titre"])));
$description = htmlspecialchars(stripcslashes($_POST["description"]));
$photo = htmlspecialchars(stripcslashes($_POST["photo"]));
$prix = htmlspecialchars(stripcslashes($_POST["prix"]));
//Vérification du formulaire
if(empty($titre)){
$alerte0 ='<div class="erreur"><a name="ok"></a>Vous n\'avez pas saisie de titre.</div>';
}
else if(empty($description)){
$alerte1 ='<div class="erreur"><a name="ok"></a>Vous n\'avez pas saisie de description. </div>';
}
else if(empty($photo)){
$alerte2 ='<div class="erreur"><a name="ok"></a>Vous n\'avez pas entrer une photo. </div>';
}else if(empty($prix)){
$alerte3 ='<div class="erreur"><a name="ok"></a>Vous n\'avez pas saisie de prix. </div>';
}
//Si tout est ok
else
{
//on se connecte à la base de données
 
mysql_connect("localhost","root","");
mysql_select_db("db e-com") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e. Assurez vous d\'avoir correctement remplit les donn&eacute;es du fichier connexion_bd.php.');
 
//on enregistre les données
$var=$_GET['id'];
$result = mysql_query("INSERT INTO PRODUITS VALUES ( '','.$var.', '".mysql_real_escape_string($titre)."', '".mysql_real_escape_string($description)."','".mysql_real_escape_string($photo)."','".mysql_real_escape_string($prix)."')");
//Si il y a une erreur, on crie ^^
if (!$result) {
    die('Requête invalide : ' . mysql_error());
}
else{
//Si tout est ok, on informe le webmaster
$message_ok = '<div class="erreur"><a name="ok"></a><b>Produit enregistr&eacute;e  avec succ&egrave;s!</b>. <a href=produits.php?id='.$_GET['id'].'> Retour à l\'administration.</a></p></div>';
}
//On ferme else
}
//On ferme if(isset($_POST["Valider"]))
}
?>
 
  <?php 
  if(isset($message_ok))
  {
  echo $message_ok;
  }
  ?>
<form action="#ok" method="post">
<fieldset> 
  <?php 
  if(isset($alerte0))
  {
  echo $alerte0;
  }
  ?>
 <p>Titre du produit :<br/>
 <input name="titre" size="65" value="<?php  if (!empty($_POST["titre"])) {  echo stripcslashes(htmlspecialchars($_POST["titre"],ENT_QUOTES));  }?>" type="text"/></p>
  <?php 
  if(isset($alerte1))
  {
  echo $alerte1;
  }
  ?>
 <p>Description du produit :<br/>
 <textarea name="description" rows="10" cols="50" ><?php
 if (!empty($_POST["description"])) {
 echo stripcslashes(htmlspecialchars($_POST["description"],ENT_QUOTES));
 }?></textarea></p>
 <p>Photo du produit :<br/>
 <input name="photo" type="file" >
 <?php
 if (!empty($_POST["photo"])) {
 echo stripcslashes(htmlspecialchars($_POST["photo"],ENT_QUOTES));
 }?></p>
  <?php 
  if(isset($alerte2))
  {
  echo $alerte2;
  }
  ?>
 <p>
 <p>Prix du produit :<br/>
 <input name="prix" type="text" ><?php
 if (!empty($_POST["prix"])) {
 echo stripcslashes(htmlspecialchars($_POST["prix"],ENT_QUOTES));
 }?></p>
  <?php 
  if(isset($alerte3))
  {
  echo $alerte3;
  }
  ?>
 <p>
 <input name="Valider" value="Valider" type="submit"/>
 <input name="Effacer" value="Effacer" type="reset"/>
 </p>
 </fieldset> 
</form>
</div>
 
 
</div>
 </div></br></br></br>
 
<?php include('footer.php');?> 
</body>
</html>
