
<!DOCTYPE html>
<!--code by codingflicks.com-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animated Background HTML CSS | No javascript</title>
    <link rel="stylesheet" href="Mainmenu.css">
</head>
</head>
<body class=".boxes">
    <div class="Box_Container_item">	<!--------------- open div (Box_Container_item)--------------->

              
        <img src="logo.png" class="Box_icon_img">


     
        <?php if(isset($_SESSION['logout'])){echo $_SESSION['logout'];} ?>
        <a  href="LoginSystem/index.php"> <button type="button" class="BTN">Login/Signup</button></a>
       <a  href="LoginSystem/LiveBenficialHome/index.php"><button type="button" class="BTN">Enter as a visitor</button></a>
       
        
    </div><!------------------------ end item ---------------->	

    
</body>
</html>