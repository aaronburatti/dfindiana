<?php
session_destroy();
session_start();
 
use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';

if(!isset($_POST) || empty($_POST)){
    $_SESSION['msg'] = 'Please fill out the contact form';
    header('Location: ../index.php#contact');
}

if (array_key_exists('name', $_POST) && empty($_POST['name'])){
    $_SESSION['msg'] = 'Please fill out the entire form';
    header('Location: ../index.php#contact');
}

if (array_key_exists('email', $_POST) && empty($_POST['email'])){
    $_SESSION['msg'] = 'Please fill out the entire form';
    header('Location: ../index.php#contact');
}

if (array_key_exists('message', $_POST) && empty($_POST['message'])){
    $_SESSION['msg'] = 'Please fill out the entire form';
    header('Location: ../index.php#contact');
}


if (array_key_exists('email', $_POST) && PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
} else{
    $_SESSION['msg'] = 'Please provide a valid email address';
    header('Location: ../index.php#contact');
}


    
    $name           = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email          = filter_var(trim($_POST['email']));
    $subject        = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $message        = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    $mail = new PHPMailer();
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->setFrom('contact_form@dfindiana.com', (empty($name) ? 'Contact form' : $name));
    $mail->addAddress('okcupidoop@gmail.com');
    $mail->addReplyTo($email, $name);
    $mail->Subject = 'DFIndiana Contact form: ' . $subject;
    $mail->Body = "Contact form submission\n\n" . $message;

    
    if (!$mail->send()) {
        $_SESSION['msg'] = 'Apologies, something went wrong. Please try again later';
    } else {
        $_SESSION['msg'] = 'Message sent! Thanks for reaching out.';
    }
    
   header('Location: ../index.php#contact');

?>