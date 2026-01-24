<?php


if(isset($_GET['id'])){
if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_GET['id'];
          require '../connection.php';

    extract($_POST);
    $name = ucwords(strtolower($name));
    $errors = [];

    if( empty($name)){
        $errors['name'] = "enter your name";
    }elseif(strlen($name) < 3){
        $errors['name'] = "enter valid name";
    }elseif(is_numeric($name)){
        $errors['name'] = "enter valid name";
    }

    if( empty($email)){
        $errors['email'] = "enter your email";
    }elseif(strlen($email) < 7){
        $errors['email'] = "enter valid email";
    }elseif(! filter_var($email , FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "enter valid email";
    }

    
    $phones = ['0' , '1' , '2' , '5'];
    if( empty($phone)){
        $errors['phone'] = "enter your phone";
    }elseif(!is_numeric($phone)){
        $errors['phone'] = "enter valid phone";
    }elseif(strlen($phone) != 11){
        $errors['phone'] = "enter valid phone";
    }elseif($phone[0] != 0 || $phone[1] != 1 || ! in_array($phone['2'] , $phones)){
        $errors['phone'] = "enter valid phone";
    }
    
    $roles = ['user' , 'admin'];
    if(! in_array($role, $roles)){
        $errors['role'] = "select valid role";
    }

    $gen = ['male' , 'female'];
    if(! in_array($gender, $gen)){
        $errors['gender'] = "select valid gender";
    }


        $select = "select * from users where id = $id";
        $result = mysqli_query($connection, $select);

        $cutomer = mysqli_fetch_assoc($result);
        $image = $cutomer['img'];


    if($_FILES['img']['error'] == 0){
        $img_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $extension = pathinfo($img_name, PATHINFO_EXTENSION);

        $ext = ['png' , 'jpg' , 'jpeg'];
         if($image != 'pic-1.png' && $image != 'pic-2.png'){
            unlink("../../images/$image");
        }
        if(! in_array($extension, $ext)){
            $errors['img'] = 'enter valid image';
        }else{
            $new_name = md5(uniqid()) . '.'. $extension;
        }
    }else{
        $new_name = $image;
    }



    if(empty($errors)){

        if($new_name != 'pic-1.png' || $new_name != 'pic-2.png'){
            move_uploaded_file($tmp_name , "../../images/$new_name");
        }

       

        $query = "UPDATE `users` SET `name`='$name',`email`='$email' , `gender`='$gender',`role`='$role',`img`='$new_name',`phone`='$phone' WHERE `id` = $id";
        $run = mysqli_query($connection , $query);
        if($run){

            header("location:../../user.php");
        }              
    }else{
        session_start();
        $_SESSION['errors'] = $errors;

        header("location:../../user.php?user=update&id=$id");
    }



}else{
    header("location:../../user.php?user=update&id=$id");
}
}




?>