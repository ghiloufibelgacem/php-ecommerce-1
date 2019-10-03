<!DOCTYPE html>
<html>
<head><title>Boutique online</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="style/default.css">
</head>
<body>
<div id="WholePage">
<div id="Inner">
<div id="Container" style="border:groove;border-color:#00CCFF">
<div id="Head">
<div id="Head_left">
<div id="Leaf_top"><img src="images/shop3.jpg" width="324" /></div>
<div id="Leaf_bottom"> <a class="registration" href="register.php">REGISTRATION</a> <a class="log-in" href="login.php">LOG IN</a> </div>
</div>
<div id="Head_right">
<div id="Logo">
<div id="Name"><span class="blue">F</span><span>ashion</span>&nbsp;<span class="blue">S</span><span>hop</span></div>
</div>
<div id="Top_menu"> <a class="kart" href="panier.php"><span>CART&nbsp;
<?php
if(isset($_SESSION['panier']))
{	$nbr=count($_SESSION['panier']);
	echo('<span style="color:white;border:groove;background-color:red;">'.$nbr.'</span>');
}
else{

	echo('<span style="color:white;border:groove;background-color:red;">0</span>');
}
?></span></a> <a class="orders" href="gallery.php"><span>GALLERY</span></a>
<a class="contact" href="contact.php"><span>CONTACT</span></a>
<a class="help" href=""><span>HELP</span></a>
<a class="home" href="index.php"><span>HOME</span></a>
</div>
</div>
</div>