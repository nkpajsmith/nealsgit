<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';

$errors = "";
$emails = $_GET['email'];
$password = $_GET['pwd'];

$secure_pass = md5($password);
$status = check_user_status($emails,$secure_pass);

if($status['usertype']== 'itconsumer') {
    $consumer_subscription = verify_consumer_subscription($emails);
    $_SESSION['consumer'] = $consumer_subscription;
    echo "OK1";
}else { // doesn't exists
    echo $errors.="<li >Invalid username/password </li>";
}?>