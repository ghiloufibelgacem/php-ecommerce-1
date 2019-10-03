<?php
session_start();
if(isset($_SESSION['user']))
{
	require_once('includes/header.php');
	require_once('includes/menu.php');
	echo('<div id="RightPart"><div id="Page_center">'); 
	require_once('includes/panier.php');
	echo('</div><br/><br/></div>');
	/*echo ('<center><IMG src="images/img3.png" width="300" height="100" style="float:bottom;"></center>');
	echo ('<MARQUEE Scrollamount="6">
			<IMG src="images/img3.png" height="100">
		</MARQUEE>');*/
	require_once('includes/footer.php');
}
else
{
	header('Location:index.php');
}
?>