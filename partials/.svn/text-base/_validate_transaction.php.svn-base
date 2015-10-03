<?php session_start();

$errors = "";

$addresstype1 = $_POST['address_types'];
$charge_total = $_POST['chargetotal'];
$cctype = $_POST['cctype'];
$cardnumber = $_POST['cardnumber'];
$cvmvalue = $_POST['cvmvalue'];
$cardexpmonth = $_POST['cardexpmonth'];
$cardexpyear = $_POST['cardexpyear'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];

$phone = $_POST['phone_ini'].$_POST['phone_mid'].$_POST['phone_last'];
$zip = $_POST['zip'];

//setting in session if required

if($addresstype1==NULL) {
    $errors.="<li>Please fill the address Type.</li>";
}else if($charge_total==NULL) {
    $errors.="<li>Please enter a total amount.</li>";
}else if($cctype == NULL) {
    $errors.="<li>Please select credit card type.</li>";
}else if($cardnumber == NULL) {
    $errors.="<li>Please enter a valid card number.</li>";
}else if($cvmvalue == Null) {
    $errors.="<li>Please enter a CCV no.</li>";
}elseif($cardexpmonth == NULL) {
    $errors.="<li>Please select card's expiry month.</li>";
}elseif($cardexpyear == NULL) {
    $errors.="<li>Please select card's expiry year.</li>";
}elseif($address1 == NULL) {
    $errors.="<li> Please enter valid address</li>";
}elseif($city == NULL) {
    $errors.="<li>Please select city</li>";
}elseif($phone < 10) {
    $errors.="<li>Phone should not be less than 10 characters.</li>";
}elseif($zip == NULL) {
    $errors.="<li>Please enter valid 5 digit zip code.</li>";
}else {
    echo "OK";
}
if(!empty($errors)) {
    echo $errors;
}
?>