
<?php session_start(); ?>

<?php if(!empty($_POST['titleSearch'])){ $_SESSION['t']=$_POST['titleSearch']; }?>
<?php if(empty($_SESSION['c']))
{$_SESSION['c']='white';} 

?>

<?php if(!empty($_SESSION['userlog'])){$user=$_SESSION['userlog'];}   // First check if user is member or not

?>  

<?php if (empty($_SESSION['t'])){$_SESSION['t']="";} ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Live Benificial</title>
        <link rel="icon" href="pic/logo.png">
        <link href="https://fonts.google.com/specimen/Roboto?selection.family=PT+Sans:ital@1|Roboto:ital,wght@1,900">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/Homepagestyle.css">
        <link rel="stylesheet" href="css/uploadStyle1.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

         <!-- Latest compiled JavaScript -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            
       <script src="js/commonActionn.js"></script>
       
        
    </head>

    <body>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <header class="header"> <!--- open header--->

            <button class="navshowhide" aria-label="Create"><img src="pic/hor.png"></button>
            <a href="index.php">
                <img src="https://cdn.iconscout.com/icon/free/png-256/gg-good-game-play-logo-46229.png" alt="logo" class="logo">
                
            </a>
            <form  action='search.php' method="POST"class="search-bar" > <!--- open search-bar--->
                <input class="serach-input"type="search" placeholder="search" aria-label="search" name="titleSearch" required value="<?php echo $_SESSION['t'] ?>" >
                <button type="submit" name="searchbutton" class="search-btn">
                <img class="s" src="pic/search-black.png">
                </button>
                <span><h8><?php echo $date=date('F d Y'); ?></h8></span>
                </form> <!--- close search-bar--->

            <div class="menu-icon">  <!--- open menu-icon--->

             <a href="upload.php" aria-label="Create">

                <img class="upl"src="pic/upload.png" alt="upload video">

             </a>


    
             <a href="#">

                <img class="menu-channel-icon" src="http://unsplash.it/36/36?gravity=centeer" alt="your channel">

             </a>


            <div >
            
            

            </div>
           
            </div>  <!--- close menu-icon--->          
            <form class="mood" method="POST">

                
            
                <button type="submit" name="b" value="black" class="btn btn-primary btn-sm" style="background:black;border-color: white;border:none;">Dark</button>
                <button type="submit" name="b" value="white" class="btn btn-secondary btn-sm" style="background:#dee2e6; color: black;border:none;">Light</button>
                                    </form>
                                   
             <?php  

                    if(isset($_POST['b'])){

                    if($_POST['b']=='black'){ // if  value of b black
                        

                        
                    $_SESSION['c']= $_POST['b'];
                    }
     

   
   else if ($_POST['b']=='white') { //if  value of b white
      $_SESSION['c']= $_POST['b'];

      
      } }

 ?> 
                                             
                                             
    <?php if($_SESSION['c']=='black'){ // if  value of b black

       echo "<style> body{background:black; color:white;} .videos {
           background-color: #000000;
       } .serach-input {background:black;}
       .video-turn{ 
        background-color:black;
           }
           .category {background:#ffffff1a;color:#fff;border: 1px solid #ffffff1a;}
           .categories {background-color: #181818;border:none;}
           .header{ background: linear-gradient(to right, rgb(13 96 162), #0140b3,#2e314e);}
           .search-btn {background:#ffffff14;}
           .videio-title {color: white;}
           .side-bar {background:#212121;}
           .list-group-item {background-color:#2323236b; color:#FFFFFF;}
           .im{background: white;
            border-radius: 50%;}
            .category.active{border-color: #635b5b;}
            .search-btn {border:none;}
            .serach-input{border:none;color: aliceblue;}
            .form-control-file, .form-control-range {color: aliceblue;}
            .btn-primary {background-color: #356190;
                            border:none;}
            video{background-color: rgba(0,0,0,.075);}
            h5{color:white;}
            h3{color:white;}
            .video-turn {

                background-color:black;
            }
               
       </style>";}
     

   
   else if ($_SESSION['c']=='white') { //if  value of b white

       echo "<style> body{background:white;}</style>";}  ?>


                                          
 
             


    


        </header>  <!--- close header--->

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<aside class="side-bar" id="side-bar" style="display: none;">

    <br><br>


    <div class="list-group"> 
    

        <a href="index.php" class="list-group-item list-group-item-action"><img src="pic/home.png" class="im">   Home</a>
        <a href="MyProfile.php" class="list-group-item list-group-item-action" ><img src="pic/profile.png"class="im">   Profile</a>
        <a href="upload.php" class="list-group-item list-group-item-action"> <img src="pic/upload-video.png"class="im">   Upload video</a>       
        <a href="ManageP.php" class="list-group-item list-group-item-action"><img src="pic/settings.png"class="im">   Maneage video</a>
        <a href="AboutUs.php" class="list-group-item list-group-item-action"><img src="pic/aboutUs.png"class="im">    About us</a>
        <a href="log.php" class="list-group-item list-group-item-action" >
            <img src="pic/logout.png"class="im"> 
        <?php if(!isset($_SESSION['userlog'])){echo "Sign up new account";} else echo "Log out";?></a>
</div>




</aside>




<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <div class="categories">  <!--- open categories--->

            <section class="category-section"> <!--- open category-section--->

                <input id="mine" type="radio" class="category" name="cate" value="myvid" checked><label for="mine">My Videos</label>
                <input id="list" type="radio" class="category" name="cate" value="list"><label for="list">My Playlist</label>
                <input id="about" type="radio" class="category" name="cate" value="about"><label for="about">About</label>
                <input id="edit" type="radio" class="category" name="cate" value="Education"><label for="edit">Edit Account</label>

            </section>  <!--- close categories-section--->



        </div> <!--- close category--->

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="main-section"> <!--- open main-section--->

         <div class="videos" >    <!---   احتواء كل الفيديوهات open videos--->

         <section class="video-section">     <!--- open video-section--->

         