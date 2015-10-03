<?php include_once 'dbcon.php';

function getservicecategorytypes(){
    $result =pg_query_params("select * from techmatcher.servicecategories where servicecategory_id !=1",array());
    $service_typez=array();
    while($names=pg_fetch_assoc($result)){
        $service_typez[]= $names;
    }
    return $service_typez;
}

function get_service_id($serviceprovider_id)
{
    $result=pg_query_params("select * from techmatcher.serviceprovidersofferservices AS sp, techmatcher.services AS se WHERE sp.service_id = se.service_id and se.servicecategory_id != $1 and sp.serviceprovider_id=$2 and sp.service_deleted=$3",array(1,$serviceprovider_id,"FALSE"));
    $service_idzz=array();
    while($names=pg_fetch_assoc($result)){
        $service_idzz[]= $names;
    }
    return $service_idzz;
}

function get_prime_service_id($serviceprovider_id)
{
    $result=pg_query_params("select * from techmatcher.serviceprovidersofferservices AS sp, techmatcher.services AS se WHERE sp.service_id = se.service_id and se.servicecategory_id = 1 and sp.serviceprovider_id=$1 and sp.service_deleted=$2",array($serviceprovider_id,"FALSE"));
    $service_idzz=array();
    while($names=pg_fetch_assoc($result)){
        $service_idzz[]= $names;
    }
    return $service_idzz;
}


function get_services_from_id($service_idd)
{
    $result=pg_query_params("select * from techmatcher.services where service_id=$1",array($service_idd));
    $service_iddd=array();
    while($names=pg_fetch_assoc($result)){
       $service_iddd[]= $names;
    }
    return $service_iddd;
}

function get_service_id1(){
   $result=pg_query_params("select Max(service_id) from techmatcher.services",array());
   $result1=pg_fetch_assoc($result);
   return $result1;
}

function get_servicecategoryname($service_category_id)
{
    $result=pg_query_params("select servicecategoryname from techmatcher.servicecategories where servicecategory_id=$1",array($service_category_id));
    //$service_iddd=array();
    $category_name=pg_fetch_assoc($result);
    return $category_name;
}

function get_servicedesc_rows($service_name){
    $qry = pg_query_params("select servicedescr from techmatcher.services where servicename = $1", array($service_name));
    $result =  pg_num_rows($qry);
    return $result;
}

function updateServices($statement,$service_name){
    pg_query_params("update techmatcher.services set servicedescr = $1 where servicename = $2", array($statement, $service_name));
}

function setServices($service_id,$service_name,$statement){
    pg_query_params("insert into techmatcher.services(service_id,servicename,servicedescr,servicecategory_id) values($1,$2,$3,$4)",array($service_id,$service_name,$statement,"1"));
}
function setSPOfferServices($provider_id,$service_id){
    pg_query_params("insert into techmatcher.serviceprovidersofferservices(serviceprovider_id,service_id,servicecategory_id) values($1,$2,$3)",array($provider_id,$service_id,"1"));
}
?>