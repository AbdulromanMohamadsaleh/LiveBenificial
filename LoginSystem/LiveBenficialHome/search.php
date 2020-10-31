<!------------------    THIS FILE WILL BE USE WHEN USE SEARCH BAR IF INTER TITLE AND CLICK SEARH BOTTUN   -------------------------------------------->
<?php  
    
    include_once("include/header1.php") ;
    include("conDtatabase.php");

    if(isset($_POST['b']))
    { 
        $_SESSION['pathpage'] = "search.php";
    }

    if(isset($_POST['searchbutton'])&&isset($_POST['titleSearch']))  // check if bottun click and enter title in input search
    {
        $title=$_POST['titleSearch'];          // store titlle that user inter in $title
        $sql="SELECT * FROM `video` WHERE title like '%$title%'";       // query for search in database
        $result = mysqli_query($con, $sql); 
        $resultCheck=mysqli_num_rows($result);      
    
            if( $resultCheck>0) //check if got any result from query
            { 
                while($row = mysqli_fetch_assoc($result))   // fitch data
                {
                
                        $videoPath=$row['path'];         //  use $row to take value of path from table in  database  and store it in $videoPath
                        $videoTitle=$row['title'];           //  use $row to take value of title from table in  database  and store it in $title
                        $deteUpload=$row['updateDate'];      //  use $row to take value of updateDate from table in  database  and store it in $updateDate
                        $id=$row['id'];                     //  use $row to take value of id from table in  database  and store it in $id
                        $userUpload=$row['uploadBy'];        //  use $row to take value of uploadBy from table in  database  and store it in $uploadBy
                        $view=$row['views'];             //  use $row to take value of views from table in  database  and store it in $views
                        
                        include("searchResultContent.php") ;        // go to searchResultContent for show video
                }
            }
    
            else 
            {
              echo "<h5>No Result</h5>";  //
            }

    }   

?>

<?php include_once("include/footer.php")?>

