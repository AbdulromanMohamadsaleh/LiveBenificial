
<!--------------------------THIS FILE FOR MANAGE VIDEO PAGE ----------------------------------->
<style>  
    h4{
        margin-left: 23;
        color: red;
        grid-column:1/-1;
        text-align: center;
      }
</style>


<?php  
    session_start();
    include("include/header1.php") ;
    include("conDtatabase.php");

    if(!empty($_SESSION['userlog']))     // First check if user is member or not
    {
        $user=$_SESSION['userlog'];     // store username in $user
    }

    if(!empty($user))   // check if he is member or visitor
    
    {   // open //check if he is member or visitor

        $sql="SELECT * FROM video WHERE uploadBy = '$user'";  // query to show all video that $user  have
        $result = mysqli_query($con, $sql);
        $rows=mysqli_num_rows($result); // store result
    
            if( $rows>0)    //check if got any result video
            {   // open if //check if got any result video
   

                while($row = mysqli_fetch_assoc($result))   // fitch data from result
                {   /// open while

                $videoPath=$row['path'];        // store path from database into $videoPath
                $videoTitle=$row['title'];      // store title from database into $title
                $deteUpload=$row['updateDate']; // store updateDate from database into $updateDate
                $user=$row['uploadBy'];         // store uploadBy from database into $uploadBy
                $view=$row['views'];            // store views from database into $views
                $id=$row['id'];                 // store id from database into $id

                include("MangerVideo.php") ;    // go to MangerVideo.php for show video
           
                }  /// close while
            
            }  // close if //check if got any result video


            else
            {   // open // else no video
                echo "<h4>You dont have video</h4>";        // else no video
            }     // close // else no video
    }    // close //check if he is member or visitor


    else
    {   //open if he si not mamber
        echo "<h4 >Sorry you are not a member You Dont Have Any Video</h4>";
    }   //close if he si not mamber


?>


<?php include_once("include/footer.php")?>