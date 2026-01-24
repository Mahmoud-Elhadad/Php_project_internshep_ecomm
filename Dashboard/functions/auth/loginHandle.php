<?php
require "../connection.php";
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    extract($_POST);
    $error = '';

    $query = "select * from users where `email` = '$email'";
    $run = mysqli_query($connection, $query);
    $num = mysqli_num_rows($run);

    if($num == 1){
        $user = mysqli_fetch_assoc($run);
        $password_hash = $user["password"];
        $role = $user["role"];

        if(password_verify($password , $password_hash)){
            if($role == "admin"){
                $_SESSION['login'] = $user;
                header("location:../../index.php");
            }else{
                $error = "Enter valid email or password";
            }

        }else{
            $error = "Enter valid email or password";
        }


    }else{
        $error = "Email is not exist";
    }
    if(!empty($error)){
        $_SESSION['error'] = $error;
        header('location:../../pages/samples/login.php');
    }

}else{

    header('location:../../pages/samples/login.php');
}