<?php session_start();

$_SESSION['consumer'] = "";
unset($_SESSION['consumer']);
$_SESSION['provider'] = "";
unset($_SESSION['provider']);
$_SESSION['message'] = "";
unset($_SESSION['message']);
session_destroy();
?>