<?php
//On récupère l'identifiant
$id= $_GET["id"];
//on initialise notre formulaire pour pouvoir le masquer
$masquer_formulaire = 0;
// on se connecte à la base de données
 
mysql_connect("localhost","root","");
mysql_select_db("db e-com") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e.');
 

//Si l'action de supprimer a été effectué
if(isset($_POST["Supprimer"]))
{
	//On efface la catégorie
	$efface_donnees = mysql_query("DELETE FROM CLIENT WHERE id = $id");
 
	//Si il y a une erreur, 
	if (!$efface_donnees) {
		die('Requête invalide : ' . mysql_error());
	}
	else {
		//Si tout c'est bien passé, on informe que le message est supprimé
		echo '<div class="cadre"><p>Le client à &eacute;t&eacute; supprim&eacute; avec succès. <a href=clients.php>Retour à l\'administration.</a></p></div>';
	}
	//on masque le formulaire pour n'afficher que le message
	$masquer_formulaire=1;
	// On ferme isset($_POST["Supprimer"]))
}
 
//on masque le formulaire en fonction des résultats
if($masquer_formulaire == 0) { 
	?>
 
	<form action="supprimer-client.php?id=<?php echo $id;?>" method="post">
	<p><input name="Supprimer" value="Supprimer le client N°<?php echo $id;?>"type="submit" /></p>
	</form>
 
	<?php 
	//on ferme la boucle if($masquer_formulaire == 0)
}
?>