<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $mailExist = $con->prepare("SELECT * FROM utilisateur where email=?");
    $mailExist->execute([$mail]);
    $user = $mailExist->fetch();
    if (!$user) {
        $_SESSION['erreur9'] = 1;
        $_SESSION['success3'] = 0;
        header("Refresh:0; url= ../views/resetMDP.php");
    } else {
        $_SESSION['erreur9'] = 0;
        $_SESSION['success3'] = 1;
        //Generate a random string.
        $token = openssl_random_pseudo_bytes(16);
        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        $req = $con->query("UPDATE utilisateur SET token='$token' WHERE email='".$_POST['mail']."'");
        $mail_body = "
        <p>Bonjour " . $prenom . ",</p>
        <p>'Bonjour, vous avez oubliez votre mot de passe, cliquer sur le lien présent pour le réinitialiser : http://localhost:3000/views/resetMDP.php?token=$token''</p>
        <p>Cordialement</p>
        ";
        $mail2 = new PHPMailer();
        $mail2->IsSMTP();        //Sets Mailer to send message using SMTP
        $mail2->Host = 'smtp.laposte.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail2->Port = '465';        //Sets the default SMTP server port
        $mail2->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail2->Username = ' nom smtp';     //Sets SMTP username
        $mail2->Password = 'password smtp';     //Sets SMTP password
        $mail2->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail2->From = 'adresse mail';   //Sets the From email address for the message
        $mail2->FromName = 'FORUM UNIQUE';     //Sets the From name of the message
        $mail2->AddAddress($mail);  //Adds a "To" address   
        $mail2->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail2->IsHTML(true);       //Sets message type to HTML    
        $mail2->Subject = 'Reinitialisation mot de passe';   //Sets the Subject of the message
        $mail2->Body = $mail_body;       //An HTML or plain text message body
        if ($mail2->Send())        //Send an Email. Return true on success or false on error
        {
            header("Refresh:0; url= ../views/oubliMDP.php");
            exit;
        }
    }
}
