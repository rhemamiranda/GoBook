<?php 

require_once 'vendor/autoload.php';
require_once 'conn.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername('gobook.scrum@gmail.com')
  ->setPassword('scrumproject')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($Email, $token){

    global $mailer;
    $body = "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <title>Verify Email</title>
    </head>
    <body>
        <div class='wrapper'>
            <td>Thank you for signing up on ouw website. <br> Your one time pin is $token</td>
        </div>
        
    </body>
    </html>>";

    // Create a message
    $message = (new Swift_Message('Verify your email'))
    ->setFrom(['gobook.scrum@gmail.com'])
    ->setTo($Email)
    ->setBody($body,'text/html');
    ;
 
    // Send the message
    $result = $mailer->send($message);
}
?>