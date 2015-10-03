<?php session_start();
include_once '../dao/dbcon.php';

$checkbox_id = $_GET['id'];

if($checkbox_id == 'default-view-one') {
    $qry = pg_query_params("update techmatcher.serviceprovider set sp_home_page = $1 where serviceprovider_id = $2", array('provider_home.php',$_SESSION['provider']['serviceprovider_id']));
    echo "home";
}else {
    $qry = pg_query_params("update techmatcher.serviceprovider set sp_home_page = $1 where serviceprovider_id = $2", array('provider_profile.php',$_SESSION['provider']['serviceprovider_id']));
    echo "profile";
}
?>