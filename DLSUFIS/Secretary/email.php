<?php
require '/Applications/XAMPP/xamppfiles/htdocs/dashio/DLSUFIS/Faculty/phpmailer/PHPMailerAutoload.php';
require '/Applications/XAMPP/xamppfiles/htdocs/dashio/DLSUFIS/Faculty/credentials.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username =  EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'BAYAG');
$mail->addAddress('dlsuccsams@gmail.com');     // Add a recipient

$mail->addReplyTo(EMAIL);

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
