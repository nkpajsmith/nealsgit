<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';
include_once '../dao/provider.php';
include_once "../dao/consumer.php";

$errors = "";

$_SESSION['zip']= $_POST['keyword_hidden'];
$zipcode = $_SESSION['zip'];
$emails = $_POST['email']; // email
$_SESSION['email'] = $emails;

if(isset($_POST['pwd'])) {
    $password = $_POST['pwd']; // password
    $sec_pass = md5($password);
}else {
    $password = "";
}

if($password != '') {
    $status = check_user_status($emails, $sec_pass);
}else {
    $status = check_user_status1($emails);
}
$temp2 = consumer_findByEmail2($emails);
if($status) {
    $user_profile = $status['recordstatus'];
    //$type = get_user_type($emails,$password);
    $user_type = $status['usertype'];
    $consumer_email = $status['emailaddress'];
    $consumer_password = $status['password'];
    if(isset($consumer_email) && $user_profile = 'initialentry' && !isset($consumer_password) && $consumer_password == "") {
        $_SESSION['consumer'] = $temp2;
        echo "search";
    }else if(isset($consumer_email) && isset($consumer_password) && $consumer_password!= "") {
        $consumer_subscription = verify_consumer_subscription($emails);
        $_SESSION['consumer'] = $consumer_subscription;
        if(isset($zipcode) && $zipcode !="") {
            echo "search";
        }else {
            echo "home";
        }
    }
}else { // new user
    if(!isset($temp2['itconsumer_emailaddress'])) {
        create_anonymous_user_in_db2($emails);
        $temp3=consumer_findByEmail2($emails);
        $_SESSION['consumer'] = $temp3; // for first time seeting temp 3 in session
    }else {
        $_SESSION['consumer'] = $temp2; // setting temp2 consumer in session
    }
    if(isset($zipcode) && $zipcode !="") {
        echo "search";
    }
}
?>