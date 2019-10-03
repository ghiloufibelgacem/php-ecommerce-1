<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=projet','root','');
$email=$_POST['userID'];
$password=$_POST['password'];
$select=$db->query("SELECT password FROM user WHERE email='$email'");
$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);//
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if($donnee=$select->fetch())
	{
		if($donnee['password']==$password)
		{
			$_SESSION['user']=$email;
			$_SESSION['panier']=array();
			header('Location:../index.php');
		}
		else
		{
			header('Location:../login.php');
		}

	}
	else
	{
		header('Location:../login.php');
	}
?>