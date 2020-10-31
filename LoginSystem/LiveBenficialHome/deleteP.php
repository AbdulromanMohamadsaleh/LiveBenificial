
<!------------------------- THIS FILE FOR DELETE PROCESS----------------------------------------->

<?php 
       include("include/header1.php");
       include("condtatabase.php");
?>

<style>
       h4{
              grid-column:1/-1;
              text-align: center;
       }
</style>

<!----------------------------------------For collect data of video that we want delete by  get the id from URL ------------------------------------------------------------------------>
<?php  
            
       if(isset($_POST['delete']))        // check if click delete bottun
       {  
              $id=$_GET['id'];            // get id from url link
              $sql1="select * from video where id=$id";        // select info of video that we got id
              $result=mysqli_query($con, $sql1);        // execute result
              $row=mysqli_fetch_assoc($result);         // fitch data from result
              $p=$row['path'];            //  use $row to take value of path from table in  database and store it in $path 
              $title=$row['title'];       //  use $row to take value of title from table in  database  and store it in $title
       }
       else {echo "Error";}               // if didnot click delete

?>

<!----------------------------------------For delete video by id and path delete from database and server ------------------------------------------------------------------------>

<?php 

       if(!empty($id)&&!empty($p))        // check if he got the id and path from top condition at line 23-24
       {  
              $sql2="DELETE FROM `video` WHERE `id`=$id AND `path`='$p'";           // qurey for delete video
              mysqli_query($con, $sql2);       
              unlink("videos/$p");        // fot delete video from file in server by $p=path

              echo '
                     <script> 
                            alert("Delete was sucsessfully");
                            window.location.href="managep.php?deleted";              
                     </script>'; // for show maasseg and head to managep         
       }
       else {echo '<h4>cant delete<h4'.$title; }
       
?>
