<?php
session_start();
require_once('includes/header.php');
require_once('includes/menu.php');
?>
<div id="RightPart">
  <div id="Page">
    <div id="Page_center"><?php require_once("includes/gallery.php");?></div>
  </div>
</div>
<?php
require_once('includes/footer.php');
?>