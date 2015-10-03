<?php session_start();
include_once '../dao/dbcon.php';

$errors = "";

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$rep_new_password = $_POST['rep_new_password'];
$secure_password = md5($new_password);

if($new_password != $rep_new_password){
    $errors."New and repeated password doesn't match";
    echo $errors;
}else{
    $qry = pg_query_params("update techmatcher.serviceprovider set companycode=$1 where serviceprovider_id=$2", array($secure_password,$_SESSION['provider']['serviceprovider_id']));
    echo "OK";
}?>