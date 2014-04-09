<?php require_once("connection.php")?>
ou bien <?php
$conn=mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("db e-com",$conn)or die(mysql_error());
?>

<?php
$req="select * from CATEGORIES";
$rs=mysql_query($req) or die(mysql_error());
?>
<table>
<?php while($cat=mysql_fetch_assoc($rs)){ ?>
<tr>
<td>
<?php echo($cat['id'])?></td>
<td>
<a href="ind.php?idCat"><?php echo($cat['nom_categorie'])?></a>

</td>
</tr>
<?php } ?>
</table>
<?php
mysql_free_result($rs);
?>
