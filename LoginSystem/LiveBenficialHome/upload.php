
<?php ob_start(); ?>
<?php  include_once("include/header1.php") ?>
<?php  
  include_once("class/VideoDetailsFromProvider.php");
  $_SESSION['pathloc']= "testupload.php";
  if(!empty($_SESSION['userlog']))
  {
    $user=$_SESSION['userlog'];
  }
?>

<style>
  
  h4
  {
    display:block;
    margin-left: 23;
    color: red;
    grid-column: 1/-1;
  }

  .categories{display:none;}

  .category-section{display:none;}

  .category{display:none;}

  .video-section{margin-top:7vh; border-top:none;}

  .importboxes label
  {
    padding: 80px;
    background:grey; 
    color:white; 
    position:relative; 
    display:inline-block; 
    width:30%;
    height:70%;
    border-radius:30px;
  }

  .importboxes label:hover{background:rgb(80, 80, 80);}

  #main-section{margin-top:0vh;}

  .side-bar{margin-top:-08vh;}

  #form
  {
    padding-left: 8%;
    position: absolute;
    width: 70%;
    margin-top: 29px;
  }

  .video-section
  {
    display: grid;   
    gap:0px;
    padding:0px;
  }

 .plsregester
  {
  grid-column: 1/-1;
  text-align: center;
  }

  @media screen and (max-width: 600px)
  {
    .importboxes
    {
    display:inline-block;
    padding:-0px;
    }
    #form
    {
      padding-left: 8%;
      position:relative;
      width: 70%;
      margin-top: 29px; 
    }

    .video-section{margin-top:9vh; border-top:none;}
  }
</style>   


<section class="video-section">     <!--- open video-section--->




    <!----------------------------   open main upload form  --------------------------------->
      
    <form  method='POST' id='form' enctype="multipart/form-data">  <!-----inctype specifies how the form data should be encoded  this allow as to import any type of file using php-------->
      <center>
        <div class="btn btn-primary">
          <img src="">
          <label for="vid">Import video</label>
          <input style="display: none;" type="file" name="fileInput" class="form-control-file" id="vid" required>
        </div>
        <div class="btn btn-primary">
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
      <br><br>
      <button type='submit'name='uploadButton' class='btn btn-primary'>Upload</button>  
                       
    </form>


    <!----------------------------   close main upload form  --------------------------------->

</section>   <!--- close video-section--->



  <?php 
  
    if(!isset($_SESSION['userlog']))
    
      {
        echo "<h4>Sorry You Cant Upload Because You are Not a Member You have to Register First<h4>";
      }

      else
      {

        include("conDtatabase.php");

        if(isset($_POST['uploadButton']))
        {
          // print_r ($_FILES['fileInput']);     // $FILEs is super global varibul use to get all information of file
          $description=$_POST['description'];
          $title=rand(1000,100000).$_FILES['fileInput']['name']; //  full name this line to get the path and put random number for the path
          $tmp=$_FILES['fileInput']['tmp_name'];  // temprorry location 
          $titleInput=$_POST['titleInput'];
          // move_uploaded_file($tmp,"videos/".$name);
          $allowType="mp4";
          $path=$tmp.basename($title);  // $path is   The basename() function returns the filename from a path.
          $videoEXE=strtolower(pathinfo($path,PATHINFO_EXTENSION));  // take the extention
            
          if($videoEXE==$allowType)
          {

            move_uploaded_file($tmp,"videos/".basename($title));  
            $videoPath=basename($title);
            $_SESSION["path"] =$videoPath;
            $sql="insert into video (title,description,path,uploadBy) values ('$titleInput','$description','$videoPath','$user')";
            $res=mysqli_query($con,$sql);
            $_SESSION["res"] =$res;
        
              header('Location: p.php');
              ob_end_flush;
     
          } // end if file exe
          else
          {
            echo"<h4>Invalid Type:you Most Enter mp4 Only</h4>";
          }
        }
         
          // end if check file
      } // end if is set

?>
    

 <?php include_once("include/footer.php")?>

