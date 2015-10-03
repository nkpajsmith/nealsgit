<?php session_start();
include '../dao/service.php';

$service_typez = $_GET['service_types'];
$service_nam = $_GET['service_name'];
$service_descriptio = $_GET['service_description'];
$provider_id=$_SESSION['provider']['serviceprovider_id'];

$errors="";
if($service_nam==NULL || $service_descriptio==Null){
    $errors.="<li >Please fill all boxes.</li>";
}else{
    $service_sq=pg_query_params("select nextval('techmatcher.serviceid_seq')",array());
    $result_service = pg_fetch_row($service_sq);
    $service_id=$result_service[0];
    $result=pg_query_params("insert into techmatcher.services(service_id,servicename,servicedescr,servicecategory_id) values($1,$2,$3,$4)",array($service_id,$service_nam,$service_descriptio,$service_typez));
    $result2=pg_query_params("insert into techmatcher.serviceprovidersofferservices(serviceprovider_id,service_id,servicecategory_id) values($1,$2,$3)",array($provider_id,$service_id,$service_typez));
    echo "OK";
}
echo $errors;
?>