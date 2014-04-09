<?php
$message = "";

if( isset($_GET["export"]) && $_GET["export"] == 1 ){
	exportAll();
	$message = "----Export OK----";
}
?>

<html>
	<head>
		<title><?php echo $montitre ; ?></title>
	</head>
	<body>
	<?php
	if( $message != "" ){
		echo "<h3><font color=\"Green\">".$message."</font></h3>";
	}
	?>
	
	<h3>Liste de nos produits :&nbsp;&nbsp;&nbsp;<a href="index1.php?page=panier">Voir mon panier</a>&nbsp;&nbsp;&nbsp;<a href="index1.php">Accueil</a>&nbsp;&nbsp;&nbsp;<a href="index.php?deconnexion=1">Réinitialiser</a></h3>
	
	<table border="1" cellpadding="10" cellspacing="0">
	<?php
	echo "<tr><td>Code</td><td>Descriptif</td><td>Prix</td><td>Action</td></tr>";

	$catalogue = getListeProduit();
	$produits = $catalogue->getListeProduit();
	
	foreach ($produits as $produit){
	    echo "<tr>
	       <td>".$produit->getCode()."</td>
	       <td>".$produit->getDescriptif()."</td>
	       <td>".$produit->getPrix()."&nbsp;DH</td>
	       <td>
	           <a href=\"index1.php?page=detailProduit&code=".$produit->getCode()."\">D&eacute;tail</a>&nbsp;&nbsp;&nbsp;
	           <a href=\"index1.php?page=gestionProduit&code=".$produit->getCode()."\">Editer</a>&nbsp;&nbsp;&nbsp;
           </td>
       </tr>";
	}
	?>
    </table>
	
    <br /><br />
    
	</body>
</html>
