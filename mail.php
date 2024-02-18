<?php
    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

function sending($receiver, $subject, $body)
{

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Mailer = "smtp";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth   = true;
        $mail->Username = "ahmadsanikaura1996@gmail.com";
        $mail->Password = "dtbtdoakyhuibxto";
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom("ahmadsanikaura1996@gmail.com");
        $mail->addAddress($receiver);
        //$mail->WordWrap = 50;


        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exception) {
        return false;
    }
}
    
?>