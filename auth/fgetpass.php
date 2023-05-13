<?php

require __DIR__ . '/dbconn.php';
require_once __DIR__ . '/../auth/func.php';
// require_once __DIR__ . '/../auth/function.php';


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
						/*
						// $code = $token;
						$recipient = $loginId;
						$message = 'Click here to <a href="reset.php/reset_id=$token"> reset your password </a>'
						*/
						// sendEmail($recipient, $message);

						echo "<br>$uid check ur mail...";
					}

				}

			}
		} catch (PDOException $e) {
			echo $e->getmessage();
		}
	}

}


