<?php session_start();
include '../dao/dbcon.php';
include '../dao/address.php';

    $address_id= $_GET['val'];
    $service_provider_id=$_SESSION['provider']['serviceprovider_id'];
    pg_query_params("Update techmatcher.serviceprovidertoaddress set address_deleted=$1 Where serviceprovider_id=$2 AND address_id=$3",array("TRUE",$service_provider_id,$address_id));
    echo "OK";
?>