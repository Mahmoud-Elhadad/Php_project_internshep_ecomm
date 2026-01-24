<?php

  session_start();
 include "styles/nav.php";
 include "styles/sidebar.php";
 
 
 if(! isset($_GET['product'])){
    include 'views/products/view.php';
 }elseif($_GET['product'] == 'add'){
    include 'views/products/insert.php';
 }elseif($_GET['product'] == 'update'){
    include 'views/products/edit.php';
 }
 
 include "styles/footer.php";



?>