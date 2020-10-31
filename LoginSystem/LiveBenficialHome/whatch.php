<?php  include("include/header1.php") ?>

<style>
  .video-turn
  {
  width:100%;
  height: 560px;
  align-items: center;
  min-width: 250px;
  min-height: 150px;
  }

  .video-section
  {
  display: grid;
  grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
  gap: 3rem 1rem;
  padding: 0 0 1rem 0;
  margin: 0 1.5rem;
  border-top: 4px solid #ccc;
  }

  div.video-watch
  {
  grid-column: 1/-1;
  }

  h3
  {
  color:#0400ff;  /* for video title */
  margin-top:2px;
}

  video{border:none}

  .likeContain
  {
  display:inline;
  float:right;
  margin: 7px 40.6px; 
  }

  .like
  {
    background:none;
    border:none
  }

</style>


                                    

<div class="video-watch">
  <br>
  
  <video  class="video-turn" autoplay controls>
  <source src="videos/
<?php
    if(isset($_GET['id'])) {  //  take id of video from URL

            $id=$_GET['id'];
          
            include_once("conDtatabase.php");
            $q="select * from video where id=$id";  //  query check if there is id
            $query=mysqli_query($con,$q);
        
            $row=mysqli_fetch_assoc($query);
            $p=$row['path']; //  use $row to take value of path from table in  database
            $title=$row['title']; //  use $row to take value of title from table in  database
            $desc=$row['description'];
            $deteUpload=$row['updateDate'];
            $userupload=$row['uploadBy'];
            $view=$row['views'];
            $view=1+$view;      //this line for update the view number

            $q2="update video set views=$view  where id=$id"; // qury to set the new value
            $query=mysqli_query($con,$q2);

            echo $p;


    }


?>">

  </video>



  <div class="likeContain">
                        
    Like<button class="like"> <img class="like"src="pic/like.png" alt="like" style="width:30px"></button>500
    | Dislike<button class="like"> <img class="like" src="pic/dislike.png" alt="like" style="width:30px"></button>500 |
  
  </div>
    
  <h3>Title: <?php echo $title; ?></h3>

    <!--- open video-channel-name--->
  <h7 style="color:#9e9e9e">Uploaded by : 
    <a class="video-channel-name" <?php echo "href='visitChanel.php?userUpload=$userupload'"?>  >  <?php echo  $userupload ?>
    </a>
  </h7> <!--- close video-channel-name--->

  <div class="video-metadata "> <!---open video-details--->

  <span><?php echo $view; ?> view</span>
  •
  <span><?php echo $deteUpload; ?></span>

  <hr>
  <h5>Description: <?php echo  "<br><h6>$desc</h6>"; ?></h5>
</div>
    
</section>
    
    
    
    

<!--begains of videos -->
<section class="video-section">
  <h2 class="video-section-title">
  </h2>
 
  <?php
  
    include("conDtatabase.php");
    $sql="SELECT * FROM `video`";
    $result = mysqli_query($con, $sql);
    $resultCheck=mysqli_num_rows($result);

      if( $resultCheck>0)
      { //check if got any result from query
   
        while($row = mysqli_fetch_assoc($result)) 
        {
        $videoPath=$row['path'];
        $videoTitle=$row['title'];
        $deteUpload=$row['updateDate'];
        $id=$row['id'];
        $userUpload=$row['uploadBy'];
        $view=$row['views'];
        include("searchResultContent.php") ;
        }
      }

  ?>

</section>   <!--- close video-section--->

    </section>
  </div>


  <?php include_once("include/footer.php")?>
  
  
  <style>
    .video-section
    {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
    gap: 3rem 1rem;
    padding: 0 0 1rem 0;
    margin: 0 1.5rem;
    border-top: 4px solid #ccc;
    }
  </style>
