<?php

session_start();
if (empty($_SESSION)) {
    header('Location: ../login.html.php');
    exit();
}


//session variables
$my_user = $_SESSION['user']; //unique id
$my_name = $_SESSION['name']; //full name
$my_email = $_SESSION['email']; //User email
$my_occupation = $_SESSION['occupation'];
$my_state = $_SESSION['state'];
$my_lga = $_SESSION['lga'];
$my_phone = $_SESSION['phone'];
$my_language = $_SESSION['language'];
$my_track = $_SESSION['track'];
