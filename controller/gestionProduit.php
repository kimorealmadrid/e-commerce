<?php	
	if( !empty($_POST) ){
		if( $_POST["code"] != "" && $_POST["descriptif"] != "" && $_POST["prix"] != "" ){
			$db = connect();
			$data = array(
				"code" => $_POST["code"],
				"descriptif" => $_POST["descriptif"],
				"prix" => $_POST["prix"],
			);
			
			//Modification
			if( isset($_POST["modifie"])){
				updateGenericQuery($db, "produits", $data, array('code' => $_POST["code"]));
			}
			//Insertion
			else{
				insertGenericQuery($db, "produits", $data);
			}
			
			header("location:index1.php");
			exit;
		}
	}

	if( isset($_GET["code"]) ){
		$produit = getProduit($_GET["code"]);
	}
?>


<html>
	<head>
		<title><?php echo $montitre ; ?></title>
	</head>
	<body>
	
    <form action="" method="POST">
        <label><b>Code <font color="Red">*</font>: </b></label>
        <input type="text" name="code" <?php if( isset($produit) ){ echo "readonly"; } ?> value="<?php if( $produit instanceof Produit ) echo $produit->getCode(); ?>"/>
        <label><b>Descriptif <font color="Red">*</font>: </b></label>
        <input type="text" name="descriptif" value="<?php if( $produit instanceof Produit ) echo $produit->getDescriptif() ?>" />
        <label><b>Prix <font color="Red">*</font>: </b></label>
        <input type="text" size="5" name="prix" value="<?php if( $produit instanceof Produit ) echo $produit->getPrix() ?>" />

        <?php 
        	if( $produit instanceof Produit ){
        		echo "<input type=\"hidden\" value=\"1\" name=\"modifie\" />";
        		echo "<input type=\"submit\" value=\"Modifier le produit\" />";
        	}
        	else{
        		echo "<input type=\"submit\" value=\"Ajouter le produit\" />";
        	}
    	?>
        
    </form>
    
	</body>
</html>