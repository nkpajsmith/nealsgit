<?php session_start();
include '../dao/dbcon.php';
include '../dao/address.php';

    $add=$_GET['value'];
    $consumer_id = $_SESSION['consumer']['itconsumer_id'];
    pg_query_params("Update techmatcher.itconsumeraddress set address_deleted='TRUE' Where itconsumer_id=$1 AND address_id=$2", array($consumer_id,$add));
    echo "OK";
?>