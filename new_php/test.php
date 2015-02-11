<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "p3plcpnl0970.prod.phx3.secureserver.net";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "customer-support@china-bxc.com";
$mail->Password = "1qaz2wsX";
$mail->SetFrom("customer-support@china-bxc.com");
$mail->Subject = "Test";
$mail->Body = "hello!,hleeo!";
$mail->AddAddress("quzhou@umail.iu.edu");
 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
?>