
<?php 

$server= "localhost";
$usernameDB = "root";
$passDB = "root";
$MyDB = "LiveBenificial";

//Connecting to the Database
$con= mysqli_connect($server,$usernameDB,$passDB);
mysqli_select_db($con, $MyDB);




?>
