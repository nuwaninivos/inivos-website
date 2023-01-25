<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// print_r($_POST);die;
sendEmail($_POST);

function sendEmail($data)
{
  $mail = new PHPMailer(true);
  $result = [];

  $body="Name - ".$data['name'].'<br>';
  $body.="Email - ".$data['email'].'<br>'; 
  $body.="Message - ".$data['message'].'<br><br>';

  try {
    //Server settings
    // $mail->SMTPDebug = 2;                       // Enable verbose debug output  
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'nuwan.aluthgama@inivossl.com';                 // SMTP username
    $mail->Password = 'inivos121#';                           // SMTP password
    $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                              // TCP port to connect to

 

    //Recipients
    $mail->setFrom($data['email'], $data['email']);

    // Add a recipient
    $mail->addAddress('nuwan.aluthgama@inivossl.com'); 


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Inivos website: Contact request from - '.$data['name'];
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      $result['success'] = 0;
      $result['message'] = 'Your message not sent !';

      echo json_encode($result);exit();

    } else {
      $result['success'] = 1;
      $result['message'] = "<div><button class='close' data-bs-dismiss='alert'><img src='images/icon_close_alt.svg'></button><img src='images/check-circle.svg'><h6>Thank you for contact us!</h6><p>We will be contacting you soon</p><div>";

      echo json_encode($result);exit();
    }

  } catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }

}


?>
