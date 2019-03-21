<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
                $contact_name = $_POST['contact_name'];
    $contact_subject = $_POST['contact_subject'];
    $contact_email = $_POST['contact_email'];
    $contact_message = $_POST['contact_message'];

//    require './PHPMailer-master/PHPMailerAutoload.php';
    require './PHPMailerAutoload.php';

    $mail = new PHPMailer;

	$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = '';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'fruitkart@gmail.com';                 // SMTP username
        $mail->Password = 'nehafruitagency';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        //$mail->SMTPDebug  = 0;

        $mail->setFrom('xxxxxxxxx@gmail.com', 'XXXXXXX');
        $mail->addAddress('xxxxxxx@xxxxx.com');     // Add a recipient
        $mail->addReplyTo('xxxxxxx@gmail.com', 'XXXXXXX');
        $mail->addCC('XXXXXXX@XXXX.com');
        //$mail->addBCC('bcc@example.com');
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Inquiry Reply';
        $mail->Body = "<body>"
                . "<center>"
                . "<div style='border: 4px #ee6e73 solid;background-color: #ee6e73;' width='250px'>"
                . "<table style='border:2px white solid;'>"
                . "<tr>"
                . "<td style='background-color:white;'><center><h2>XXXXXXXXXXXXXX</h2></center></td>"
                . "</tr>"
                . "<tr>"
                . "<td><hr/></td>"
                . "</tr>"
                . "<tr>"
                . "<td><br/>"
                . "<br/>Forwaded New Inquiry Mail<br/>"
                . "Name : " . $contact_name . "<br/>"
                . "Email : " . $contact_email . "<br/>"
                . "Subject : " . $contact_subject . "<br/>"
                . "Message : " . $contact_message . "<br/>"
                . "</div>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td><hr/></td>"
                . "</tr>"
                . "</table>"
                . "</center></body>";

        if (!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        ?>
    </body>
</html>
