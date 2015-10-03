<?php session_start();
include_once '../dao/dbcon.php';

$title      = $_POST['contacttitle'];
$first_name = $_POST['contactfirstname'];
$last_name  = $_POST['contactlastname'];
$alias_name = $_POST['aliasname'];
$legal_name = $_POST['legalname'];
$comp_found_dt = $_POST['compfound_dt'];

$provider_id=$_SESSION['provider']['serviceprovider_id'];

$errors = "";

if($title == NULL){
    $errors = "<li>How shall we address you?  Mr, Mrs, Ms?</li>";
}else if(empty($first_name)){
    $errors = "<li>Please enter your first name</li>";
}else if(empty($last_name)){
    $errors = "<li>Please enter your last name</li>";
}else if(empty($comp_found_dt)){
    $errors = "<li>Please enter the date (approximately) when your company was founded in the format MM/DD/YYYY.</li>";
}else{
    pg_query_params("update techmatcher.serviceprovider set primaryname=$1,aliasname=$2,contactfirstname=$3,contactlastname=$4,contacttitle=$5,companyfounded_dt=$7 where serviceprovider_id=$6", array($legal_name,$alias_name,$first_name,$last_name,$title,$provider_id,$comp_found_dt)) or die(pg_errormessage());
    echo "OK";
}
echo $errors;?>