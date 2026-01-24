<?php

  session_start();
 include "styles/nav.php";
 include "styles/sidebar.php";
 
 
 if(! isset($_GET['user'])){
    include 'views/users/view.php';
 }elseif($_GET['user'] == 'add'){
    include 'views/users/insert.php';
 }elseif($_GET['user'] == 'update'){
    include 'views/users/edit.php';
 }
 
 include "styles/footer.php";



?>