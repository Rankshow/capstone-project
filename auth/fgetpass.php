<?php

require __DIR__ . '/dbconn.php';
// require_once __DIR__ . '/../auth/func.php';
require_once __DIR__ . '/../auth/function.php';


if (isset($_POST['fget-pass'])) {

    $loginId = htmlspecialchars(trim($_POST['loginId']));
	$token = md5(rand());
                                                                                                                                                                                            
	if (empty($loginId)) {
		echo "Please enter your email";
	} elseif (!empty($loginId)) {
		try {
			$sql = "SELECT * FROM users WHERE email = :loginId OR phone = :loginId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':loginId', $loginId);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($stmt->execute() > 0) {
				if (empty($result)) {
					echo "$loginId not found";
					
				} else {
					$uid = $result['uid'];
					$email = $result['email'];

					$sql = "INSERT INTO reset_pass  (uid, email, token) VALUES (:uid, :email, :token)";
					$stmt = $pdo->prepare($sql);
					$stmt->bindValue(':uid', $uid);
					$stmt->bindValue(':email', $email);
					$stmt->bindValue(':token', $token);
					$stmt->execute();
					
					if ($stmt->execute()) {
						
						$code = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/fgetpass.php?token=$token";
						$recipient = $loginId;
						$message = "Click here to <a href='$code'> reset your password </a>";
						sendEmail($recipient, $message);

					}

				}

			}
		} catch (PDOException $e) {
			echo $e->getmessage();
		}
	}

} elseif (isset($_GET['token'])) { //Retrieve token and validity check
	$token = htmlspecialchars($_GET['token']);

	if (empty($token)) {
		echo "Invalid token";
	} else {
			try {
				$sql = "SELECT * FROM reset_pass WHERE token = :token";
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':token', $token);
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);

				if (empty($result)) {
					echo "Invalid token";
				} else {
					session_start();
					$_SESSION['reset_uid'] = $result['uid'];

					
					echo "<a href='../updatePass.php'>CLick to continue</a>";
				}
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
	}
} elseif (isset($_POST['updatePass'])) { //Collect new password from user
	session_start();
	$password = htmlspecialchars($_POST['password']);
	$password2 = htmlspecialchars($_POST['password_verify']);
	
// echo $reset_uid;
	var_dump($_SESSION);
	if (empty($password)) {
		echo 'Please input your new password';
	} elseif (strlen($password) < 3) {
		echo "Password cannot be less than 4 characters";
	} elseif (empty($password2)) {
		echo "Please verify your password";
	} elseif ($password2 !== $password) {
		echo "Passwords do not match";
	} else {
		try {
			$uidReset = $_SESSION['reset_uid'];

			$hashPass = password_hash($password, PASSWORD_BCRYPT);

			$sql = "UPDATE users GET password = :password WHERE uid = :uid";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':password', $hashPass);
			$stmt->bindValue(':uid', $uidReset);
			
			$stmt->execute();
			if ($stmt->execute()) {
				echo "Password updated succesfully. YOu can login";
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

}
