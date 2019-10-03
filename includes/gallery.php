<center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Gallery</font></h2></center>
<br/>
<div id="gallery"><center>
	<?php
	$db=new PDO('mysql:host=localhost;dbname=projet','root','');
	$select=$db->query("SELECT code FROM product");
    echo("<table border='0' align='center'><tr>");
    $n=1;
	while ($donnees=$select->fetch(PDO::FETCH_OBJ)){
		$i=$donnees->code;
		if($n%6==0)
        {
        echo "<tr>";
        }
        echo("<td align='center'><img src='upload/$i.jpg' height='80' width='90' style='border:2px solid black;'>
        	</td>");
        $n++;
	}
	echo ('</tr></table>');
	$select->closeCursor();
	?>
</center>
</div>