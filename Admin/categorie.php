<?php
//on r�cup�re l'identifiant depuis l'url
$id=$_GET['id'];
 
echo '<h1>Cat&eacute;gorie '.$id.'</h1>';
 
// on se connecte � la base de donn�es
 
mysql_connect("localhost","root","");
mysql_select_db("pfe") or die('Impossible de s&eacute;lectionner une base de donn&eacute;e.');
 
//On selectionne les donn�es
$result = mysql_query("SELECT id,id_categorie,titre FROM PRODUITS WHERE id_categorie='$id'  ORDER BY id ASC");
 
//on voit si il y a quelque chose
if(mysql_num_rows($result) == 0)
{
echo '<div class="cadre"><p>Aucun article pour le moment!</p></div>';
}
//Si la table contient des articles, on affiche les donn�es
else {
echo '<table style="width: 100%;" cellpadding="2" cellspacing="2">  <tbody>   <tr>    <td class="hauttd">Article</td>    <td class="hauttd">Modifier</td>    <td class="hauttd">Supprimer</td>   </tr>';
 
while($affiche = mysql_fetch_array($result))
 {
  echo '<tr><td><a href="http://'.$_SERVER['HTTP_HOST'].'/page.php? id='.$affiche['id'].'">'.$affiche['titre'].'</a></td>   <td><a href="modifier-article.php?id='.$affiche['id'].'"><img src="images/modifier.png" alt="Modifier"/></a></td>   <td><a href="supprimer-article.php?id='.$affiche['id'].'"><img src="images/supprimer. png" alt="Supprimer"/></a></td></tr>';
 } 
echo '</tbody></table>';
//On ferme else
 }
?>