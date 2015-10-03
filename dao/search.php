<?php

require_once 'dbcon.php';

function getGeographicSearchCategories(){
    $qry = "SELECT * FROM techmatcher.matchtypelookup;";
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0){
        return $result;
    } else {
        return false;
    }
}

function getServiceCategories(){
    $qry = "SELECT * FROM techmatcher.servicecategories;";
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    var_dump($result);die;
    if(pg_num_rows($result)>0){
        return $result;
    } else {
        return false;
    }
}

function getAllServiceCategories(){
    $qry=pg_query_params("SELECT servicecategory_id, servicecategoryname FROM techmatcher.servicecategories where servicecategory_id !=1 ORDER BY servicecategory_id",array());
    $result = pg_fetch_all($qry);
    return $result;
}

function getSP_SpecificSkills(){
    $qry = "SELECT * FROM techmatcher.serviceskills;";
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0){
        return $result;
    } else {
        return false;
    }
}

function getSP_Rated(){
    $qry = "SELECT * FROM techmatcher.ratingevents where ratingtotal>0;";
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0){
        return $result;
    } else {
        return false;
    }
}
//---dashborad functions -------------//
 function getAllSearhes(){
     $result = pg_query_params("select dashvalue1 from techmatcher.dashboard",array());
     $result1 = pg_fetch_all($result);
     return $result1[0]["dashvalue1"];
 }

 function getAllProviders(){
     $result = pg_query_params("select dashvalue2 from techmatcher.dashboard",array());
     $result1 = pg_fetch_all($result);
     return $result1[0]["dashvalue2"];
 }

 function getDashboardNames(){
     $result = pg_query_params("select dashlabel1, dashlabel2 from techmatcher.dashboard",array());
     $result1 = pg_fetch_array($result);
     return $result1;
 }

?>