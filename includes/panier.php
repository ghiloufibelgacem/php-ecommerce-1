<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">PANIER</font></h2></center></div>
<center><div align="center">
<div><br/><br/>
<center><fieldset style="width:40%;border-color:#006633;">
<br><br>
  <form method="post" action="commande.php" id="myForm" name="f">
    <table width="288" border="0" style="float:left;">
      <?php
       $prix=0;
       $db=new PDO('mysql:host=localhost;dbname=projet','root','');
       $array=$_SESSION['panier'];
       foreach ($array as $id) 
       {
        $select=$db->query("SELECT code,prix FROM product WHERE id=$id");
        $donnee=$select->fetch(PDO::FETCH_OBJ);
        $prix+=$donnee->prix;
        ?>
        <tr> 
          <td><center>
          <img src="upload/<?php echo($donnee->code);?>.jpg" width="90" height="90" style="left:top;border:2px solid black;"></center>
          </td>
        <td><center>
          <input type="text" name="<?php echo($id);?>" 
          style="width:60px;text-align:center;" 
          value="1" onchange="calcule()">
          </center>
        </td>
          <td>
            <center>&nbsp;&nbsp;
            <a href="transfert3?id=<?php echo($id);?>"><img src="images/del.png"/></a>
          &nbsp;&nbsp;
          </center>
        </td>
          <td><center>
          <input type="text" name="quantite"
            value="<?php echo($donnee->prix);?>" 
            style="width:60px;text-align:center;border:none;background:#f5fdfd;"
            onFocus="this.blur()"/>
            &nbsp;</center></td>
          </tr>
      <?php
        }
      ?>  
    </table>

  <h4 style="float:right;">Total :&nbsp;
    <input type="text" id="to" name="totale" value="<?php echo($prix)?>"
    style="width:60px;text-align:center;border:none;
    background:#f5fdfd;"onFocus="this.blur()"/>dt&nbsp;&nbsp;
  </h4>
<input type="submit" name="submit" value="Bon de commande" >
</form>
<br/>
</fieldset>
<br/><br/>
</center>
</div>
</div>
</center>
<script type="text/javascript">

function calcule()
  
  { var t=document.getElementById('to');
    var x = document.getElementById("myForm").elements.length;
    var c = document.getElementById("myForm");
    var e=0;
    for (i=0;i<x-2;i+=2)
    {
      var a=c.elements[i].value;
      var b=c.elements[i+1].value;
      var z=parseInt(a)*parseInt(b);
      e+=z;

      /*if(isNaN(a)){alert('entre un entier');}

      else{
      var z=parseInt(a)*parseInt(b);
      e+=z;}*/
    }
    t.value=e;
  }

</script>