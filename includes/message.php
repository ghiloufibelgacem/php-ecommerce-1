<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$db=new PDO('mysql:host=localhost;dbname=projet','root','');
	//$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);//
	//$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//deux variable à supprimer apres;
    $db->query("INSERT INTO message(nom,phone,email,message) VALUES ('$name','$phone','$email','$message')");
    header('Location:../index.php');
}
else
{
	header('Location:../contact.php');
}
?>