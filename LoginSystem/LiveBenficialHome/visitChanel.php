<!--------------THIS FILE FOR VISIT CHANEL ------------------------>

<style>
    body{/*background-color:black;*/}
    .video-section
    {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
    gap: 3rem 1.5rem;
    padding: 3rem 0;
    margin: 0 1.5rem;
    border-top: 4px solid #ccc;
    /*background-color:black; */
    }

    video
    {
    width: 100%;
    height: 280px;
    min-width: 250px;
    min-height: 150px;
    background-color:black;
    }

    .video-container
    {
    display: flex;
    flex-direction: column;
    width: fit-content;
    }
          
    /*.videos {background-color:black; }*/

    .D_video
    {
    display:none
    }

    .U_video
    {
    background-color:#2ec6d1 ;
    display:none
    }

    .video-container
    {
    display: flex;
    flex-direction: column;
    border: solid 1px;
    }

    .video-bottom-section{padding: 5px;}
       
    h7
    {
    color: #8a8a8a;
    font-size: .9rem;
    }
       
    span{font-size: 0.8rem;}
       
    h4
    {
    margin-left: 23;
    color: red;
    }

    .titlecan{grid-column: 1/-1;}

    .namechan
    {
    font-size: 2.5rem;
    text-align: center;
    }

    span.namec{color:blue;font-size:2.4rem;}

</style>


<?php  include("include/header1.php") ;?>

<?php 
// check if submition of form or button is pressed
    include("conDtatabase.php");

    if(isset($_GET['userUpload']))  //  take id of video from URL
     {      // start if(isset($_GET['userUpload']))
        $userv=$_GET['userUpload'];
    //------THIS IF STATMENT TO PRINT NAME OF THE CHANNEL VISIT--------------------------------------------------------
            if(!empty($_SESSION['userlog']))
            {
                if($userv==$_SESSION['userlog'])
                {
                    echo '<div class="titlecan"><h1 class="namechan">Welcome to '.'<span class="namec">Your</span> channel</h1></div>';
                }  
                else
                {
                echo '<div class="titlecan"><h1 class="namechan">Welcome to '.'<span class="namec">'.'"'.$userv.'"'.'</span>'.' channel</h1></div>';
                }
            }
    //-----------------------   END IF  ---------------------------------------------------------------------------------------------           
       
        if(!empty($userv))
        {       //start if (!empty($userv))
            $sql="SELECT * FROM video WHERE uploadBy = '$userv'";
            $result = mysqli_query($con, $sql);
            $resultCheck=mysqli_num_rows($result); 

            if( $resultCheck>0)     //check if got any result from query
            { // start if  if( $resultCheck>0)
                while($row = mysqli_fetch_assoc($result))
                {   // start while
    
                $videoPath=$row['path'];    //  use $row to take value of path from table in  database  and store it in $videoPath
                $videoTitle=$row['title']; //  use $row to take value of title from table in  database  and store it in $title
                $deteUpload=$row['updateDate']; //  use $row to take value of updateDate from table in  database  and store it in $updateDate
                $user=$row['uploadBy']; //  use $row to take value of uploadBy from table in  database  and store it in $uploadBy
                $id=$row['id'];         //  use $row to take value of id from table in  database  and store it in $id
                $view=$row['views'];       //  use $row to take value of views from table in  database  and store it in $views
                
                include("MangerVideo.php") ;    // go to MangerVideo.php for show video
    
                }   // end while

            }   // endif  if( $resultCheck>0)

        }   //end if(!empty($userv))

    } // start if(isset($_GET['userUpload']))

    else
    {
        echo "<h4 >Sorry NO Video</h4>";
    }
?>

<?php include_once("include/footer.php")?>