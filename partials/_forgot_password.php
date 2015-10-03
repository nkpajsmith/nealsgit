<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';
include_once '../secureimage/securimage.php';

$errors1 = "";

$emails = $_POST['email'];
$_SESSION['email_forg'] = $emails;
$captcha_code = $_POST['captcha_code'];

// randon password genertaion
function generate_password() {
    $random_id_length = 8;
//generate a random id encrypt it and store it in $rnd_id
    $rnd_id = crypt(uniqid(rand(),1));
//to remove any slashes that might have come
    $rnd_id = strip_tags(stripslashes($rnd_id));
//Removing any . or / and reversing the string
    $rnd_id = str_replace(".","",$rnd_id);
    $rnd_id = strrev(str_replace("/","",$rnd_id));
//finally I take the first 10 characters from the $rnd_id
    $rnd_id = substr($rnd_id,0,$random_id_length);
    $_SESSION['new_pass'] = $rnd_id;
    return $rnd_id;
}


$securimage = new Securimage();
if ($securimage->check($captcha_code) == false) {
    // the code was incorrect
    // handle the error accordingly with your other error checking
    // or you can do something really basic like this
    $errors1.="<li>The code you entered was incorrect.</li>";
    echo $errors1;
}else {
    $status = check_user_status1($emails);
    $user_type = $status['usertype'];
    if($status){
        $str_pass = generate_password(); // gives password
        $secure_password= md5($str_pass);//secure password
        if($user_type == 'itconsumer') {
            $update_qry = pg_query_params("Update techmatcher.itconsumer set password = $1 where itconsumer_emailaddress = $2", array($secure_password,$emails));
            include_once '../emails/forgpass_email.php';
            echo 'OK';
        }else if($user_type == 'serviceprovider'){            
            $update_qry = pg_query_params("Update techmatcher.serviceprovider set companycode = $1 where contactemailaddress = $2", array($secure_password,$emails));
            include_once '../emails/forgpass_email.php';
            echo 'OK';
        }
    }else {
        $errors1.="<li>Email not found in our Database. Please enter a valid email address.</li>";
        echo $errors1;
    }
}
?>