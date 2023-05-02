<?php
include_once('/dbconn.php');

if (isset($_POST['fget-pass'])) {
	$loginId = htmlspecialchars(strtolower($_POST['loginId']);

	if (!empty($login)) {
		try {
				$sql = "SELECT * FROM users WHERE email = :loginId OR phone = :loginId";
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':loginId', $loginId);
				$stmt->execute()
				$result = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($stmt->execute() > 0) {
					if ($result['email'] === $loginId || $result['phone'] == $loginId) {
						echo "please check ur email";
					}else {
						echo "$loginId Not found";
					}

				}
			}
		}catch (PDOExecption $e) {
			echo $e->getmessage();
	}


}