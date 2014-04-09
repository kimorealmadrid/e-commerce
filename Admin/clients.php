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
 <h1 style="color:#2F637A; text-decoration:underline;"><center>Administration des clients</center></h1><br><br>
 
<?php
// on se connecte à la base de données
mysql_connect("localhost","root","");
mysql_select_db("db e-com") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e.');
 
//On selectionne les données
$result = mysql_query("SELECT id,login FROM CLIENT ORDER BY id ASC");
 
//On voit si il y a quelque chose. Si il n'y a rien, on affiche un message
if(mysql_num_rows($result) == 0)
{
echo '<div class="cadre"><p>Aucune client pour le moment ! <b></b></p> </div>';
}
//Si il y a quelque chose, on affiche nos données
else {
echo '<table style="width: 100%;" cellpadding="2" cellspacing="2"> <tbody> <tr> <td class="hauttd">Cat&eacute;gories</td><td class="hauttd">Modifier</td> <td class="hauttd">Supprimer</td> </tr>';
 
while($affiche = mysql_fetch_array($result))
{
//On calcul le nombre d'article dans chaque catégorie
$calcul=$affiche['id'];
$result1 = mysql_query("SELECT id_categorie FROM CLIENT WHERE id_categorie=$calcul");

//Fin du calcul
echo '<tr><td>'.$affiche['login'].'</td> <td><a href="modifier-client.php?id='.$affiche['id'].'"><img src="images/modifier.png" alt="Modifier"/></a></td> <td><a href="supprimer-client.php?id='.$affiche['id'].'"><img src="images/supprimer.png" alt="Supprimer"/></a></td></tr>';
}
echo '</body></table>';
//On ferme else
}
?>
 
</div>
<br>
<a href=inde.php><h1><center>Administration des catégories et produits</center></h1></a></br></br></br></br></br></br></br></br></br>
 
<?php include('footer.php');?> 
 
</body>
 
</html>