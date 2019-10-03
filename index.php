<?php
session_start();
require_once('includes/header.php');
require_once('includes/menu.php');
?>
<div id="RightPart">
	<div id="Page">
	<!--script-->
	<script>
	window.onload= defilImg
	current_img = 0;
	arrImg =['images/akkriti-banner.jpg','images/img.jpg','images/img2.jpg','images/img4.jpg'];
		function defilImg(){
		  if(current_img == arrImg.length)
		  current_img = 0;
		  document.getElementById('toto').src = arrImg[current_img++];
		  window.setTimeout('defilImg()',3000);
		}
	</script>
	<!--script-->
	<img id='toto' src="usepics/akkriti-banner.jpg" alt="" width="669" height="210"/>
	<div id="Page_center"></div>
</div></div>
<?php
require_once('includes/footer.php');
?>