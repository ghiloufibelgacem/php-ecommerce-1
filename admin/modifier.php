<?php
      if(isset($_POST['category']))     
      {?>
<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Modify/Delete Product</font></h2>
</center></div>
<div>
<div style="width:25%;float:right">
<br><br><br><br><br>
<img src="../images/7.jpg">
</div>
<br><br>
<center><div style="width:70%;float:right" align="center">
<fieldset style="background:#CC99CC;width:50%">
<br><br>
<table width="366" border="0" align="center">
      <?php
      $category=$_POST['category'];   
      $db=new PDO('mysql:host=localhost;dbname=projet','root','');
      $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $select=$db->query("SELECT id FROM category WHERE nom='$category'");
      $donnee=$select->fetch(PDO::FETCH_OBJ);
      $id=$donnee->id;
      $select->closeCursor();
      $select=$db->query("SELECT id,code,prix,description FROM product WHERE categorie=$id");
      while ($donnee=$select->fetch(PDO::FETCH_OBJ)) {
      ?>
    <tr>
      <td><div align="center"><img src="../upload/<?php echo($donnee->code);?>.jpg" width="100" height="90"/></div>
        <br/></td>
      <td>
      <div align="center"><strong><font size="+1" face="Comic Sans MS">Code:</font></strong><!--code php-->
            <?php echo($donnee->code);?></div>
      <br/>
      <div align="center" style=" word-wrap: break-word;"><strong><font size="+1" face="Comic Sans MS">Description:
      </font></strong><!--description--><p style="width:120px;margin:auto;"><?php echo($donnee->description);?>
      </p>
      </div><br/>
      <div align="center"><strong><font size="+1" face="Comic Sans MS">Price:</font></strong><!--price php-->
            <?php echo ($donnee->prix); ?></div>
      </td>
      <td><div align="center"><a href="transfert.php?id=<?php echo($donnee->id);?>" style="text-decoration:none;">
        <input type="submit" name="modify" value="Modify"></a>
      </div>
      <br/>
      <div align="center"><a href="supprimer.php?id=<?php echo($donnee->id);?>" style="text-decoration:none;">
        <input type="submit" name="delete" value="Delete">
      </a>
      </div>
      </td>
  </tr>
  <?php
      }
echo("
</table>
</fieldset>
<div align='center'><br/><br/></div>
</div>
</center>
</div>
");     
}
else
  {?>
<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Modify/Delete Product</font></h2></center></div><br/>
<div><br/><center><h2><font face="Lucida Handwriting" size="+1">Choose an category</font></h2></center></div>
<div>
<div style="width:25%;float:right">
<br><br><br><br><br>
<img src="../images/7.jpg">
</div>
<br><br>
<center><div style="width:70%;float:right" align="center">
<fieldset style="background:#CC99CC;width:50%">
<br><br>
<form method="post" name="f1" action="">
<table width="366" border="0" align="center">
    <tr>
      <td><div align="center"><strong><font size="+1" face="Comic Sans MS">Category:</font></strong></div></td>
      <td><label>
      <select name="category" id="sel1" required>
        <option>Casual Shirts</option>
        <option>Jeans</option>
        <option>T-shirts</option>
        <option>Footwear</option>
        <option >Shorts</option>
        <option>Watches</option>
        <option>Dresses</option>
        <option>Churidar Suits</option>
        <option>Kurtas</option>
        <option>Sandals</option>
        <option>Office Wear</option>
        <option>Artificial Jewellery</option>
        <option>Baby Apparel</option>
        <option>Girls Apparel</option>
        <option>Boys Apparel</option>
        <option>Kids Toys</option>
      </select>
    </label></td>
    </tr>
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="submit" type="submit" id="sub" value="Submit">
    </center>
    </label></td>
    </tr> 
</table>
 </form>
</fieldset>
</div>
</center>
</div>
<?php
}
?>