<?php
session_start();
$array=$_SESSION['panier'];
if(isset($_POST['submit']))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>commande</title>
	<link rel="stylesheet" type="text/css" href="style/commande.css">
</head>
<body>
<div id="commande">
	<div id="Name">
			<center class="b1">
				<span class="blue"><img src="images/logo.gif"/>&nbsp;
				F</span><span>ashion</span>&nbsp;<span class="blue">S</span><span>hop</span>
			</center><br/>
			<center>
				<font face="Lucida Handwriting" size="+1">Address:&nbsp;</font>
			</center><br/>
			<center>
				<font face="Lucida Handwriting" size="+1">Email:&nbsp;FashionShop@gmail.com</font>
			</center>
		</div><br/>
	<center>
		<div id="bon"><br/>
			BON&nbsp;&nbsp;DE&nbsp;&nbsp;COMMANDE
		</div>
	</center>
	<center><p>A nous renvoyer par courrier accompagné de votre réglement</p> <p>Date :
		<?php $datetime = date("Y-m-d");echo $datetime; ?></p></center>
	<center>
		<table id="table">
			<tr>
				<th> Réf </th>
				<th id="d"> Désignation </th>
				<th> Quantite </th>
				<th> Prix Unit TTC </th>
				<th> Total TTC </th>
			</tr>
			<?php
			$db=new PDO('mysql:host=localhost;dbname=projet','root','');
			foreach ($array as $key)
			{
			$select=$db->query("SELECT * FROM product WHERE id=$key");
			$donnee=$select->fetch(PDO::FETCH_OBJ);
			?>
			<tr>
				<td> <center><?php echo($donnee->code);?></center></td>
				<td><center><?php echo($donnee->description);?></center></td>
				<td><center><?php echo($_POST[$key]);?></center></td>
				<td><center><?php echo ($donnee->prix);?></center></td>
				<td><center><?php echo(($donnee->prix)*$_POST[$key]);?></center></td>
			</tr>
		<?php
		}
		?>
			<tr>
				<td style="border:none;"></td>
				<td style="border:none;"></td>
				<td colspan="2">Frais de livraison</td>
				<td><center>5</center></td>
			</tr>
			<tr>
				<td style="border:none;"></td>
				<td style="border:none;"></td>
				<td colspan="2">Montant total TTC</td>
				<td><center><?php echo($_POST['totale']+5);?></center></td>
			</tr>	
		</table>
	</center>
	<h3>&nbsp;&nbsp;LIVRAISON</h3>
	<div id="livraison"><br/>
		<span>&nbsp;&nbsp;Nom Prénom :</span>..........................................................<br/>
		<span>&nbsp;&nbsp;Adresse :</span>............................................................<br/>
		<span>&nbsp;&nbsp;Code Postal :</span>........................<span>  Ville :</span>................<br/>
		<span>&nbsp;&nbsp;Tél :</span>..........................................................<br/>
		<span>&nbsp;&nbsp;Email :</span>............................................................
	</div>
	<center>
		<p>Date :</p>
		<p> Signature</p><br/><br/>
	</center>
</div><br/>
<center>
<form>
  <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer"/>
</form>
</center>
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
</body>
</html>
<?php
}
?>