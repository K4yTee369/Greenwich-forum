<?php
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';
require 'includes/DatabaseConnection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if(isset($_POST['submitContact'])) {
    $title = "Contact us";
    $username = $_POST['username'];
    $module_name = $_POST['module_name'];
    $message = $_POST['message'];

    if (empty($username) && empty($module_name) && empty($message)) {
        $output = "All fields are required.";
        
    }

   try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pkgaming369@gmail.com';
        $mail->Password = 'hlkc cupr jpkb jblz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('pkgaming369@gmail.com', $username); 
        $mail->addAddress('pkgaming369@gmail.com');

        $mail->Subject = $module_name; 
        $mail->Body = $message;

        $mail->send();
        $output = 'Email sent successfully!';
    } catch (Exception $e) {
        $output = "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
}else {
    try {
        $userSql = 'SELECT id, username FROM user';
        $userStmt = $pdo->query($userSql);
        $users = $userStmt->fetchAll();

        $moduleSql = 'SELECT id, module_name FROM module';
        $moduleStmt = $pdo->query($moduleSql);
        $modules = $moduleStmt->fetchAll();

        $title = "Contact us";
        ob_start();
        include 'templates/contact.html.php';
        $output = ob_get_clean();
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    }
}

include 'templates/layout.html.php';