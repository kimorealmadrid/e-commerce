<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="Fr" lang="Fr">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Sara JDID & Abdelhakim MBITEL" />
	<meta name="description" content="Ce site est spécialisé dans la vente des matériéls informatiques" />
	<meta name="keywords" content="key, words" />	
    <meta charset="utf-8" />	
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
			<li><a class="current" href="Categories.php" accesskey="b"><span class="key"></span>Catégories</a></li>
			<li><a href="Contactez_nous.php" accesskey="p"><span class="key"></span>Contactez-nous</a></li>
			<li><a href="CGV.php" accesskey="o"><span class="key"></span>CGV</a></li>
		</ul>
		
		<div id="topics">
			<div class="thirds">
				<p><br />Nos catégories:</p>
			</div>
			<div class="thirds">
				<ul>
					<li><a href="#">Ordinateurs de bureau</a></li>
					<li><a href="#">Ordinateurs portables</a></li>
					<li><a href="#">Téléphones portables</a></li>
				</ul>
			</div>
			<div class="thirds">
				<ul>
					<li><a href="#">Tablettes</a></li>
					<li><a href="#">TV</a></li>
					<li><a href="#">Périphériques</a></li>
				</ul>
			</div>
		</div>
		<div id="search">
			<form method="post" action="?">
				<p><input type="text" name="Rechercher" class="Rechercher" /> <input type="submit" value="Rechercher" class="button" /></p>
			</form>
		</div>
							
		<div id="left">
			<div class="subheader">
				<p>Vous êtes sur > <a href="Categories.php">Catégories</a> > <a href="produits_cl.php">Produits</a> </p>
			</div>
			<div class="left_articles">
				<h2>Nos produits :</h2><br>
				
				<?php
$conn=mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("db e-com",$conn)or die(mysql_error());

$rs=mysql_query("select count(*) from PRODUITS") or die(mysql_error());
$var1=mysql_fetch_array($rs);
$id_cetegorie=$_GET['id'];
$req2=mysql_query("select titre , id,prix,description FROM PRODUITS WHERE id_categorie='".$id_cetegorie."'");
echo'<table>';
$k=0;
while($cate=mysql_fetch_array($req2)){

 $tab[$k] = $cate['titre'];
 $prix[$k] = $cate['prix'];
 $id[$k] = $cate['id'];
 $k++;
 }
 for($i=0; $i<$k; $i+=2){
echo'<div class="thirds"><img src=images/acer.jpg width=180 height=100 ><br><br>'.$tab[$i].'<center><form name="formulaire"  align="center" action="index1.php" method="post"><input type="submit" name="bouton" value="acheter"></form></center></div><div class="cat"><img src=images/05.jpg width=180 height=100 ><br><br>'.$tab[$i+1].'<center><form name="formulaire" action="index1.php" method="post"><input type="submit" name="bouton" value="acheter"></form></center></div>';
}
echo '</table>';

?>				
				
			</div>
			<br><br><br><br><br>
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
				<p><img src="images/soldes.jpg" width=60px height=60px alt="Image" title="Image" class="image" /><b>Produits en solde</b><br /><a href="#"></a><a href="#"></a></br></br></br></p>
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