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
echo'<center><p><b>Bienvenue '.htmlentities(trim($_SESSION['login'])).'</b><br /><b>sur la partie admin</b></center>
<center><a href="deconnexion.php">Déconnexion</a></center> ';
}else{
echo'<p>Bienvenue sur <b>Shop En Ligne</b> ';
}
?>
				</div>
		
		<div id="logo">
			<h1><a href="#" title="Tout est facile chez nous.">Shop En Ligne</a></h1>
			<p id="slogan">tout est facile chez nous.</p>
		</div>
</body>
</html><br><br><br>