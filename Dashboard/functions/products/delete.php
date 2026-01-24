<?php 


if(isset($_GET['id'])){
    require "../connection.php";
    $id = $_GET['id'];

    $query_images = "select * from product where id = $id";
    $run_images = mysqli_query($connection, $query_images);
    $user = mysqli_fetch_assoc($run_images);
    $images_pro = $user["images"];
    $all_images = json_decode($images_pro);
    foreach($all_images as $image){
        unlink("../../images/products/$image");
    }

    $query = "delete from product where id = $id";
    $run = mysqli_query($connection, $query);

    if($run){
        header("location:../../product.php");
    }

}




?>