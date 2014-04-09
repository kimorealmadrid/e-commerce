<?php
include('entete.php');
	include('connection.php');
	$requet9="SELECT * FROM  `db e-com`.`produits` WHERE (`id` LIKE  '%".$_POST['keyword']."%' OR  `titre` LIKE  '%".$_POST['keyword']."%' OR `prix` LIKE  '%".$_POST['keyword']."%'OR `description` LIKE  '%".$_POST['keyword']."%')";

$result9=mysql_query($requet9) or die ('erreur a la recherche ');
echo '<h4>Resultats de la recherche :</h4>';
if($result9)
{
	echo '<table border="1px dotted black"><tr><th>id </th><th>titre</th><th>description</th><th>photo     </th><th>prix     </th></tr>';
	while($ligne=mysql_fetch_object($result9))
	{
		$id=$ligne->id;
		$titre=$ligne->titre;
		$description=$ligne->description;
		$photo=$ligne->photo;
		$prix=$ligne->prix;
		
		echo "<tr><td>".$id."</td><td>".$titre."</td><td>".$description."</td><td>".$photo."</td><td>".$prix."</td></tr>";
	}
	echo '</table>';
}
?>
<a href='index.php' >Retourner a la page d'accueil </a>
<?php include('footer.php');?>