<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'user@mail.ru';
$mail->Password = 'passwo';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('qwerty@qw.ru', 'Sender');
$mail->addAddress('79208562003@mail.ru', 'Oleg');

for ($i = 1; $i < 3; $i++) {
    $mail->Subject = 'Test email ' . random_int(0, 15);
    $mail->Body = 'Email from php-mailer. Random: ' . generateRandomString() . '. New text: ' . generateRandomString();

    if (!$mail->send()) {
        echo 'Message could not be sent';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent<br>';
    }

}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
