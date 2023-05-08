<?php
// require "vendor/autoload.php";
include(__DIR__ . '/auth/dbconn.php');


if (isset($_POST['contact-us'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $occupation = htmlspecialchars($_POST['occupation']);

    if (empty($name)) {
        $errMsg['name'] = "Please input your name.";
    }
    if (empty($email)) {
        $errMsg['email'] = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg['email'] = "Please enter a valid email.";
    }
    if (empty($phone)) {
        $errMsg['phone'] = "Please enter your phone number.";
    }
    if (empty($subject)) {
        $errMsg['subject'] = "Please state the purpose/subject of your message";
    } elseif (strlen($subject) < 5) {
        $errMsg['subject'] = "Purpose/Subject of message must exceed 5 chaarcters";
    }
    if (empty($message)) {
        $errMsg['message'] = "Please enter the deatils of your message";
    } elseif (strlen($message) < 10) {
        $errMsg['message'] = "Message details must not be less than 10 words";
    } elseif (strlen($message) > 1000) {
        $errMsg['message'] = "Message contents cannot exceed 1000 words";
    }


    if (isset($errMsg)) {
        foreach ($errMsg as $msg) {
            echo $msg . "<br>";
        }
    } else {
        try {
            $sql = "INSERT INTO contact_us (name, email, phone, subject, message, occupation) VALUES (:name, :email, :phone, :subject, :message, :occupation)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':subject', $subject);
            $stmt->bindValue(':message', $message);
            $stmt->bindValue(':occupation', $occupation);

            $stmt->execute();
            if ($stmt->rowcount()) {
                echo "Thank you for your feedback. We'll give you a feedback shortly.";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

} else {
    header('location: index.html');
}











