
<?php  include_once("header1.php") ;

// check if submition of form or button is pressed
include("conDtatabase.php");

if(isset($_POST['b'])){ 
    $_SESSION['pathpage'] = "search.php";}

if(isset($_POST['searchbutton'])&&isset($_POST['titleSearch'])){

    $title=$_POST['titleSearch'];
    
   
    
    $sql="SELECT * FROM `video` WHERE title like '%$title%'";
    
    
    $result = mysqli_query($con, $sql);

    $resultCheck=mysqli_num_rows($result);

    if( $resultCheck>0){ //check if got any result from query
   


        while($row = mysqli_fetch_assoc($result)) {
    

    $videoPath=$row['path'];
    $videoTitle=$row['title'];
    $deteUpload=$row['updateDate'];
    $id=$row['id'];
    $userUpload=$row['uploadBy'];
    $view=$row['views'];
    
    

   

        include("searchResultContent.php") ;
        

    }
}
    else if (!isset($_POST['searchbutton'])) 
    {}
    
    else {echo "<h5>No Result</h5>";}


}








?>




<?php include_once("footer.php")?>

