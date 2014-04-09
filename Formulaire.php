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
echo'<p><b>Bienvenue '.htmlentities(trim($_SESSION['login'])).'</b><span id="loginbutton"><a href="#" title="Panier">&nbsp;</a></span><br /><b>sur Shop En Ligne</b>
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
			<li><a href="CGV.php" accesskey="o"><span class="key"></span>CGV</a></li>
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
				<p>Vous êtes sur > <a href="Formulaire.php">Inscription</a> </p>
			</div>
			<div class="left_articles">
				<h2>Inscrivez-vous :</h2><br>

				<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription'])) {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['adresse']) && !empty($_POST['adresse'])) && (isset($_POST['pays']) && !empty($_POST['pays'])) && (isset($_POST['civilite']) && !empty($_POST['civilite'])) )	
{
		// on teste les deux mots de passe
		if ($_POST['pass'] != $_POST['pass_confirm']) {
			$erreur = 'Les 2 mots de passe sont différents.';
		}
		else {
			$base = mysql_connect ('localhost', 'root', '');
			mysql_select_db ('db e-com', $base);

			// on recherche si ce login est déjà utilisé par un autre membre
			$sql = 'SELECT count(*) FROM client WHERE login="'.mysql_escape_string($_POST['login']).'"';
			$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$data = mysql_fetch_array($req);

			if ($data[0] == 1){
		
		$erreur = 'Un membre possède déjà ce login.';

			
			}else {
				$sql = 'INSERT INTO client VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'","'.mysql_escape_string($_POST['email']).'", "'.mysql_escape_string($_POST['adresse']).'", "'.mysql_escape_string($_POST['pays']).'", "'.mysql_escape_string($_POST['civilite']).'")';
				mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

				session_start();
				$_SESSION['login'] = $_POST['login'];
				header('Location: index.php');
				exit();
		
			}
		}
	}
	else {
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>

<form name="form1" action="" method= "post">



<div align="center" widht="800px" heigh="20px" bgcolor="red">

</div><fieldset><br>
Nom d'utilisateur :         <input type="text" name="login" size="40"> <br>

Mot de pass :                <input type="password" name="pass" size="40"> <br>
Confirmer mot de pass :<input type="password" name="pass_confirm" size="40"> <br>

E-mail :                          <input type="text" name="email" size="40"> <br>

Adresse :<br>
<textarea  name="adresse" size="40" rows="5" cols=40>
</textarea> <br>



Pays

          <select name="pays" size=1> 

              <option> Maroc </option>

              <option> Algérie </option>

              <option> Tunisie </option>

          </select> <br>







civilité :<br>



<input type="Radio" name="civilite" size="40" value="Madame">Mme <input type="Radio" name="civilite" size="40" value="Mademoiselle">Mlle <input type="Radio" name="civilite" size="40" value="Monsieur">Mr<br>

<br>

<input type="Submit" name="inscription" Value=Envoyer > <input type="reset" name="eff" Value="Effacer" ><br>

<br>
</fieldset>
</form>
				
			</div></br>
			<br><br><br><div class="left_box">
				<p><?php
if (isset($erreur)) echo '<p style="color:red;">',$erreur,'</p>';
?>
</p>
			</div>
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