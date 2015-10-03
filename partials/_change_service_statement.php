<?php session_start();

include_once "../dao/dbcon.php";
include_once "../dao/service.php";
$statement = $_POST['serv_stat'];
$provider_id=$_SESSION['provider']['serviceprovider_id'];
$service_name="Company Service Statement for ".$_SESSION['provider']['primaryname'];
$errors = "";

if(!empty($statement) || $statement != null){
    $no_of_rows= get_servicedesc_rows($service_name);
    if($no_of_rows > 0 || $no_of_rows == 1){ // if record exists ... update
        updateServices($statement,$service_name);
        echo "UPDATE";
    }else{ // insert new record
        $service_sq=pg_query_params("select nextval('techmatcher.serviceid_seq')",array());
        $result_service = pg_fetch_row($service_sq);
        $service_id=$result_service[0];

        $result = setServices($service_id,$service_name,$statement);
        $result1 = setSPOfferServices($provider_id,$service_id);
        echo "INSERT";
    }
}else{
    $errors =$errors."<li> Statement couldn't be empty. </li>";
    echo $errors;
}?>