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
<h1><center>Administration</center></h1>
 
<?php
// on se connecte à la base de données
mysql_connect("localhost","root","");
mysql_select_db("pfe") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e.');
 
//On selectionne les données
$result = mysql_query("SELECT id,nom_categorie FROM CATEGORIES ORDER BY id ASC");
 
//On voit si il y a quelque chose. Si il n'y a rien, on affiche un message
if(mysql_num_rows($result) == 0)
{
echo '<div class="cadre"><p>Aucune catégorie pour le moment! <b>>><a title="Ajouter une  cat&eacute;gorie" href="ajouter-categorie.php">Ajouter une cat&eacute;gorie</a></b></p> </div>';
}
//Si il y a quelque chose, on affiche nos données
else {

 $i=0;
while($affiche = mysql_fetch_array($result))
{
//On calcul le nombre d'article dans chaque catégorie

//Fin du calcul

$table[$i]=$affiche['nom_categorie'];
$i++;
}echo '<table style="width: 100%;" cellpadding="2" cellspacing="2">';
$i=0;
while($affiche = mysql_fetch_array($result))
{
echo '<table style="width: 100%;" cellpadding="2" cellspacing="2"><tr><td>'.$table[$i].'</td><td>'.$table[$i+1].'</td></tr>';
//On ferme else
$i+=2;
}
echo'</table>';}
?>
 
</div></br></br></br></br></br></br></br></br></br>
 
<?php include('footer.php');?> 
 
</body>
 
</html>