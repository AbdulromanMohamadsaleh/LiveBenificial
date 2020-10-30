<style>
        body{/*background-color:black;*/}
            .video-section {
                display: grid;
                 grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
              gap: 3rem 1.5rem;
             padding: 3rem 0;
             margin: 0 1.5rem;
            border-top: 4px solid #ccc;
            /*background-color:black; */
            }

            video{
                width: 100%;
                 height: 280px;
                 min-width: 250px;
                 min-height: 150px;
                 background-color:black;
            }

            .video-container {
                       display: flex;
                         flex-direction: column;
                        width: fit-content;
                        
            }
          /*  .videos {

            background-color:black; 
            }*/


            .D_video{
                display:none

}
.U_video{background-color:#2ec6d1 ;
 display:none

}
.video-container{

display: flex;
flex-direction: column;
border: solid 1px;


}
.video-bottom-section {padding: 5px;}
       
       
       
       
h7{    color: #8a8a8a;
    font-size: .9rem;}
       
       span{font-size: 0.8rem;}
       
       h4 {
    margin-left: 23;
    color: red;
}


.titlecan{grid-column: 1/-1;}


.namechan{
    font-size: 2.5rem;
    text-align: center;
}
span.namec{color:blue;font-size:2.4rem;}

       </style>


<?php  include("header1.php") ;?>





<?php 
// check if submition of form or button is pressed
include("conDtatabase.php");



if(isset($_GET['userUpload'])) {  //  take id of video from URL

    $userv=$_GET['userUpload'];


  if($userv==$_SESSION['user']){ echo '<div class="titlecan"><h1 class="namechan">Welcome to '.'<span class="namec">Your</span> channel</h1></div>';  }  
  else{
echo '<div class="titlecan"><h1 class="namechan">Welcome to '.'<span class="namec">'.$userv.'</span>'.' channel</h1></div>';    }
 
    if(!empty($userv)){
    $sql="SELECT * FROM video WHERE uploadBy = '$userv'";
    
    
    $result = mysqli_query($con, $sql);

    $resultCheck=mysqli_num_rows($result);

    if( $resultCheck>0){ //check if got any result from query
   


        while($row = mysqli_fetch_assoc($result)) {
    

    $videoPath=$row['path'];
    $videoTitle=$row['title'];
    $deteUpload=$row['updateDate'];
    $user=$row['uploadBy'];

        include("MangerVideo.php") ;
    
    }
}}}
else{echo "<h4 >Sorry NO Video</h4>";}


?>




<?php include_once("footer.php")?>