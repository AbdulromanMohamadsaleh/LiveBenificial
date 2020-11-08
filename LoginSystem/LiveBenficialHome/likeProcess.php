<?php 





    $con= mysqli_connect("127.0.0.1:3307","root","root","youtubeclone");
    


    
    
    


    function userLike($id,$username){

        global $con;
         

        $sql="select * from likes where username='$username' and videoid=$id and status='like'";
        
        $resul=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($resul)>0){
            return true;
        }
        else{return false;}
        
    }

    function getlikes($id){

        global $con;

        $sql="select COUNT(*) from likes where videoid=$id and status='like'";
        $rs=mysqli_query($con,$sql);
        $result=mysqli_fetch_all($rs);
        return $result[0][0];
        

    }

    function userdislike($id,$username){
        global $con;
        

        $sql="select * from likes where username='$username' and videoid=$id and status='dislike'";
        $resul=mysqli_query($con,$sql);
        if(mysqli_num_rows($resul)>0){
            return true;
        }
        else{return false;}
    }


    function getdislike($id){

        global $con;
        $sql="select count(*) from likes where videoid=$id and status='dislike'";
        $re=mysqli_query($con,$sql);
        $resulr=mysqli_fetch_all($re);
        return $resulr[0][0];
    }

///////////////////////////////

    function getRating ($id) 
    {
        global $con; 
        $rating = array() ; 
        $likes_query="select COUNT(*) from likes WHERE videoid = $id AND status='like'"; 
        $dislikes_query="select COUNT(*) from likes WHERE videoid = $id AND status='dislike'"; 
        
        
        $likes_rs= mysqli_query($con,$likes_query) ; 
        $dislikes=mysqli_query($con,$dislikes_query) ; 
        $likes=mysqli_fetch_array($likes_rs); 
        $dislikes=mysqli_fetch_array($dislikes_rs) ; 
        $rating=[
            'likes' => $likes[0][0],
            'dislikes' => $dislikes[0][0]
        ]; 
        return json_encode($rating) ;
    } 


    // if user clicks like or dislike button 

if (isset($_POST ['action'])){ 
	$post_id=$_POST['post_id'];
    $action=$_POST['action']; 
    $username=$_SESSION['userlog'];
	switch ($action) { 
        case 'like': 
            
            $q="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;
            Mysqli_query($con,$q) ;
		$sql2="INSERT INTO `likes`(`username`,`videoid`,`status`) 
			VALUES ('$username', $post_id,'like') 
			ON DUPLICATE KEY UPDATE status='like'"; 
        break ; 
        
        case 'dislike':  
            $q="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;
            Mysqli_query($con,$q) ;
            $sql2="INSERT INTO `likes`( `username`,`videoid`,`status`) 
			VALUES ('$username', $post_id,'dislike') 
			ON DUPLICATE KEY UPDATE status='dislike'";
			 
		break ; 
		case 'unlike': 
			$sql2="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ; 
		break ; 
		case 'undislike':
			$sql2="DELETE  FROM  likes WHERE username='$username' AND videoid=$post_id" ;  
		break ; 
	default : 
		break ; 
		
}

// execute query to effect changes in the database . 
Mysqli_query($con,$sql2) ; 
echo getRating($post_id); 
exit (0);


} 

/////////////////////////////////////////////////////


// Get total number of likes and dislikes for a particular post 





?>
