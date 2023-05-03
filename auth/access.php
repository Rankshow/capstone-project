<?php

session_start();
if (empty($_SESSION)) {
    header('Location: ../login.html');
    exit();
}


//session variables
$user = $_SESSION['user'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$occupation = $_SESSION['occupation'];
$state = $_SESSION['state'];
$lga = $_SESSION['lga'];
$phone = $_SESSION['phone'];
$language = $_SESSION['language'];