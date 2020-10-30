<?php 
include("include/header1.php");
?> 
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Aboutus.css">
	<title>AboutUs</title>

</head>
<body>


<div id="cursor"></div>
	<div  class="container" >
		<h1 class="create">LIVEBENIFICIAL DEVELEPOR </h1>
		
		<div class="card">
			<div class="img-box">
				<img src="img\hasan.jpeg">
			</div>
				<div class="content">
			<h2>Hasan</h2>
			<p>Graphic Designer/Editor/Programer Grown: Makkah <br> Studies: Data Science at FTU </p>
			<div class="social-media">
        <ul>
          <li><a href="#"><img src="images/facebook.png"></a></li>
           <li><a href="#"><img src="images/whatsapp.png"></a></li>
           <li><a href="#"><img src="images/line.png"></a></li>
          <li><a href="#"><img src="images/instagram.png"></a></li>
        </ul>
      				</div>
			</div>
		</div>
		<div class="card">
			<div class="img-box">
				<img src="img\me.jpg">
			</div>
				<div class="content">
			<h2>Boody </h2>
			<p>Graphic Designer/Editor/Programer Grown: Makkah <br> Studies: Data Science at FTU </p>
			<div class="social-media">
        <ul>
          <li><a href="#"><img src="images/facebook.png"></a></li>
           <li><a href="#"><img src="images/whatsapp.png"></a></li>
           <li><a href="#"><img src="images/line.png"></a></li>
          <li><a href="#"><img src="images/instagram.png"></a></li>
        </ul>
      				</div>
			</div>
		</div>
		<div class="card">
			<div class="img-box">
				<img src="img\Eyad.jpg">
			</div>
				<div class="content">
			<h2>BluEyedo </h2>
			<p>Graphic Designer/Editor/Programer Grown: Makkah <br> Studies: Data Science at FTU </p>
				<div class="social-media">
        <ul>
          <li><a href="#"><img src="images/facebook.png"></a></li>
           <li><a href="#"><img src="images/whatsapp.png"></a></li>
           <li><a href="#"><img src="images/line.png"></a></li>
          <li><a href="#"><img src="images/instagram.png"></a></li>
        </ul>
      				</div>
			</div>
		</div>
	</div>

	
<script type="text/javascript">
	var cursor =  document.getElementById('cursor');
	document.addEventListener('mousemove', function(e){
		var x = e.clientX;
		var y = e.clientY;
		cursor.style.left = x +"px";
		cursor.style.top = y +"px";

	});
</script>
</body>
</html>