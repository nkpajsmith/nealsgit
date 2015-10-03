<?php session_start();
$_SESSION['a'] = $_GET['value'];
echo 'a';
?>