<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="./image/FARMER ASSIST 22222 2.png" />
	<link rel="stylesheet" href="../style.css">
	<!-- <link rel="stylesheet" href="../bootstrap/icons/font/bootstrap-icons.css" >
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
	<!-- Option 1: Include in HTML -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<title><?= $title ?></title>
</head>
<body>
	<header>
		<div class="nav-wrapper"></div>
		<div class="nav-logo">
			<img class="logo" src="../image/FARMER ASSIST 22222 2.png" alt="farmer-logo">
		</div>
		<div class="nav-wrapper"></div>
		<div class="nav-list">
        <ul class="nav-container">
			<li class="nav-list"><a href="../index.html">Home</a></li>
			<li class="nav-list"><a href="../about.html">About</a></li>
			<li class="nav-list"><a href="../product.html">Product</a></li>
        	<li class="nav-list"><a href="../contact.html">Contact us</a></li>

		<?php if (isset($_SESSION['user'])): ?>
			<li class="nav-list"><a href="../auth/logout.php"> Logout </a></li>
			<li class="nav-list"><a href="../info/profile.html.php"> My Profile </a></li>

		<?php else: ?>
			<li class="nav-list"><a href="../login.html">Login</a></li>
			<li class="nav-list"><a href="../register.html">Register</a></li>
		<?php endif; ?>
		</ul>
       </div>
      </nav>
		<div class="hamburger">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
		</div>
	</header>