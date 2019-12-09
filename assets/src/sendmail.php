<?php
    error_reporting(E_ALL);

    //PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'assets/PHPMailer-6.0.5/src/PHPMailer.php';
    require 'assets/PHPMailer-6.0.5/src/SMTP.php';
    require 'assets/PHPMailer-6.0.5/src/Exception.php';


    //receive POST data
    $firstname = 'Randy';
    $lastname = 'Venturina';
    $contactnumber = '543-5465';
    $email = 'annaroseventurina@gmail.com';
    $requestmessage = 'Beast cattle for night tree very there you\'ll beast gathered subdue he You\'ll is that. Set void isn\'t seas give multiply upon. Fruitful fruitful creeping. Was don\'t their to. Beast and fowl fowl forth unto.';

    $companyemail = "customer.service@codeninja.ph";
    $toClientName = $firstname . " " . $lastname;
    $htmlmessage = "<b>Name:</b> " . $firstname . " " . $lastname . "<br/>";
    $htmlmessage .= "<b>Contact Number:</b> " . $contactnumber . "<br/>";
    $htmlmessage .= "<b>Email:</b> " . $email . "<br/>";
    $htmlmessage .= "<b>Mesage:</b> " . "<br/>" . $requestmessage;

    $message = "<b>Name:</b> " . $firstname . " " . $lastname . "\r\n";
    $message .= "<b>Contact Number:</b> " . $contactnumber . "\r\n";
    $message .= "<b>Email:</b> " . $email . "\r\n";
    $message .= "<b>Mesage:</b> " . "\r\n" . $requestmessage;

    //SENDING MAIL USING PHPMAILER
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Host = 'server53.web-hosting.com';             // Specify main and backup SMTP servers
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->Username = $companyemail;                         // SMTP username
        $mail->Password = 'Pass@Word1';                       // SMTP password
        // $mail->SMTPOptions = array(
        //     'ssl' => array(
        //         'verify_peer' => false,
        //         'verify_peer_name' => false,
        //         'allow_self_signed' => true
        //     )
        // );                                                   
    
        //Recipients
        $mail->setFrom($email, $toClientName);
        $mail->addAddress($companyemail, 'Codeninja Tech');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC($email, $companyemail);
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'RES-ICO: Request Token from ' . $toClientName;
        $mail->Body    = $htmlmessage;
        $mail->AltBody = wordwrap($message,70);
    
        $mail->send();
        echo 'Message has been sent';

     } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }


?>