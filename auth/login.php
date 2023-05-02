<?php
include_once('dbconn.php');

if (isset($_POST['login'])) {

    $loginId = htmlspecialchars(strtolower($_POST['loginId']));
    $password = htmlspecialchars($_POST['password']);

    if (empty($loginId)) {
        $errMsg['login'] = "Input your email.";
    } elseif (empty($password)) {
        $errMsg['login'] = "Please enter your password";
    } else {
        try {
            $sql = "SELECT * FROM users WHERE email = :loginId OR phone = :loginId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':loginId', $loginId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $result['password'])) {
                    session_start();

                    $_SESSION['user'] = $result['uid'];
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['occupation'] = $result['occupation'];
                    $_SESSION['state'] = $result['state'];
                    $_SESSION['lga'] = $result['lga'];
                    $_SESSION['phone'] = $result['phone'];
                    $_SESSION['language'] = $result['language'];

                    header('location: profile.html.php');
                } else {
                    $errMsg['login'] = "Invalid login details.";
                }
            } else {
                $errMsg['login'] = "Invalid login details.";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}






