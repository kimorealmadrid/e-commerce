<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/  DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr-fr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
  <link href="../style.css" rel="stylesheet" type="text/css"/>
          <title>Administration </title>
</head>
<body> 
<?php include('entete.php');?>   
<div class="cadrecentrale">

<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

		$base = mysql_connect ('localhost', 'root', '');
		mysql_select_db ('db e-com', $base);

		// on teste si une entrée de la base contient ce couple login / pass
		$sql = 'SELECT count(*) FROM administrateur WHERE Login_admin="'.mysql_escape_string($_POST['login']).'" AND Pass_admin="'.mysql_escape_string($_POST['pass']).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		mysql_free_result($req);
		mysql_close();

		// si on obtient une réponse, alors l'utilisateur est un membre
		if ($data[0] == 1) {
			session_start();
			$_SESSION['login'] = $_POST['login'];
			header('Location: princ.php');
			exit();
		}
		// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		elseif ($data[0] == 0) {
			$erreur = 'Compte non reconnu.';
		}
		// sinon, alors la, il y a un gros problème :)
		else {
			$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
		}
	}
	else {
		$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<fieldset>
<legend align="center">Connexion à la partie des admin </legend><br>
<form action="index.php" method="post">
<center>Nom d'admin :  <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"></center><br />
<center>Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"></center><br />
<center>             <input type="submit" name="connexion" value="Connexion"></center><br />
</form>
</fieldset>

<?php
if (isset($erreur)) echo '<br><p style="color:red;text-align:center;">',$erreur,'</p>';
?>

</div><br>

</br></br></br></br></br></br></br></br></br>
 
<?php include('footer.php');?> 
 
</body>
 
</html>