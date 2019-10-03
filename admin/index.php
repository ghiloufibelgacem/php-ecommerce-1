<?php
session_start();
if(isset($_SESSION['admin']))
{
require_once('header.php');
require_once('footer.php');
}
else
{
	header('Location:../index.php');	
}
?>

