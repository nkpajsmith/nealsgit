<?php include 'dbcon.php';

function getStartEndDate($cons_id){
    $query= "select subscriptioneffectivedate,subscriptionenddate from techmatcher.currentsubscribers_vw where serviceprovider_id = $1;";
    $result=pg_query_params($query, array($cons_id));
    $row = pg_fetch_row($result);
    return $row;
}

?>