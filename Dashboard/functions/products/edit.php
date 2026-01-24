<?php



 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_GET['id'])){
        $id = $_GET['id'];

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

    if( empty($cat)){
        $errors['cat'] = "enter product category";
    }elseif(strlen($cat) < 3){
        $errors['cat'] = "enter valid category";
    }elseif(is_numeric($cat)){
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

    $new_image_uploaded = false;

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
                    $new_image_uploaded = true;
                } 
            }
        }

        $all_images = json_encode($uploaded_images);
    



    if( empty($errors) ){

        if($new_image_uploaded){

            $select = "select * from product";
            $result = mysqli_query($connection, $select);
            $pro_info = mysqli_fetch_all($result , MYSQLI_ASSOC);
            $pro_images = $pro_info["images"];
            $pro_images = json_decode($pro_images);
            foreach ($pro_images as $key => $value) {
                unlink("../../images/products/$value");
            }
 
            
            $query = "UPDATE `product` SET `name`='$name',`price`='$price',`count`='$count',`sale`='$sale',`category`='$cat' , `images` = '$all_images' WHERE `id` = $id";
        }else{
            $query = "UPDATE `product` SET `name`='$name',`price`='$price',`count`='$count',`sale`='$sale',`category`='$cat' WHERE `id` = $id";
        }


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

 }
?>