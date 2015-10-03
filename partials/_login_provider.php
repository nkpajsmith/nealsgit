<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';
include_once '../dao/provider.php';

$errors = "";
$emails = $_GET['email'];
$password = $_GET['pwd'];

$secure_pass = md5($password);
$status = check_user_status($emails,$secure_pass);

if($status['usertype']== 'serviceprovider') {
  $_SESSION['provider']['serviceprovider_id'] = $status['user_id'];
  $temp = findByEmail($emails);
        $_SESSION['provider'] = $temp;
   echo 'provider_home.php';
}else{ // doesn't exists
  echo $errors.="<li >Invalid username/password </li>";
}
?>