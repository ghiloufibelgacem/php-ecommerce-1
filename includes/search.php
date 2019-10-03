<?php
if(isset($_POST['submit']) and !empty($_POST['product']))
{	$description=$_POST['product'];
	$db=new PDO('mysql:host=localhost;dbname=projet','root','');
    $select=$db->query("SELECT * FROM product WHERE description LIKE '%$description%'");
    //$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
	//$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"<form method='post'><table border='0' align='center'><tr>";
    $n=1;
    while ($donnee=$select->fetch(PDO::FETCH_OBJ)) {
      $i=$donnee->code;
      if($n%4==0)
        {
        echo "<tr>";
        }
    echo ("
   <td height='280' width='240' align='center'><img src='upload/$i.jpg' height='150' width='150'><br/>
 <b>code:</b>".$donnee->code.
   "<br><b>Price:</b>&nbsp;".$donnee->prix.
   "&nbsp;dt<br><b>Description:</b>".$donnee->description."
   <br><br><a href=''><img src='images/MetalPlakDa5new.gif' width='55' height='20'/></a>
  <a href='transfert2.php?catg=".$donnee->id."'><img src='images/cart.gif' width='55' height='20'/></a>
   </td>");
   $n++;
   }
   echo ('</tr></table></form>');
   $select->closeCursor();
}
else
{
	header('Location:index.php');
}
?>