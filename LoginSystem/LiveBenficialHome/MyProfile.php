<?php   ?>
<?php   include("include/MyProfile.php");?>
<?php   include("include/mainContent.php");?>


<!DOCTYPE html>
<html>
<head>
    <title>Profile page</title>
    <link href="css/" rel="stylesheet">
</head>

    <body>

    <h3>  <?php if (isset($_SESSION['userlog'])) echo "Hello There ".$_SESSION['userlog']."</h3>";
    else echo"You can sign up to upload videos" ?>




    </body>
</html>