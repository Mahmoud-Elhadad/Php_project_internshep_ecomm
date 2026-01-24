<?php



 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    session_start();
    require "../connection.php";

    extract($_POST);
    $errors = [];

    if( empty($name)){
        $errors['name'] = "enter product name";
    }elseif(strlen($name) < 3){
        $errors['name'] = "enter valid name";
    }elseif(is_numeric($name)){
        $errors['name'] = "enter valid name";
    }




    $select = "select * from categories";
    $result = mysqli_query($connection, $select);
    $categories = mysqli_fetch_all($result , MYSQLI_ASSOC);

    foreach ($categories as $key => $value) {
        $product_cat[] = $value['name'];
    }

    if(! in_array($cat, $product_cat)){
        $errors['cat'] = "enter valid category";
    }

    if( empty($price)){
        $errors['price'] = "enter product price";
    }elseif($price <= 0){
        $errors['price'] = "enter valid price";
    }elseif(!is_numeric($price)){
        $errors['price'] = "enter valid price";
    }
    
    if( empty($sale)){
        $errors['sale'] = "enter product sale";
    }elseif($sale < 0 || $sale >= 100){
        $errors['sale'] = "enter valid sale";
    }elseif(!is_numeric($sale)){
        $errors['sale'] = "enter valid sale";
    }

    if( empty($count)){
        $errors['count'] = "enter product count";
    }elseif(!is_numeric($count)){
        $errors['count'] = "enter valid count";
    }elseif($count < 0){
        $errors['count'] = "enter valid count";
    }

    

    foreach($_FILES["img"]["error"] as $key => $value){

        if($value == 0){
           
            $img_name = $_FILES['img']['name'][$key];
            $tmp_name = $_FILES['img']['tmp_name'][$key];
            $extension = pathinfo( $img_name, PATHINFO_EXTENSION );
            $ext = ['png' , 'jpg' , 'jpeg' , 'webp' , 'avif'];

            if( !in_array( $extension, $ext) ){
                $errors['img'] = 'upload valid image';
            }else{
                $new_name = md5(uniqid()) . '.'. $extension;
                move_uploaded_file( $tmp_name, "../../images/products/$new_name");

                $uploaded_images [] = $new_name;
            }
           
            
        }else{
            $errors['img'] = 'Pleaze upload image';
        }
    }
    $all_images = json_encode(@$uploaded_images);



    if( empty($errors) ){

        

        $query = "INSERT INTO `product`(`name`, `price`, `count`, `sale`, `category` , `images`) 
        VALUES 
        ('$name','$price','$count','$sale','$cat' , '$all_images')";

        $run = mysqli_query($connection, $query);

        if($run){
            
            header("location:../../product.php");
        }

    }else{
        $_SESSION['errors'] = $errors;
        header('location:../../product.php?product=add');
    }

    


 }else{
    header('location:../../product.php'); 
 }
 

?>