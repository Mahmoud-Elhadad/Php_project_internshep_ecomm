<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    session_start();
    require "../connection.php";

    extract($_POST);
    $error = ''; 

    if(empty($category)){
        $error = 'Enter Category Name';
    }elseif(is_numeric($category)){
        $error = 'Enter Valid Category';
    }else{
        $select = "select * from categories where `name` = '$category'";
        $result = mysqli_query($connection, $select);
        $num = mysqli_num_rows($result);

        if($num != 0){
            $error = 'This Category is aleardy exist';
        }
    }

    if(empty($error)){

        $query = "INSERT INTO `categories`(`name`) VALUES ('$category')";
        $run = mysqli_query($connection, $query);
        if($run){
            header('location:../../category.php');
        }

    }else{
        $_SESSION['error'] = $error;
        header('location:../../category.php');
    }

}else{
    header("location:../../category.php");
}