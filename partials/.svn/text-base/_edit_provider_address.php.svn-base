<?php session_start();
include '../dao/dbcon.php';
include '../dao/address.php';


$address_id=$_POST['address_idddd'];
$address_type = $_POST['address_types'];
$address_line1 = $_POST['address_line1'];
$address_line2 = $_POST['address_line2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip_code'];
$phone_ini = $_POST['phone_ini'];
$phone_mid = $_POST['phone_mid'];
$phone_last = $_POST['phone_last'];

$phone = $phone_ini.$phone_mid.$phone_last;

$errors="";
$state1=strlen($state);
$zipcode1=strlen($zipcode);

$phone1=strlen($phone);
$provider_id=$_SESSION['provider']['serviceprovider_id'];

$zip_options = array(
    'options' => array(
                      'min_range' => 5,
                      'max_range' => 5,
                      )
);

// checks
if($address_line1==NULL){
    $errors.="<li>Please fill the address line1.</li>";
}else if($city==NULL){
    $errors.="<li>Please enter a city.</li>";
}else if($state == NULL || $state1!=2){
    $errors.="<li>State should contain only 2 characters.</li>";
}else if($zipcode == NULL || $zipcode < 5){
    $errors.="<li>Zipcode should contain 5 digits.</li>";
}else if($phone == Null || $phone < 10){
    $errors.="<li>Phone should not be less than 10 characters.</li>";
}else { // if all is fine
    $query = "Update techmatcher.address set addresstype_id=$1,addressline1 =$2, addressline2 =$3,city= $4, state = $5, country = $6, zipcode = $7, phonenumber = $8  Where address_id= $9";
    pg_query_params($query, array($address_type,$address_line1,$address_line2,$city,$state,'USA',$zipcode,$phone,$address_id));
    echo "OK";
}
echo $errors;
?>