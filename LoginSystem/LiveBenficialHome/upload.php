<?php
// Start the session
session_start();
?>
<?php ob_start(); ?>
<?php  include_once("include/header1.php") ?>
<?php  include_once("class/VideoDetailsFromProvider.php");
 $_SESSION['pathloc']= "testupload.php";

 if(!empty($_SESSION['userlog'])){$user=$_SESSION['userlog'];}
 
 ?>

<style>
  
  h4 {
    margin-left: 23;
    color: red;
}

.categories{
display:none;
}

.category-section{
display:none;
}

.category{
  
display:none;
}

.video-section{border-top:none;}

.importboxes label{
  padding: 80px;
  background:grey; 
  color:white; 
  position:relative; 
  display:inline-block; 
  width:30%;
   height:70%;
   border-radius:30px;
}

.importboxes label:hover{
  background:rgb(80, 80, 80); 
}

#main-section{
margin-top:0vh;
}

.side-bar{
  margin-top:-08vh;
}


</style>   


    <section class="video-section">     <!--- open video-section--->




    <!----------------------------   open main upload form  --------------------------------->
      
    <form  method='POST' id='form' enctype="multipart/form-data">
    <center>
    <div class="importboxes">
        <img src="">
        <label for="vid">Import video</label>
        <input style="display: none;" type="file" name="fileInput" class="form-control-file" id="vid" required>
      
        <label for="img"> Import thumbnail</lable>
        <input style="display: none;" type="file" name="fileImg" class="form-control-file2" id="img">
      
    </div>
</center>

      
      <div class"form-group">
            <input type="text" name="titleInput" class="form-control" placeholder="Title" required>
        </div>
        <br>
        <div class"form-group">
        <textarea class="form-control" name="description"  rows="3" placeholder="description"  ></textarea>
        <br>
        </div>

        <br>
        <select class="custom-select" name="category">
              <option selected>Open this select menu</option>
              <option value="0">Public</option>
              <option value="1">Private</option>
              
            </select>
            <br>
            <br>
            <button type='submit'name='uploadButton' class='btn btn-primary'>Upload</button>  
                       
    </form>


    <!----------------------------   close main upload form  --------------------------------->


  




    </section>   <!--- close video-section--->
  <?php 
  
  if(!isset($_SESSION['userlog'])){echo "<h4>Sorry You Cant Upload Because You are Not a Member You have to Register First<h4>";}
  else{
  
  include("conDtatabase.php");

if(isset($_POST['uploadButton'])){

      $user= $_SESSION['userlog'];
      $description=$_POST['description'];
      $title=$_FILES['fileInput']['name'];
      $tmp=$_FILES['fileInput']['tmp_name'];
      $titleInput=$_POST['titleInput'];

      $gethumb=$_FILES['fileImg'];
      $tmpthmb=$_FILES['fileImg']['tmpthmb_name'];
      
      $ThumbEXE=explode('.',$gethumb);
      $ThumbEXEfinaly=strtolower(end($ThumbEXE));
      $allowTypeimg= array ('jpeg','jpg','png');

      if ( in_array($ThumbEXEfinaly,$allowTypeimg)){
      /*$width = imagesx($gethumb);
      $height = imagesy($gethumb);

      $newwidth= $width/6;
      $newheight= $height/6;

      $sized= imagecreatetruecolor($newwidth,$newheight);
      imagecopyresampled($sized,$gethumb,0,0,0,0,$newwidth,$newheight,$width,$height); 
      $thumbfinaly =imagejpeg($thumbnail,$gethumb);
      $thumbnailpath = "Thumbnail/".$thumbfinaly; */
        
      $filepath= move_uploaded_file($tmpthmb,"thumbnail".$gethumb,$ThumbEXEfinaly);
      $_SESSION["thumbpath"]=$filepath;
      $sqlthumb= "INSERT INTO Thumbnail (accesstoken) VALUES ('$filepath') ";
      $res= mysqli_query($con,$sqlthumb);

      $_SESSION["thumbnail"]=$res;
      }else{ echo "<Invalid type:"."<br>"."you most enter jpg or jpeg";}

      // move_uploaded_file($tmp,"videos/".$name);
      
      $allowTypevid="mp4";
      $path=$tmp.basename($title);

      $videoEXE=strtolower(pathinfo($path,PATHINFO_EXTENSION));
      $videoPath=basename($title);
      if($videoEXE==$allowTypevid){

          $videioPath=move_uploaded_file($tmp,"videos/".basename($title));  
          $videoPath=basename($title);
          $_SESSION['path'] =$videoPath;
          $sql="INSERT INTO video (username,title,description,updateDate,path)
           VALUES ('$user','$titleInput','$description','$date','$videoPath');";
          $res=mysqli_query($con,$sql);
          
          $_SESSION['res'] =$res;
          
          
                 header('Location: p.php');
                 ob_end_flush;
       
          }
          

         else{echo"<h4>Invalid Type:you Most Enter mp4 Only</h4>";}
        }
         
          // end if check file

        

     
      

} // end if is set




?>
    

 <?php include_once("include/footer.php")?>

