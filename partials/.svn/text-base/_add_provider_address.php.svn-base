<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/address.php';

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

if((!is_numeric($zipcode))){
   $errors.="<li > ZipCode should be numeric</li>";
}else if((!is_numeric($phone))){
   $errors.="<li > Phone # should be numeric</li>";
}else if($address_line1==NULL || $city==NULL || $state == NULL || $zipcode == NULL || $phone == Null){
    $errors.="<li >Please fill all boxes.</li>";
}else if($state1<2){
    $errors.="<li >State should not be less than 2 characters.</li>";
}else if($phone1<10){
    $errors.="<li >Phone should not be less than 10 characters long.</li>";
}else {
    $address_sq= pg_query_params("select nextval('techmatcher.addressid_seq')", array());
    $result_ad=pg_fetch_row($address_sq);
    $address_id= $result_ad[0];

    $result=pg_query_params("insert into techmatcher.address(address_id,addresstype_id,addressline1,addressline2,city,state,zipcode,phonenumber) values($1,$2,$3,$4,$5,$6,$7,$8)",array($address_id,$address_type,$address_line1,$address_line2,$city,$state,$zipcode,$phone));
    $result1=pg_query_params("insert into techmatcher.serviceprovidertoaddress(serviceprovider_id,address_id) values($1,$2)",array($provider_id,$address_id));
    echo "OK";
}
echo $errors;
?>