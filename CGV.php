<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="Fr" lang="Fr">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Sara JDID & Abdelhakim MBITEL" />
	<meta name="description" content="Ce site est spécialisé dans la vente des matériéls informatiques" />
	<meta name="keywords" content="key, words" />	
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<title></title>
</head>
<body>
	<div id="content">
		<div id="top_info">
		<?php
session_start();
if (isset($_SESSION['login'])) {
echo'<p><b>Bienvenue '.htmlentities(trim($_SESSION['login'])).'</b><span id="panierbutton"><a href="#" title="Panier">&nbsp;</a></span><br /><b>sur Shop En Ligne</b>
<br>
<a href="deconnexion.php">Déconnexion</a> ';
}else{
echo'<p>Bienvenue sur <b>Shop En Ligne</b> <span id="panierbutton"><a href="#" title="Panier">&nbsp;</a></span><br /><br>
			<b>Vous n\'êtes pas connectés !</b>   <span id="loginbutton"><a href="Se%20connecter.php" title="Login">&nbsp;</a></span> </p>';
}
?>
		</div>
		
		<div id="logo">
			<h1><a href="index.php" title="Tout est facile chez nous."><img src=images/logo.jpg></a></h1>
			
		</div>
				
		<ul id="tablist">
			<li><a href="index.php" accesskey="n"><span class="key"></span>Accueil</a></li>
			<li><a href="Categories.php" accesskey="b"><span class="key"></span>Catégories</a></li>
			<li><a href="Contactez_nous.php" accesskey="p"><span class="key"></span>Contactez-nous</a></li>
			<li><a class="current" href="CGV.php" accesskey="o"><span class="key"></span>CGV</a></li>
		</ul>
		
		<div id="topics">
	<center><h4>Soyez la bienvenue sur Shop en Ligne .Ici vous trouvez tous ce que vous cherchez avec des prix fous .</h4></center>
		</div>
		<div id="search">
			<form method="post" action="?">
				<p><input type="text" name="Rechercher" class="Rechercher" /> <input type="submit" value="Rechercher" class="button" /></p>
			</form>
		</div>
							
		<div id="left">
			<div class="subheader">
				<p>Vous êtes sur > <a href="CGV.php">CGV</a> </p>
			</div>
			<div class="left_articles">
			<h2>Conditions générales de vente :</h2>
			<br>
			<p> <h3>1- Préambule:</h3>

Les conditions générales de vente suivantes régissent l'ensemble des transactions établies sur le site web de Shop en ligne. Toute commande passée sur ce site suppose du client son acceptation inconditionnelle et irrévocable de ces conditions.</p>
			<p><h3>2- Objet:</h3>

Le présent contrat est un contrat à distance qui a pour objet de définir les droits et obligations des parties.
 
Maroc Telecommerce est un service de gestion des transactions et une marque déposée par Maroc Telecommerce S.A. </p>	
		<p><h3>3- Mode de paiement:</h3>

Pour régler votre commande par carte bancaire, vous choisissez le moyen de paiement parmi ceux proposés par Shop en ligne au niveau du Bon de commande (Visa, MasterCard, Maestro, cmi, Maestro, Diners Club et Discover).
 
Dans ce cas, la remise de la transaction pour débit de votre compte est effectuée dans la journée qui suit la date de la confirmation de livraison.
 
En cas de paiement par carte bancaire, les dispositions relatives à l’utilisation frauduleuse du moyen de paiement prévues dans les conventions conclues entre nous et le Consommateur et l’émetteur de la carte et son établissement bancaire s’appliquent</p>
		<p>
<h3>4- Preuve des transactions payés par carte bancaire:</h3>

Les données enregistrées par Maroc Telecommerce S.A sur la plate-forme MarocTelecommerce pour le compte Shop en ligne constituent la preuve de l’ensemble des transactions commerciales passées entre vous et nous..</p>
		</br>
		</br>
		</br></br></br>
				
			</div></br>
			<div class="thirds">
				<p><b><a href="#" class="title"></a></b><br /></p>
			</div>
			<div class="thirds">
				<p><b><a href="#" class="title"></a></b><br /></p>
			</div>
			<div class="thirds">
				<p><b><a href="#" class="title"></a></b><br /></p>
			</div>
		</div>	</br>
		
		<div id="right"></br>
			<div class="right_articles">
				<p><img src="images/wl.jpg" width=60px height=60px alt="Image" title="Image" class="image" /><b>Bienvenue</b><br/><a href="#"></a> <a href="#"></a>Soyez la bienvenue sur  <strong>Shop en Ligne</strong> .</br>Ici vous trouvez tous ce que vous cherchez avec des prix fous .</br></br></p>
			</div>
			</br>
			<div class="right_articles">
				<p><img src="images/soldes.jpg" alt="Image" width=60px height=60px title="Image" class="image" /><b>Produits en solde</b><br /><a href="#"></a><a href="#"></a></br></br></br></p>
				<marquee align="right"  scrolldelay="5" scrollamount="3" onmouseout="this.start()" onmouseover="this.stop()">
                <img border="0" src="images/nokia.jpg" height="100" witdh="150" alt="" hspace="0">
                <img border="0" src="images/S2.jpg" height="100" witdh="150" alt="" hspace="0">
                 </marquee>
			</div></br>
			<div class="right_articles">
				<p><img src="images/livreor.gif" alt="Image" title="Image" class="image" /><a href="livredor.php"><b>Livre d'or</b></a><br />  Nous vous offrons un espace dans lequel vous pouvez laisser vos avis sur notre site.</br>Exprimez-vous en toute liberté.</br></br><a href="#"></a></p>
			</div>
			</div>
		
		<div id="footer">
			<p class="right">&copy; 2013 Shop En Ligne, Design: Sara JDID & Abdelhakim MBITEL  - 
			<p>
			<a href="mailto:kimorealmadrid@hotmail.com">Contactez nous</a> &middot;<a href="#">Produits</a> &middot; <a href="#">Plan du site</a></p>
			
		</div>
	</div>
</body>
</html>