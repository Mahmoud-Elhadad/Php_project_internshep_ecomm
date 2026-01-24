<?php 
 
 session_start();
 require "../connection.php";

 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $select = "select * from users where id = $id";
    $result = mysqli_query($connection, $select);
    $user = mysqli_fetch_assoc($result);
    $image = $user["img"];
    
    $query = "delete from users where id = $id";
    $run = mysqli_query($connection, $query);


    if($run){
        if($image != 'pic-1.png' && $image != 'pic-2.png'){
            unlink("../../images/$image");
        }
        
        header("location:../../user.php");
     }
}



?>