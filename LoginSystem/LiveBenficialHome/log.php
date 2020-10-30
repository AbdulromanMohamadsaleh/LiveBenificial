<?php 

session_start();
if(!isset($_SESSION['userlog'])){
unset($_SESSION['userlog']);
session_destroy();
header("Location:../index.php");}
else {
echo "error";
unset($_SESSION['userlog']);
session_destroy();
$_SESSION['logout']= "You've loged out";
header("Location:../../index.php");}
?>