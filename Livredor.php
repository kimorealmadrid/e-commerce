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
				<p>Vous êtes sur > <a href="livredor.php">Livre d'or</a> </p>
			</div>
			<div class="left_articles">
				<h2>Vos avis :</h2>
				<?php 

// Information concernant la base de données
$SqlHost = 'localhost'; // Nom du serveur MySql 
$SqlUser = 'root';      // Nom utilisateur 
$SqlPass = '';          // Mot de passe 
$SqlName = 'db e-com';  // Nom de la base de données

// Variables que nous pouvons modifier
$NumMessage = 20; // nombre de messages par page dans le livre d'or
$NumMessMin = 20; // nombre de caractères minimum dans le message
$NumMessMax = 1000; // nombre de caractères maximum dans le message
$UnSeulMess = true; // limite le nombre à 1 message par visiteur mettez false (déconseillé) si vous permettez que les visiteurs puissent poster plusieurs messages

// connexion à la base de données
mysql_connect($SqlHost, $SqlUser, $SqlPass) or die('Impossible de se connecter');
mysql_select_db("db e-com") or die('Erreur de connexion à la base de données');

// Cette variable servira pour stocker les messages d'erreur
$message_erreur='';

// On défini le décalage horaire par défaut qui permet d'avoir l'heure de Paris
if (function_exists('date_default_timezone_set')) { 
    date_default_timezone_set('Europe/Paris'); 
}
if (isset($_POST['btn']))
{
    // vérification du nom
    if (empty($_POST['nom'])) {
        // si le champ NOM est vide on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Entrez votre nom</div>";
    } else if (strlen($_POST['nom'])>70) {
        // si le nom est trop long on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre nom est trop long (70 caractères maximum)</div>";
    } else if (strlen($_POST['nom'])<3) {
        // si le nom est trop court on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre nom est trop court (3 caractères;res minimum)</div>";
    }

    // vérification de l'adresse email
    if (empty($_POST['email'])) {
        // si le champ adresse email est vide on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Entrez votre adresse email</div>";
    } else if (strlen($_POST['email'])>150) {
        // si l'adresse email est trop long on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre adresse e-mail est trop longue</div>";
    } else if (strlen($_POST['email'])<8) {
        // si l'adresse email est trop court on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre adresse e-mail est trop courte</div>";
    } else if (!preg_match('#^[-+%.\'\\w]*@\\w+([-.]?\\w+)*\\.\\w{2,}$#', $_POST['email'])) {
        // si l'adresse email n'est pas valide on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre adresse email n'est pas valide</div>";
    }

    // vérification du message
    if (empty($_POST['message'])) {
        // si le champ adresse email est vide on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Entrez votre message</div>";
    } else if (strlen($_POST['message'])>$NumMessMax) {
        // si le nom est trop long on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre message est trop long (".$NumMessMax." caractères maximum)</div>";
    } else if (strlen($_POST['message'])<$NumMessMin) {
        // si le nom est trop court on ajoute un message dans la variable $message_erreur
        $message_erreur .= "<div>- Votre message est trop court (".$NumMessMin." caractères minimum)</div>";
    }


    // s'il n'y a toujours pas d'erreur, c'est que tout est OK, on ajoute alors le message dans la base de données
    if (empty($message_erreur))
    {
        // on prépare mes variables avant de les ajouter dans la base de données, on trouve que c'est plus lisible ainsi
        $ligne1 = mysql_real_escape_string($_POST['nom']); // nom de visiteur
        $ligne2 = mysql_real_escape_string($_POST['email']); // adresse email du visiteur
        $ligne3 = mysql_real_escape_string($_POST['message']); // message
        $ligne4 = mysql_real_escape_string(date('Y-m-d H:i:s')); // date et heures
        $ligne5 = mysql_real_escape_string($_SERVER["REMOTE_ADDR"]); // adresse IP du visiteur
        $ligne6 = intval($_POST['note']); // la note
        // on prépare la requête SQL pour tout ajouter
        $ins = mysql_query("INSERT INTO `livredor` (`nom`,`email`,`message`,`date_ajout`,`ip`,`note`) VALUES ('".$ligne1."','".$ligne2."','".$ligne3."','".$ligne4."','".$ligne5."',".$ligne6.")") or die(mysql_error());
    }                
}
// Préparation de la pagination
$reqCount = mysql_query("SELECT COUNT(id) FROM `livredor`") or die(mysql_error());
$nbTotalPag = mysql_fetch_row($reqCount); mysql_free_result($reqCount);
$nbPages = ceil($nbTotalPag[0] / $NumMessage);
if(isset($_GET['page']) && $_GET['page']>$nbPages) {
    $page=$nbPages;
} else if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page']!=0) {
    $page=$_GET['page'];
} else {
    $page=1;
}
$limite = ($page-1) * $NumMessage; 

// on ouvre une requête SQL pour l'affichage des messages
$req = mysql_query("SELECT * FROM `livredor` ORDER BY `date_ajout` DESC LIMIT ".intval($limite).",".intval($NumMessage)) or die(mysql_error());



    // affichage des messages
    while ($ligne = mysql_fetch_array($req))
    {
        echo '
        <div class="dg-bloc-messages">
            <p style="font-weight:bold;">Message de '.stripslashes(htmlentities($ligne['nom'])).' le '.return_date_fr($ligne['date_ajout']).'<br /><span style="color:#999;">Note : '.intval($ligne['note']).'/10</span></p>   
            <div style="margin-bottom:5px;">'.stripslashes(htmlentities(nl2br($ligne['message']))).'</div>
        </div>';
    }
    
    // affichage de la pagination uniquement s'il y a plus d'une page  
    if($nbPages>1) {
        echo '<p style="text-align:center;">Page : '; 
        for ($i=1; $i<=$nbPages; $i++) { 
            if ($i==$page ) {
                echo ' '.$i.' '; 
            } else { 
                echo '<a href="?page='.$i.'">'.$i.'</a> '; 
            }
        } 
        echo ' </p>';
    }
// on libère la base de données
mysql_free_result($req);
         
// affiche un message de confirmation si le formulaire est bien validé
if (isset($_POST['btn']) && empty($message_erreur))
{
    echo '<a name="form" id="form"></a>
    <div class="dg-bloc-form">
        <div class="dg-form-confirmation">Votre message a été validé avec succès, merci.</div><br><a href="livredor.php">Retour</a>
    </div>';
}            
// autrement on affiche le formulaire + les messages d'erreurs s'il y en a
else
{
    echo '<a name="form" id="form"></a>
    <div class="dg-bloc-form">
        <div class="dg-form-titre">D&eacute;poser un message</div>';
        // s'il existe une erreur lors de la validation du formulaire, on affiche les messages
        if (isset($_POST['btn']) && !empty($message_erreur)) {
            echo '<div class="dg-erreurs"><div style="font-weight:bold;margin-bottom:4px;">Veuillez corriger les erreurs suivantes:</div>'.$message_erreur.'</div>';
        }
        echo '
        <form action="#form" method="post" id="formulaire">
            <div class="dg-champ-bloc">
                <div class="dg-champ-label">Entrez votre nom :</div>
                <div class="dg-champ"><input value="'; if(isset($_POST['btn'])) { echo stripslashes($_POST['nom']); } echo '" name="nom" id="nom" maxlength="70" type="text" size="40" /></div>
            </div>	
            <div class="dg-champ-bloc">
                <div class="dg-champ-label">Entrez votre adresse e-mail :</div>
                <div class="dg-champ"><input value="'; if(isset($_POST['btn'])) { echo stripslashes($_POST['email']); } echo '" name="email" id="email" maxlength="150" type="text" size="40" /></div>
            </div>
            <div class="dg-champ-bloc">
                <div class="dg-champ-label">Votre note :</div>
                <div class="dg-champ">
                    <select name="note" id="note">
                        <option value="10"'; if(isset($_POST['btn']) && $_POST['note']=='10'){ echo ' selected="selected"'; } echo '>&nbsp;10/10 (G&eacute;nial)&nbsp;</option>
                        <option value="9"'; if(isset($_POST['btn']) && $_POST['note']=='9'){ echo ' selected="selected"'; } echo '>&nbsp;9/10&nbsp;</option>
                        <option value="8"'; if(isset($_POST['btn']) && $_POST['note']=='8'){ echo ' selected="selected"'; } echo '>&nbsp;8/10&nbsp;</option>
                        <option value="7"'; if(isset($_POST['btn']) && $_POST['note']=='7'){ echo ' selected="selected"'; } echo '>&nbsp;7/10&nbsp;</option>
                        <option value="6"'; if(isset($_POST['btn']) && $_POST['note']=='6'){ echo ' selected="selected"'; } echo '>&nbsp;6/10&nbsp;</option>
                        <option value="5"'; if(isset($_POST['btn']) && $_POST['note']=='5'){ echo ' selected="selected"'; } echo '>&nbsp;5/10 (Pas mal)&nbsp;</option>
                        <option value="4"'; if(isset($_POST['btn']) && $_POST['note']=='4'){ echo ' selected="selected"'; } echo '>&nbsp;4/10&nbsp;</option>
                        <option value="3"'; if(isset($_POST['btn']) && $_POST['note']=='3'){ echo ' selected="selected"'; } echo '>&nbsp;3/10&nbsp;</option>
                        <option value="2"'; if(isset($_POST['btn']) && $_POST['note']=='2'){ echo ' selected="selected"'; } echo '>&nbsp;2/10&nbsp;</option>
                        <option value="1"'; if(isset($_POST['btn']) && $_POST['note']=='1'){ echo ' selected="selected"'; } echo '>&nbsp;1/10&nbsp;</option>
                        <option value="0"'; if(isset($_POST['btn']) && $_POST['note']=='0'){ echo ' selected="selected"'; } echo '>&nbsp;0/10 (Compl&egrave;tement nul)&nbsp;</option>
                    </select>
                </div>
            </div>
            <div class="dg-champ-bloc">
                <div class="dg-champ-label">Entrez votre message :</div>
                <div class="dg-champ"><textarea name="message" id="message" cols="0" rows="8" style="width:99%;">'; if(isset($_POST['btn'])) { echo stripslashes($_POST['message']); } echo '</textarea></div>
            </div>                        
            <div class="dg-champ-boutons"><input type="submit" name="btn" id="btn" value="Valider mon message" /></div>
        </form>
    </div>';
}

// cette fonction servira pour formater la date en français
function return_date_fr($timestamp,$use_htmlentities=true)
{
    // on remplace les / en -
    $timestamp = str_replace('/', '-', $timestamp);
    // par defaut on affiche la date du jour
    $jsem = date('w', strtotime($timestamp)); // jour de la semaine
    $jmois = date('j', strtotime($timestamp)); // jour du mois ('d' est aussi utilisable)
    $mois = date('n', strtotime($timestamp)); // mois de l'annee
    $annee = date('Y', strtotime($timestamp)); // l'annee
    $tabjour=array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'vendredi', 'Samedi');
    $tabmois=array('0', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    // construction de la date formatee
    $datefr = $tabjour[$jsem]." $jmois ".$tabmois[$mois]." $annee";
    // si on doit utiliser htmlentities
    if ($use_htmlentities) $datefr = htmlentities($datefr);
    // affichage (remplacer 'echo ' par 'return' pour retourner le resultat)
    return $datefr;
}
?>

				
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
				<p><img src="images/soldes.jpg" width=60px height=60px alt="Image" title="Image" class="image" /><b>Produits en solde</b><br /><a href="#"></a><a href="#"></a></br></br></br></p>
				<marquee align="right"  scrolldelay="5" scrollamount="3" onmouseout="this.start()" onmouseover="this.stop()">
                <img border="0" src="images/nokia.jpg" height="100" witdh="150" alt="" hspace="0">
                <img border="0" src="images/S2.jpg" height="100" witdh="150" alt="" hspace="0">
                 </marquee>
			</div></br>
			<div class="right_articles">
				<p><img src="images/livreor.gif" alt="Image" title="Image" class="image" /><a href="livredor.php"><b>Livre d'or</b></a> <br /> Nous vous offrons un espace dans lequel vous pouvez laisser vos avis sur notre site.</br>Exprimez-vous en toute liberté.</br></br><a href="#"></a></p>
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