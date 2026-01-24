<?php


session_start();
unset($_SESSION["login"]);
header("location:../../pages/samples/login.php");