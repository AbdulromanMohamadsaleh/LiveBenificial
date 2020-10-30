<!-- this page will open after upload is sucess video -->
<?php
include_once("include/header1.php") ; // Start the session ?>



<style>
  
  .video-section {
    display: grid;
    grid-template-columns:1fr;
    gap: 0;
    padding: 3rem 0;
    margin: 0 auto;
    border-top: 4px solid #ccc;
    text-align:center ;
}

video{

  width:65%;
    height: 320px;
    min-width: 250px;
    min-height: 150px;
    /*background-color: white;*/
    margin: 0 auto 0 auto;

    
    
}</style>

<?php


  if($_SESSION['res']>0){  // check if there  result from testupload at line 90
                  
    echo "<h5 >Upload sucsess</h5>";  } // if there is result show 
  
    else {echo '<h3>No video</h3>'; } // if no result show 


?>




<br>
<br>

<video controls autoplay >
  <source src="videos/<?php echo $_SESSION["path"];?>" >  <!--$SESSION value  toke from testupload at line 88 ots save the path of video -->
</video>

<img src="thumbnail/<?php echo $_SESSION["thumbnail"];?>">

<?php
// destroy the session
$_SESSION["res"]=0;
$_SESSION["path"]=0;
$_SESSION["thumbnail"]=0;
?>