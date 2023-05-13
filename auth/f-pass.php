<?php
$title = "Forget Password";
include_once __DIR__ . '/../inc/header.php';

// include_once __DIR__ . '/dbconn.php';

// if (isset($_POST['fget-pass'])) {
// 	$loginId = htmlspecialchars(trim($_POST['loginId']));
// 	$token = md5(rand());
                                                                                                                                                                                            
// 	if (empty($loginId)) {
// 		echo "Please enter your email";
// 	} elseif (!empty($loginId)) {
// 		try {
// 			$sql = "SELECT * FROM users WHERE email = :loginId OR phone = :loginId";
// 			$stmt = $pdo->prepare($sql);
// 			$stmt->bindValue(':loginId', $loginId);
// 			$stmt->execute();
// 			$result = $stmt->fetch(PDO::FETCH_ASSOC);

// 			if ($stmt->execute() > 0) {
// 				if (empty($result)) {
// 					echo "$loginId not found";
					
// 				} else {
// 					$uid = $result['uid'];

// 					$sql = "UPDATE users SET token = :token WHERE uid = :uid";
// 					$stmt = $pdo->prepare($sql);
// 					$stmt->bindValue(':token', $token);
// 					$stmt->bindValue(':uid', $uid);
// 					$stmt->execute();
					
// 					if ($stmt->execute()) {
// 						echo "Token created";
// 					}

// 				}

// 			}
// 		} catch (PDOException $e) {
// 			echo $e->getmessage();
// 		}
// 	}
// }


?>


<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title><?= $title ?></title>
	</head>
	<body>
		<form method="POST" action="./fgetpass.php">
			<h2> Recover password</h2>
			<div>
			<label for="loginId">Enter you email address</label>
			<input type="text" name="loginId" >
			</div>

			<button type="submit" name="fget-pass">Submit</button>

		</form>
	</body>
</html>

