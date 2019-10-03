<?php
//les coordonnees;
$nom=$_POST['name'];
$prenom=$_POST['last'];
$telephone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$ville=$_POST['city'];
$date=$_POST['date'];
$password=$_POST['password'];
//tester sur le telephone;
if(strlen($telephone)==8)
{
	settype($telephone,'integer');

	if($telephone==0)
	{
		header('Location:../register.php');
		//telephone invalide javascript;

	}
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
		$db=new PDO('mysql:host=localhost;dbname=projet','root','');
		//$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);//
		//$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//deux variable à supprimer apres;
     	if($db->query("INSERT INTO user(nom,prenom,email,telephone,addresse,ville,datee,password) VALUES ('$nom','$prenom','$email',$telephone,'$address','$ville','$date','$password')"))
     	{

     	echo("client ajouter avec succes");
     	//ajouter avec succes java script;
     	}

     	else
     	{

     	echo("erreur");
     	//erreur ajouter client javascript;

     	}
	}
	else
	{
		header('Location:../register.php');
		//date invalide javascript;

	}
}

else
{
	header('Location:../register.php');
	//telephone invalide javascript;
}
?>