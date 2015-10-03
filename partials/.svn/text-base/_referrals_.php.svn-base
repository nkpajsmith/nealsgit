<?php session_start();
include_once '../dao/dbcon.php';

$errors = "";

$company_name = $_POST['compname'];
$_SESSION['comp_name']= $company_name;
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];

$zip = $_POST['zip'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$contact_name = $_POST['cont_name'];

if($company_name ==NULL) {
    $errors.="<li>Please fill the Company Name.</li>";
}else if($address==NULL) {
    $errors.="<li>Please enter a valid address.</li>";
}else {
    $sp_nextval= pg_query_params("select nextval('techmatcher.serviceprovidersid_seq')",array());
    $sp_id= pg_fetch_array($sp_nextval);
    //insert in service provider table....
    $serviceprovider_insert = pg_query_params("insert into techmatcher.serviceprovider(serviceprovider_id,primaryname,aliasname,contactemailaddress,provisionalrecordflag) values($1,$2,$3,$4,$5)",array($sp_id[0],$company_name,$company_name,$email,'TRUE')) or die(pg_errormessage());

    //incrementing address value
    $address_nextval= pg_query_params("select nextval('techmatcher.addressid_seq')",array());
    $address_id= pg_fetch_array($address_nextval);
    //insert in address table...
    $address_insert = pg_query_params("insert into techmatcher.address(address_id,addresstype_id,addressline1,city,state,country,zipcode,phonenumber) values($1,$2,$3,$4,$5,$6,$7,$8)",array($address_id[0],2,$address,$city,$state,'USA',$zip,$phone)) or die(pg_errormessage());
    // insert in serviceprovidertoaddress table
    $sp_to_add = pg_query_params("insert into techmatcher.serviceprovidertoaddress(serviceprovider_id,address_id,address_deleted) values($1,$2,$3)",array($sp_id[0],$address_id[0],'FALSE')) or die(pg_errormessage());
    // insert into serviceprovidercustomerlinkhistory table
    $splinkhis = pg_query_params("insert into techmatcher.serviceprovidercustomerlinkhistory(serviceprovider_id,itconsumer_id,lastupdatedate,referenceflag) values($1,$2,NOW(),$3)", array($sp_id[0],$_SESSION['consumer']['itconsumer_id'],'TRUE')) or die(pg_errormessage());

    echo "OK";
}
if(!empty($errors)) {
    echo $errors;
}
?>