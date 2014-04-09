<?php
// mon premier code PHP
$montitre = "Site e-commerce" ;
$message = "";

//gestion de l'ajout d'un produit
if( !empty($_POST) && isset($_POST["code"]) ){
    if( ajoutePanier($_POST["code"], $_POST["quantite"]) ){
        $message = "Le produit a &eacute;t&eacute; ajout&eacute; &agrave; votre panier";
    }
    else{
        $message = "Une erreur est survenue lors de l'ajout du produit";
    }
}
?>

<html>
	<head>
		<title><?php echo $montitre ; ?></title>
	</head>
	<body>
	<?php 
	   if( $message != ""){
	       echo "<h3>".$message."</h3>";
	   } 
	?>
	<h3>Liste de nos produits :&nbsp;&nbsp;&nbsp;<a href="index1.php?page=panier">Voir mon panier</a>&nbsp;&nbsp;&nbsp;<a href="index1.php">Accueil</a></h3>
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
    
    <?php
        if( isset($_GET["code"]) ){
            echo "<br />";
            echo "<h3>Description du produit :</h3>";
            $produit = getProduit($_GET["code"]);
            
            echo "<b>Code Produit : </b>".$produit->getCode(); echo "<br />";
            echo "<b>Descriptif Produit : </b>".$produit->getDescriptif(); echo "<br />";
            echo "<b>Prix Produit : </b>".$produit->getPrix(); echo "<br />";
    ?>
    <form action="" method="POST">
        <label><b>Quantité désirée : </b></label>
        <select name="quantite">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
			<option value="4">5</option>
			<option value="4">6</option>
			<option value="4">7</option>
			<option value="4">8</option>
			<option value="4">9</option>
			<option value="4">10</option>
        </select>
        <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" />
        <input type="submit" value="ajouter au panier" />
    </form>
    <?php   
        }
    ?>
	
	</body>
</html>