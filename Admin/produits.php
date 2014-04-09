<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/  DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr-fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
  <link href="../style.css" rel="stylesheet" type="text/css"/>
          <title>Administration</title>
</head>
<body> 
<?php include('entete.php');?>   
<div class="cadrecentrale">
<?php
//on récupère l'identifiant depuis l'url
$id=$_GET['id'];
 
echo '<h1>Cat&eacute;gorie '.$id.'</h1>';
 
// on se connecte à la base de données
 
mysql_connect("localhost","root","");
mysql_select_db("db e-com") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e.');
 
//On selectionne les données
$result = mysql_query("SELECT id,id_categorie,titre FROM PRODUITS WHERE id_categorie='$id'  ORDER BY id ASC");
 
//on voit si il y a quelque chose
if(mysql_num_rows($result) == 0)
{
echo '<div class="cadre"><p>Aucune produit pour le moment! <b>>><a title="Ajouter un produit" href="ajouter-produit.php?id='.$_GET['id'].'">Ajouter un produit</a></b></p> </div>';
}
//Si la table contient des articles, on affiche les données
else {
echo '<table style="width: 100%;" cellpadding="2" cellspacing="2"> <tbody> <tr> <td class="hauttd">Produits</td> <td class="hauttd">Ajouter</td><td class="hauttd">Modifier</td> <td class="hauttd">Supprimer</td> </tr>';
 
while($affiche = mysql_fetch_array($result))
 {
echo '<tr><td><a href="produits.php?id='.$affiche['id'].'">'.$affiche['titre'].'</a></td> <td><a href="ajouter-produit.php?id='.$_GET['id'].'"><img src="images/ajouter.png" alt="Ajouter"/></a></td><td><a href="modifier-produit.php?id='.$affiche['id'].'"><img src="images/modifier.png" alt="Modifier"/></a></td> <td><a href="supprimer-produit.php?id='.$affiche['id'].'"><img src="images/supprimer.png" alt="Supprimer"/></a></td></tr>';
 } 
echo '</tbody></table>';
//On ferme else
 }
?> 
</div>
<br>
<a href=inde.php><h1><center>Administration des catégories</center></h1></a>
</br></br></br></br></br></br></br></br></br>
 
<?php include('footer.php');?> 
 
</body>
 
</html>