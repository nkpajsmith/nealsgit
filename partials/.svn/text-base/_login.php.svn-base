<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';
include_once '../dao/provider.php';

$errors = "";

$emails = $_POST['email'];
$password = $_POST['pwd'];

$secure_pass = md5($password);

$_SESSION['email']=$emails;
$_SESSION['pwd'] = $secure_pass;

// check if the user is consumer or producer
$status = check_user_status($emails,$secure_pass);
// returning the rows for it
$rows = check_user_status_rows($emails,$secure_pass);

if(!is_valid_email($emails)) {
    $errors = "Email address is not valid!";
    echo $errors;
}else if(isset($_COOKIE['user_visit'])){
    $value = $_COOKIE['user_visit'];
    $val = strstr($value, '_', true);
    $val2 = substr(strstr($value, '_'),1);
    if($val == 'provider' && $val2 == $emails){
        $temp = findByEmail($emails);
        $_SESSION['provider'] = $temp;
        $sp_home_page = get_provider_home_page($_SESSION['provider']['serviceprovider_id']);
        echo $sp_home_page;
    }else if($val == 'consumer' && $val2 == $emails){
            $consumer_subscription = verify_consumer_subscription($emails);
            $_SESSION['consumer'] = $consumer_subscription;
            echo "subscribed";
    }else{
        if($rows > 1){
            echo "both";
        }else{
            $user_profile = $status['recordstatus'];
            $user_type = $status['usertype'];
            if($user_type == 'itconsumer') {
                if($user_profile != "initialentry") {
                    $consumer_subscription = verify_consumer_subscription($emails);
                    $_SESSION['consumer'] = $consumer_subscription;
                    echo "subscribed";
                }
            }else if($user_type == 'serviceprovider'){
                $temp = findByEmail($emails);
                $_SESSION['provider'] = $temp;
                echo "provider";
            }else{
                $errors.="<li >Invalid username/password </li>";
            }
        echo $errors;
    }
  }
}
?>