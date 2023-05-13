<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($recipient, $message)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                     //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                            //Enable SMTP authentication
        $mail->Username   = 'aim2myjunk@gmail.com';          //SMTP username
        $mail->Password   = 'ajobtsquddqfmsez';              //SMTP password
        $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
        $mail->Port       = 587;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('farm-assist@capstone.digi.com', 'Farm Assist');
        $mail->addAddress("$recipient");     //Add a recipient
        $mail->addReplyTo('aim2myjunk@gmail.com', 'No Reply');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Check email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();
}

// demo of the function sendEmail('Annon@example.com', 'dafeemma@yahoo.com', 'This is tring message that is really null');


