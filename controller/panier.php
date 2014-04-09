<?php
// mon premier code PHP
$montitre = "Site e-commerce" ;
?>

<html>
	<head>
		<title><?php echo $montitre ; ?></title>
	</head>
	<body>
	<?php $produits = getListeProduitSelectionne(); ?>
	<h3>Liste de nos produits : (<?php echo count($produits) ?> produits s&eacute;lectionn&eacute;s)&nbsp;&nbsp;&nbsp;<a href="index1.php">Accueil</a></h3>
	<table border="1" cellpadding="10" cellspacing="0">
	<?php
	echo "<tr><td>Code</td><td>Descriptif</td><td>Prix</td><td>Quantit&eacute;</td><td>Action</td></tr>";

	if( !empty($produits) ){
		foreach ($produits as $produit){
		    echo "<tr>
		       <td>".$produit->getCode()."</td>
		       <td>".$produit->getDescriptif()."</td>
		       <td>".$produit->getPrix()."&nbsp;DH</td>
		       <td>".$produit->getQuantite()."</td>
		       <td>
		           <a href=\"index1.php?page=detailProduit&code=".$produit->getCode()."\">D&eacute;tail</a>&nbsp;&nbsp;&nbsp;
	           </td>
	       </tr>";
		}
	}
	?>
    </table>
	</body>
</html>