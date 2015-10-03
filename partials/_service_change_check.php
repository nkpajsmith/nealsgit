<?php session_start();
include_once '../dao/dbcon.php';

$add=$_GET['value'];
$service_provider_id=$_SESSION['provider']['serviceprovider_id'];
pg_query_params("Update techmatcher.serviceprovidersofferservices set service_deleted=$1 Where serviceprovider_id=$2 AND service_id=$3",array("TRUE",$service_provider_id,$add));
echo "OK";
?>