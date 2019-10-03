<br/>
<center><fieldset style="width:50%;border-color:#006633;text-align:center;">
<?php
	$db=new PDO('mysql:host=localhost;dbname=projet','root','');
	$select=$db->query("SELECT nom,email,message FROM message ORDER BY id DESC LIMIT 5");
	while($donnee=$select->fetch(PDO::FETCH_OBJ))
	{
		echo('<h3>'.$donnee->nom.':<a href="">'.$donnee->email.'</a></h3>
		<p>'.$donnee->message.'</p><br/>');
	}
	$select->closeCursor();
	echo('</fieldset></center><br/>');
?>
