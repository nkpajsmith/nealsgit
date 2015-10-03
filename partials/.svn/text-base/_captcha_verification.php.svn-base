<?php session_start();
include_once '../dao/dbcon.php';
include_once '../secureimage/securimage.php';

$code = $_GET['code'];

$errors ="";
$securimage = new Securimage();
if ($securimage->check($code) == false) {
    // the code was incorrect
    // handle the error accordingly with your other error checking
    // or you can do something really basic like this
    $errors.="<li>The code you entered was incorrect.</li>";
    echo $errors;
    //die('The code you entered was incorrect.  Go back and try again.');
}else{
    echo "OK";
}
?>