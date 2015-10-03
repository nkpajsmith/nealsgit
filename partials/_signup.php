<?php session_start();
include_once("../dao/consumer.php");
include_once("../dao/login_logout_dao.php");

$message = "";
$page = "";
$emails = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['password'];
$substype = $_POST['usertype'];
$sec_pass = md5($pass);

$_SESSION['to_email'] = $_POST['email'];
$_SESSION['to_name'] = $_POST['name'];
$_SESSION['to_password'] = $_POST['password'];

if(isset($_SESSION['a'])) {
    $page = $_SESSION['a'];
}else {
    $page = "";
}
//user already exists w password check
$signedupuser=check_user_status($emails, $sec_pass);
  if ($signedupuser) {
  $temp = consumer_findByEmail($emails);
    $_SESSION['consumer']=$temp;
   echo "OK";}
 else {   
$user = consumer_findByEmail2($emails);
if(!is_valid_email($emails)) {
    $message = "Whoa check again, that email address is not valid!";
    echo $message;
}else if(!$user) {
    create_user_in_db();
    // login successfull
    $temp = consumer_findByEmail($emails);
    $_SESSION['consumer']=$temp;
    include_once '../emails/signup_email.php';//sending email
    echo "OK";
}else if($user && $user['recordstatus'] == 'initialentry') {// if user exists but subscription type is empty or null
    update_user_in_db($emails,$name,$sec_pass,$substype);
    $temp = consumer_findByEmail($emails);
    $_SESSION['consumer']=$temp;
    $profile= getProfileEntry($emails);
    $subsRec=getSubscriptionRecordView($temp['itconsumer_id']);
     $_SESSION['a'] = 0;
      include_once '../emails/signup_email.php';
     echo "OK";  
}else {
    $message = "Oops, that email already exists!";
    echo $message;
}
} //end of user already exists w password check
?>