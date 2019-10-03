<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Add Product</font></h2></center></div>
<div>
<div style="width:25%;float:right">
<br><br><br><br><br>
<img src="../images/7.jpg">
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
    <input name="code" type="text" id="t1" required></td>
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
      
        <input name="price" type="text" id="t1" required>    </td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>Quantity:</strong></font></div></td>
    <td><input name="quantity" type="text" id="t2"required ></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong> Description:</strong></font></div></td>
    <td><label>
      <textarea name="description" id="t6" required></textarea>
    </label></td>
    </tr>
    <tr>
    <td colspan="2"><label><br>
    <center>
    <input type="file" name="img"></center>
    </label></td>
    </tr> 
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="submit" type="submit" id="sub" value=" Add  ">
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
//ajouter une produit;
if(isset($_POST['submit']))
  {
    $code=$_POST['code'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $db=new PDO('mysql:host=localhost;dbname=projet','root','');
    $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $select=$db->query("SELECT id FROM category WHERE nom='$category'");
    $donnee=$select->fetch(PDO::FETCH_OBJ);
    $id=$donnee->id;
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
              //ajouter produit au DB;
              $db->query("INSERT INTO product(code,prix,description,categorie,quantite) VALUES ('$code','$price','$description',$id,$quantity)");
              //fin;

          echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1">Upload effectué avec succès !</font></h2></center></div>');
         }

         else //Sinon (la fonction renvoie FALSE).
            {
              echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1">Echec de l\'upload !</font></h2></center></div>');
            }
        }

        else
        {
          echo('<div><br/><center><h2><font face="Lucida Handwriting" size="+1">choose an image  :.jpg,.png,.jpeg,.gif</font></h2></center></div>');
        }
}
  }
?>