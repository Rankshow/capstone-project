<?php

session_start();
if (empty($_SESSION)) {
    header('Location: ../login.html');
    exit();
}


//session variables
$my_user = $_SESSION['user'];
$my_name = $_SESSION['name'];
$my_email = $_SESSION['email'];
$my_occupation = $_SESSION['occupation'];
$my_state = $_SESSION['state'];
$my_lga = $_SESSION['lga'];
$my_phone = $_SESSION['phone'];
$my_language = $_SESSION['language'];