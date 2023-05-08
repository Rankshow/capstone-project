<?php
$title = "Forget Password";
include_once('/dbconn.php');

if (isset($_POST['fget-pass'])) {
	$loginId = htmlspecialchars(strtolower($_POST['loginId']));

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
				if ($result['email'] == $loginId || $result['phone'] == $loginId) {
					echo "please check ur email";
				} else {
					echo "$loginId Not found";
				}

			}
		} catch (PDOException $e) {
			echo $e->getmessage();
		}
	}
}

var_dump($_POST);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title><?= $title ?></title>
	</head>
	<body>
		<form method="POST" action="">
			<h2> Recover password</h2>
			<div>
			<label for="loginId">Enter you email address</label>
			<input type="text" name="loginId" >
			</div>

			<button type="submit" name="fget-pass">Submit</button>

		</form>
	</body>
</html>