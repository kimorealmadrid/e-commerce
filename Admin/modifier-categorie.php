<?php
//On récupère l'id transmit par url pour la placer dans une variable 
$id = $_GET["id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/ DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr-fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />   
<link href="../style.css" rel="stylesheet" type="text/css"/>   
<title>Modifier une cat&eacute;gorie</title> 
</head>   
 
<body>   
<?php include('entete.php');?>   
<div id="moncadre"> 
 
<div class="cadrecentrale"> 
<h1>Modifier cat&eacute;gorie</h1> 
<?php 
//on se connecte à la base de données 
  
mysql_connect("localhost","root",""); 
mysql_select_db("db e-com") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e. Assurez vous d\'avoir correctement remplit les donn&eacute;es du fichier data_bd.php.');   
//Si l'action de modifier a été faite 
if(isset($_POST["Modifier"])) 
{ 
	$titre = htmlspecialchars(stripcslashes(trim($_POST["titre"]))); 
	$description = htmlspecialchars(stripcslashes($_POST["description"]));   
	//on enregistre les données 
	$result = mysql_query("UPDATE CATEGORIES SET nom_categorie='".mysql_real_escape_string($titre)."', description_categorie='".mysql_real_escape_string($description)."'  WHERE id = '$id'");
	//Si il y a une erreur, on crie ^^ 
	if (!$result){
		die('Requête invalide : ' . mysql_error()); 
	} 
	else
	{ 
		//on informe que le message est enregistré 
		echo '<div class="cadre"><p>La modification à été éffectué avec succès. <a href=inde.php> Retour à l\'administration.</a></p></div>';
	}				  
	//on ferme if(isset($_POST["Modifier"])) 
} 
?> 
<form action="modifier-categorie.php?id=<?php echo $id;?>" method="post"> 
<fieldset>   
<?php 
$result = mysql_query("SELECT * FROM CATEGORIES WHERE id = $id");   
while($affiche = mysql_fetch_array($result)){ 
	?> 
	<p>Titre de la cat&eacute;gorie :<br/>  
	<input name="titre" size="65" value="<?php echo $affiche['nom_categorie'];?>"  type="text"/> </p> 
	<p>Description de la cat&eacute;gorie :<br/>  
	<textarea name="description" rows="10" cols="50" ><?php echo $affiche['description_categorie'];?></textarea> </p> 
	<?php 
	//On ferme la boucle while 
} 
?> 
<input name="Modifier" value="Modifier" type="submit"/> 
<input name="Effacer" value="Effacer" type="reset"/>   
</fieldset> 
</form>  
</div>   

</div> 
</div></br></br></br></br></br></br></br></br></br>
 
<?php include('footer.php');?>   
</body>   
</html>