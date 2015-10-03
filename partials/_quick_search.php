<?php session_start();
include_once '../dao/dbcon.php';

$it_consumer_id = $_SESSION['consumer']['itconsumer_id'];

$get_search_id              = pg_query_params("select nextval('techmatcher.mh_search_id_seq') as searchid",array());
$search_id_result           = pg_fetch_array($get_search_id);
$search_id                  = $search_id_result['searchid'];

$_SESSION['search_id']=$search_id;
$zip_code = $_SESSION['zip'];

// 1. Call MakeMatch to check if the Consumer has a valid id.
$resulting = pg_query_params("select techmatcher.makevariablematch($1,$2,$3,$4)",array($it_consumer_id,'zipcode',(string)$zip_code,$search_id)) or die(pg_errormessage());
$rs = pg_fetch_assoc($resulting);

if($rs['makevariablematch'] == "t") {
    // Found
    echo 'OK';
} else {
    echo 'NOT OK';
}

?>