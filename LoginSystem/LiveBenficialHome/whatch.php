<?php  include("include/header1.php");
        include("likeProcess.php");
        
        if(!empty($_SESSION['userlog'])){
        $username=$_SESSION['userlog'];}
         ?>
<script src="js/like2.js">
  
</script>


<?php

    function current_url()
    {

      $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      $validurl=str_replace("&","&amp;",$url);
      return $validurl;
    }

   ?>


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

  .modal-header {display: flow-root;}

  .h6, h6 {
    font-size: 0.7rem;
}

.btn {    padding: 0.1rem 0.2rem;}
.btn-success { padding: 0 ;}

.btn-group-lg>.btn, .btn-lg {
    padding: .8rem .4rem;
    font-size: 0.9rem;
     line-height: 0; 
    border-radius: .3rem;
}



@media screen and (max-width: 600px) {
h6 {
        margin-bottom: .5rem;
        font-weight: 200;
        line-height: 1.2;
    }
}}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


                                    

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
            $Vid=$row['id'];
            $q2="update video set views=$view  where id=$id"; // qury to set the new value
            $query=mysqli_query($con,$q2);

            echo $p;


    }


?>">

  </video>



  <div class="likeContain">
                        
        
              <!-- check if user likes post , style button differently-->
             
             
              <i        
                    <?php
                    if(!empty($username)){
                    if(userlike($id,$username)){ echo'class="fa fa-thumbs-up like-btn"';}
                    
                    else{ echo'class="fa fa-thumbs-o-up like-btn ff"';}}
                    else {echo'class="fa fa-thumbs-o-up ';}?>
                    
                
                    
                   
                    
                    data-id="<?php echo $id;?>">
                </i>
                <span class="likes"><?php echo getlikes($id);  ?></span> 
                &nbsp &nbsp &nbsp

                <!-- if user dislike post , style diffrint -->
                
                

                
               <i
                    
                      <?php if(!empty($username)){
                      if(userdislike($id,$username)){echo 'class="fa fa-thumbs-down dislike-btn"';}
                      else{echo'class="fa fa-thumbs-o-down dislike-btn"';}}
                      else{echo'class="fa fa-thumbs-o-down"';} ?>

                    
                    
                    
                    
                    data-id="<?php echo $id;?>">
                </i>
                <span class="dislikes"><?php echo getdislike($id);  ?></span>  

      <!----------------------------------------------------------START SHARE------------------------------------>
                      

  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Share</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Share this video</h5>
        </div>
        <div class="modal-body">
          <p>Copy Link: <h6><br><?php echo current_url(); ?></h6></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    
  <!----------------------------------------------------------END SHARE------------------------------------>

  
  </div>


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



<!------------------------------------->


<?php

    // if user clicks like or dislike button 

if (isset($_POST ['action'] ) ){ 
	$post_id=$Vid; 
    $action=$_POST['action']; 
    $username=$_SESSION['userlog'];
	switch ($action) { 
        case 'like': 
            
            $q="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;
            Mysqli_query($con,$q) ;
		$sql="INSERT INTO `likes`(`username`,`videoid`,`status`) 
			VALUES ('$username', $post_id,'like') 
			ON DUPLICATE KEY UPDATE status='like'"; 
        break ; 
        
        case 'dislike':  
            $q="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;
            Mysqli_query($con,$q) ;
            $sql="INSERT INTO `likes`( `username`,`videoid`,`status`) 
			VALUES ($username, $post_id,'dislike') 
			ON DUPLICATE KEY UPDATE status='dislike'";
			 
		break ; 
		case 'unlike': 
			$sql="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ; 
		break ; 
		case 'undislike':
			$sql="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;  
		break ; 
	default : 
		break ; 
		
}

// execute query to effect changes in the database . 
Mysqli_query($con,$sql) ; 
echo getRating($post_id); 
exit (0);


} 

/////////////////////////////////////////////////////


// Get total number of likes and dislikes for a particular post 

?>