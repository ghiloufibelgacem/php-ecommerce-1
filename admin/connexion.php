<?php
session_start();
?>
<div><br/><center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Login your Account</font></h2></center></div>
<div>
<div style="width:25%;float:right">
<img src="../images/login.jpg" width="350">
</div>
<br><br>
<div style="width:70%;float:right" align="center" >
<center><fieldset style="background:#CC99CC;width:50%">
<br><br>
<table width="244" border="0" align="center">
<form method="post" action="">
<tr><td colspan="2"></td></tr>
  <tr><td width="90"><div align="center"><font size="+1" face="Comic Sans MS">Email:</font></div></td>
    <td width="144"><label>
      <input name="email" type="text" required>
    </label></td>
  </tr>
  <tr>
  	<td><div align="center"><font size="+1" face="Comic Sans MS">Password:</font></div></td>
    <td><input name="password" type="password"></td>
  </tr>
  <tr>
    <td>
      <label>
      <div align="center">
      <input name="submit" type="submit" value="Login">
      </div>
      </label></td>
  </tr>
  </form>
</table>
</fieldset></center>
</div>
</div>

<?php
  
  if(isset($_POST['submit']))
  {

    define('EMAIL','belgacemghiloufi2018@gmail.com');
    define('PASSWORD','4iloufi#');

    if($_POST['email']== EMAIL and $_POST['password']== PASSWORD)
    {
      $_SESSION['admin']='admin';
      header('Location:index.php');
    }
  }
?>