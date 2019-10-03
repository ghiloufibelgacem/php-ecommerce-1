<?php
if(isset($_SESSION['user']))
{

$id=$_SESSION['now'];
echo('
<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">PANIER</font></h2></center></div>
<center><div align="center">
<div><br/><br/>
<center><fieldset style="width:40%;border-color:#006633;">
<br><br>
<form method="post" action="" id="myForm">
<table width="288" border="0" style="float:left;">');

      $db=new PDO('mysql:host=localhost;dbname=projet','root','');
      $select=$db->query("SELECT code,prix FROM product WHERE id=$id");
      $donnee=$select->fetch(PDO::FETCH_OBJ);
  ?>
        <tr> 
          <td><center>
          <img src="upload/<?php echo($donnee->code);?>.jpg" width="90" height="90" style="left:top;border:2px solid black;"></center>
          </td>
          <td><center><input type="text" id="quantite" name="quantite" style="width:60px;text-align:center;" value="1" onchange="calcule()"></center></td>
          <td><center>
          <input type="text" id="prix" value="<?php echo($donnee->prix);?>" style="width:60px;text-align:center;border:none;background:#f5fdfd;"
            onFocus="this.blur()"/>
            &nbsp;</center></td>
          </tr>
    </table>
  <h4 style="float:right;">Total :&nbsp;
    <input type="text" id="to" value="<?php echo($donnee->prix);?>" style="width:60px;text-align:center;border:none;
    background:#f5fdfd;"onFocus="this.blur()"/>dt&nbsp;&nbsp;
  </h4>
</form>
</fieldset>
<br/><br/>
</center>
</div>
</div>
</center>
<center>
  <form>
  <input type="submit" name="paypal" value="paypal"/>&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="card" value="card"/>
  </form><br/>
  <IMG src="images/img3.png" width="300" height="100" style="float:bottom;"></center>
<script type="text/javascript">
function calcule()
  { var t=document.getElementById('to');
    var x = document.getElementById("prix")
    var c = document.getElementById("quantite");
    var e= parseInt(x.value)*parseInt(c.value);
    t.value=e;
  }
</script>
<?php
}
else
{
  header('Location:login.php');
}
?>