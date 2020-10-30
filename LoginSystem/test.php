<?php
 $servername= "localhost";
 $user = "root";
 $password = "root";
 $conn = new mysqli($servername, $user, $password);
 if ( $conn -> connect_error){
 die("connection faild:");
}
 echo("connected");

?>