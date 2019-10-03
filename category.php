<?php
session_start();
require_once('includes/header.php');
require_once('includes/menu.php');
?>
<div id="RightPart">
  <div id="Page_center">
    <?php
  if(isset($_SESSION['catg']))
  {
    $catg=$_SESSION['catg'];
    $db=new PDO('mysql:host=localhost;dbname=projet','root','');
    //$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
    //$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $select=$db->prepare("SELECT nom FROM category WHERE id=?");
    $select->execute(array($catg));
    $donnee=$select->fetch(PDO::FETCH_OBJ);
    $titre=$donnee->nom;
    $select->closeCursor();
    echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">'.$titre.'</font></h2></center></div>');
    $select=$db->prepare("SELECT * FROM product WHERE categorie=?");
    $select->execute(array($catg));
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
   <br><br><a href='transfert4.php?catg=".$donnee->id."'><img src='images/MetalPlakDa5new.gif' width='55' height='20'/></a>
  <a href='transfert2.php?catg=".$donnee->id."'><img src='images/cart.gif' width='55' height='20'/></a>
   </td>");
  $n++;
   }
   echo ('</tr></table></form>');
    $select->closeCursor();
  }
?>
</div>
</div>
<?php
require_once('includes/footer.php');
?>