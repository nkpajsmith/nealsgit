<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/address.php';

$address_type = $_GET['address_types'];
$address_line1 = $_GET['address_line1'];
$address_line2 = $_GET['address_line2'];
$city = $_GET['city'];
$state = $_GET['state'];
$zipcode = $_GET['zip_code'];

$phone_ini = $_GET['phone_ini'];
$phone_mid = $_GET['phone_mid'];
$phone_last = $_GET['phone_last'];
$phone = $phone_ini.$phone_mid.$phone_last;
$errors="";
$state1=strlen($state);
$zipcode1=strlen($zipcode);

$phone1=strlen($phone);
$provider_id=$_SESSION['consumer']['itconsumer_id'];

$zip_options = array(
        'options' => array(
                'min_range' => 5,
                'max_range' => 5,
        )
);

if($address_line1==NULL) {
    $errors.="<li >Please fill the address line1.</li>";
}else if($city==NULL) {
    $errors.="<li >Please enter a city.</li>";
}else if($state == NULL) {
    $errors.="<li >Please enter a state.</li>";
}else if($zipcode == NULL) {
    $errors.="<li >Please enter a zipcode.</li>";
}else if($phone == Null) {
    $errors.="<li >Please enter a phone.</li>";
}elseif($state1!=2) {
    $errors.="<li >State should contain only 2 characters.</li>";
}elseif($zipcode1<5) {
    $errors.="<li >Zipcode should contain 5 digits.</li>";
}elseif($phone1<10) {
    $errors.="<li >Phone should not be less than 10 characters.</li>";
}else {

    $qry1="select nextval('techmatcher.addressid_seq')";
    $result_q= pg_query($qry1);
    $r_row = pg_fetch_row($result_q);
    $address_id = $r_row[0];    
    $qry = "insert into techmatcher.address(address_id,addresstype_id,addressline1,addressline2,city,state,zipcode,phonenumber) values($1,$2,$3,$4,$5,$6,$7,$8)";
    $result = pg_query_params($qry, array($address_id,$address_type,$address_line1,$address_line2,$city,$state,$zipcode,$phone));
    $result1 = pg_query_params("insert into techmatcher.itconsumeraddress(itconsumer_id,address_id,lastupdatedate) values($1,$2,NOW())",array($provider_id,$address_id));

    //check recrod status
    $check_recordstatus = pg_query_params("select recordstatus from techmatcher.itconsumer where itconsumer_id = $1", array($provider_id));
    $status = pg_fetch_array($check_recordstatus);
    $record_status = $status[0];

    // check if the user has entered the locations and analog part
    $decide_qry = pg_query_params("select count(*) from techmatcher.itconsumeranalogselected, techmatcher.itconsumeraddress
                where itconsumeranalogselected.itconsumer_id=itconsumeraddress.itconsumer_id
                and itconsumeranalogselected.itconsumer_id=$1",array($_SESSION['consumer']['itconsumer_id']));
    $value = pg_fetch_array($decide_qry);
    if($value[0] > 0 && $record_status !='profileentered'){
        $qry = pg_query_params("update techmatcher.itconsumer set recordstatus = $1 where itconsumer_id = $2", array('profileentered', $provider_id));
    }

    echo "OK";
}
echo $errors;
?>