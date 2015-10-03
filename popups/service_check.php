<?php session_start();
include 'dao/dbcon.php';
$add=$_POST['service_idddd'];
$service_provider_id=$_SESSION['provider']['serviceprovider_id'];
//pg_query("Update techmatcher.serviceprovidersofferservices set service_deleted='TRUE' Where serviceprovider_id='$service_provider_id' AND service_id='$add'");
pg_query_params("Update techmatcher.serviceprovidersofferservices set service_deleted='TRUE' Where serviceprovider_id=$1 AND service_id=$2", array($service_provider_id,$add));
header("Location:update_profile_services.php");
?>