<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';
include_once '../dao/provider.php';

$errors = "";

$emails = $_SESSION['email'];
$password = $_SESSION['pwd'];
$type = $_GET['user'];
$cookie_selected= $_GET['savecookie'];
$_SESSION['cookie_selected']= $_GET['savecookie'];
$_SESSION['type'] = $_GET['user'];

$status = check_user_status($emails,$password);
 $user_profile = $status['recordstatus'];
 // this means user exists
if($type == 'techuser'){    
        $consumer_subscription = verify_consumer_subscription($emails);
        $_SESSION['consumer'] = $consumer_subscription;
        echo("subscribed");
 }else if($type == 'provider'){          
        $temp = findByEmail($emails);
        $_SESSION['provider'] = $temp;
        $sp_home_page = get_provider_home_page($_SESSION['provider']['serviceprovider_id']);
        echo $sp_home_page;
 }else{
        $errors.="<li >Invalid username/password </li>";
 }
 echo $errors;

?>