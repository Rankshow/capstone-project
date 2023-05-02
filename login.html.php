<?php
include_once(__DIR__ . '/auth/login.php')


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" type="image/png" href="./image/FARMER ASSIST 22222 2.png"/>
  <link rel="stylesheet" href="login.css">
  <title>Login page</title>
</head>
<body>
  <div class="nav-logo">
    <img class="logo" src="./image/FARMER ASSIST 22222 2.png" alt="farmer-logo">
   </div>
  <!-- form container -->
  <div class="form-wrapper">
    <h1 class="account">Login to your account</h1>
    <h1 class="E-content">Email/Phone number</h1>


        <!-- style this div for displaying error message to the user from the backend.
        div staerts here -->
    <div>
      <div id="msg-status" class="">
        <?php
      if (isset($errMsg)) {
        foreach ($errMsg as $msg) {
            echo $msg;
          }
      }
      ?>
      </div>
    </div>
    <!-- End of div -->

    <div class="form-content">
    <form action="" method ="POST">
      <label for="email">Enter your email</label><sup>*</sup><br/>
      <input type="text" placeholder="Enter email" class="Email" value="<?= $loginId ?>" name="loginId" id="txt-loginId" ><br/>

      <label for="email">Password</label><sup>*</sup><br/>
      <input type="text" placeholder="Password" class="password" value="<?= $password ?>" name="password" id="txt-password" ><br/>
      <p><a href="forgetpword.html">Forget password or change phone number</a></p>
       <div class="button-wrapper">
      <button name="login" id="btn-login" class="acct-btn">Login</button>
    </div>
    </form>
      <button class="Reg-acct"><a href="register.html">Dont have  an account? Register Today</a></button>
  </div>
 </div>


 <!-- <script src="/js/jquery.js"></script>
 <script src="/js/main.js"></script> -->
</body>
</html>


