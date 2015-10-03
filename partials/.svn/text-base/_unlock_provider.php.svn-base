<?php session_start();
include_once "../dao/dbcon.php";
include_once "../dao/provider.php";

$errors = "";
$sp_id= "";
$a1= $_POST["a_code1"];
$a2= $_POST["a_code2"];
$a3= $_POST["a_code3"];
$a4= $_POST["a_code4"];
$a5= $_POST["a_code5"];
$a6= $_POST["a_code6"];
$a7= $_POST["a_code7"];
$a8= $_POST["a_code8"];
$a9= $_POST["a_code9"];
$a10= $_POST["a_code10"];

$activation_code_alpha = $a1.$a2.$a3.$a4.$a5; // first 5 as alpha
$activation_code_numeric = $a6.$a7.$a8.$a9.$a10; // next 5 numeric

$activation_code = $activation_code_alpha."-".$activation_code_numeric;

$username = $_POST["c_username"];
$password = $_POST["c_password"];
$v_password = $_POST["v_password"];


if(!eregi('[A-Za-z]{5}',$activation_code_alpha)){
    echo $errors."invalid characters entered. You can only enter alpha characters in first 5 fields";
}else if(!eregi('[0-9]{5}',$activation_code_numeric)){
    echo $errors."invalid values entered. You can only enter numeric characters in last 5 fields";
}else if(empty ($username)){
    echo $errors."email can not be empty";
}else if(empty($password)){
    echo $errors."password can not be empty";
}else if($password != $v_password){
    echo $errors."your password and verified password are not same";
}else{
    $qry1= pg_query_params("select serviceprovider_id from techmatcher.serviceprovider where record_unlock_cd =upper($1)", array($activation_code));
    $result = pg_fetch_assoc($qry1);
    $sp_id = $result["serviceprovider_id"];
    if($result){
      $secure_password = md5($password);
      $qry="Update techmatcher.serviceprovider set contactemailaddress=$1,companycode=$2,
        record_locked=$3,activation_date=now() Where serviceprovider_id=$4";
        $result = pg_query_params($qry, array($username,$secure_password,"FALSE",$sp_id));
        $status = findByEmail($username);
        if($status){
            $_SESSION['provider'] = $status;
            echo "OK";
        }else{
            echo $errors."user is not found with the given email address";
        }      
    }else{
      echo $errors."Sorry, we couldn't find that code.  Please check the number and try again.";
    }
}
?>