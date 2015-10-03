<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';


print_r( $_POST);
$errors = "";
$emails = $_POST['email'];
$password = $_POST['pwd'];


$secure_pass = md5($password);
$status = check_user_status($emails,$secure_pass);


 switch ($_POST['submitbtn']) {
             case "LOGIN" :
					if($status['usertype']== 'itconsumer') {
    				$consumer_subscription = verify_consumer_subscription($emails);
    				$_SESSION['consumer'] = $consumer_subscription;
    				echo "OK1";
					}else { // doesn't exists
   				 	echo $errors.="<li >Invalid username/password </li>";
					}
			case "Forgot Password"	:	
					echo $errors.="<li >Try to remember it </li>";
				}?>