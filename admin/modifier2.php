<?php
session_start();
if(isset($_SESSION['id']))
{
		$id=$_SESSION['id'];
		$db=new PDO('mysql:host=localhost;dbname=projet','root','');
        //$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        //$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $select=$db->query("SELECT * FROM product WHERE id='$id'");
        $donnee=$select->fetch(PDO::FETCH_OBJ);
        require_once('header.php');
        ?>
<div id="RightPart">
<div id="Page_center">
<div>
<div style="width:25%;float:right">
<br><br><br><br><br>
<img src="../upload/<?php echo($donnee->code)?>.jpg" width="150">
</div>
<br><br>
<center><div style="width:70%;float:right" align="center">
<fieldset style="background:#CC99CC;width:50%">
<br><br>
<form method="post" name="f1" action="" enctype="multipart/form-data">
<table width="366" border="0" align="center">
  <tr>
    <td><div align="center"><strong><font size="+1" face="Comic Sans MS">Code:</font></strong></div></td>
    <td width="192">
    <input name="code" type="text" id="t1" value="<?php echo($donnee->code)?>"></td>
  </tr>
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
    <td width="164"><div align="center"><font size="+1" face="Comic Sans MS"><b> Pirce:</b></font></div></td>
    <td width="192">
    <input name="price" type="text" id="t1" value="<?php echo($donnee->prix);?>"></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>Quantity:</strong></font></div></td>
    <td><input name="quantity" type="text" id="t2" value="<?php echo($donnee->quantite)?>" ></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong> Description:</strong></font></div></td>
    <td><label>
    <textarea name="description" id="t6" required><?php echo($donnee->description);?></textarea>
    </label></td>
    </tr>
    <tr>
    <td colspan="2"><label><br>
    <center>
    <input type="file" name="img" required></center>
    </label></td>
    </tr> 
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="submit" type="submit" id="sub" value="Modify">
    </center>
    </label></td>
    </tr> 
</table>
 </form>
</fieldset>
<div align='center'><br/><br/></div>
</div>
</center>
</div>
</div>
</div>
<?php
	if(isset($_POST['submit']))
	{

	$code=$_POST['code'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $select=$db->query("SELECT id FROM category WHERE nom='$category'");
    $donnee=$select->fetch(PDO::FETCH_OBJ);
    $catg=$donnee->id;
    $select->closeCursor();
    if(isset($_FILES['img']))
		{    
    		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
    		$extension = strrchr($_FILES['img']['name'], '.');
    		$dossier = '../upload/';
    		$fichier =$code.'.jpg';
         	if(in_array($extension, $extensions)) {
         		//Si l'extension n'est pas dans le tableau
         	if(move_uploaded_file($_FILES['img']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE,
         		{    
              			//modifier un produit;
           			if($db->query("UPDATE product SET code='$code',prix='$price',description='$description',categorie='$catg',quantite='$quantity' WHERE id='$id'"))
           			{
           				header('Location:del.php');
           			}
           			else{
           				 echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1">Echec de l\'upload !</font></h2></center></div>');
           				}   
         		}
        	}
        	else
        	{
          echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1">choose an image  :.jpg,.png,.jpeg,.gif</font></h2></center></div>');
        	}
		}
	}
require_once('footer.php');
}
else{

	header('Location:modifier.php');
}
?>