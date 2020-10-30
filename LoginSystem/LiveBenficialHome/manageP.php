
<style>  h4 {
    margin-left: 23;
    color: red;
}</style>

<?php  
session_start();
include("include/header1.php") ;
// check if submition of form or button is pressed
include("conDtatabase.php");

if(!empty($_SESSION['userlog'])){$user=$_SESSION['userlog'];} // First check if user is member or not

    
   
    if(!empty($user)){
    $sql="SELECT * FROM video WHERE uploadBy = '$user'";
    
    
    $result = mysqli_query($con, $sql);
    $rows=mysqli_num_rows($result);

    if( $rows>0){ //check if got any result from query
   


        while($row = mysqli_fetch_assoc($result)) {
    

        $videoPath=$row['path'];
        $videoTitle=$row['title'];
        $deteUpload=$row['updateDate'];
        $user=$row['uploadBy'];

            include("MangerVideo.php") ;
        
        }
    } 
    else {echo "<h4>You dont have video</h4>";} 
}
else {echo "<h4 >Sorry you are not a member You Dont Have Any Video</h4>";}


?>




<?php include_once("include/footer.php")?>