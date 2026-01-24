<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

    if( empty($password)){
        $errors['password'] = "enter your password";
    }elseif(strlen($password) < 6){
        $errors['password'] = "enter valid password";
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



    if($_FILES['img']['error'] == 0){
        $img_name = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $extension = pathinfo($img_name, PATHINFO_EXTENSION);

        $ext = ['png' , 'jpg' , 'jpeg'];
        if(! in_array($extension, $ext)){
            $errors['img'] = 'enter valid image';
        }else{
            $new_name = md5(uniqid()) . '.'. $extension;
        }
    }else{
        
        $new_name = ($gender == 'male' ? 'pic-1.png' : 'pic-2.png');   
    }



    if(empty($errors)){

        if($new_name != 'pic-1.png' || $new_name != 'pic-2.png'){
            move_uploaded_file($tmp_name , "../../images/$new_name");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `users`(`name`, `email`, `password`, `gender`, `role`, `img`, `phone`) 
                VALUES 
                      ('$name','$email','$password','$gender','$role','$new_name','$phone')";
        $run = mysqli_query($connection , $query);
        if($run){
            header("location:../../user.php");
        }              
    }else{
        session_start();
        $_SESSION['errors'] = $errors;

        header('location:../../user.php?user=add');
    }



}else{
    header("location:../../user.php?user=add");
}



?>