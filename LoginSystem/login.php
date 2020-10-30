<?php
session_start();
//includeing to connect Database file 
include("conDtatabase.php");

$current = date("Y");

// if login button is pressed do what's within
if(isset($_POST['loginbutt'])){
//Login Post Format
$userlog = $_POST['Usernamelog'];
$psslog = $_POST['psswordlog'];

// seeking if there is a data in the base that
//carries what the user inputed
$Select = " SELECT * FROM userinfo WHERE
 Pass ='$psslog' AND (Username='$userlog' OR Email ='$userlog')";
//Counting the number of row if existed
$result= mysqli_query($con,$Select);
$rowcount= mysqli_num_rows($result);


// if there's and existing row then login
if ($rowcount == 1){
    $SelectExtUser = "SELECT username, Email FROM userinfo WHERE Email ='$userlog' OR Username='$userlog';";
    $ExtUser =  mysqli_query($con,$SelectExtUser);
     $obj = mysqli_fetch_object($ExtUser);
     
    $_SESSION['userlog'] = $obj->username; 
    header("Location:LiveBenficialHome/index.php");
    }else{ //else there's somthing wrong
    $loginerror="<small>Either password or username is wrong</small>";
    }
}



?>