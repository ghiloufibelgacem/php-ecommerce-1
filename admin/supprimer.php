<?php
      if(isset($_GET['id']))     
      {
      $id=$_GET['id'];
      $db=new PDO('mysql:host=localhost;dbname=projet','root','');
      //$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      //$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $delete=$db->prepare("DELETE FROM product WHERE id=?");
      $delete->execute(array($id));
      header('Location:del.php');
      }
?>
        