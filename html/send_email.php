<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Jika pakai Composer
// require 'PHPMailer/src/PHPMailer.php'; // Jika pakai file manual
// require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lochuansen@gmail.com'; // Ganti dengan email Gmail kamu
    $mail->Password   = 'fnza gzic shnr mxzl'; // Ganti dengan App Password (bukan password biasa)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Ambil data dari form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Konfigurasi email
    $mail->setFrom($email, $fname . ' ' . $lname);
    $mail->addAddress('your_email@gmail.com', 'Your Name'); // Ganti dengan email tujuan
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = "Name: $fname $lname\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

    // Kirim email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
