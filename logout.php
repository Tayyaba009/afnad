<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['FULLNAME']) ; 
unset($_SESSION['USERID']);

header('Location: login.php');


?>
