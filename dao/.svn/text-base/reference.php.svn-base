<?php include 'dbcon.php';





function reference_checkusernameemail($username,$email){

    $result=pg_query_params("select * from techmatcher.itconsumer where itconsumer_emailaddress=$1 or itconsumername=$2",array($email,$username));
    $rows = pg_num_rows($result);
    return $rows;
}


function get_reference_id($email){
    $result=pg_query_params("select Max(itconsumer_id) from techmatcher.itconsumer where itconsumer_emailaddress=$1",array($email));
    $result1=pg_fetch_assoc($result);
    return $result1;
}

function get_reference_customers_from_service_provider($serv_id)
{
    $result=pg_query_params("select itconsumer_id from techmatcher.serviceprovidercustomerlinkhistory where serviceprovider_id=$1 AND referenceflag=$2",array($serv_id,"TRUE"));
    $service_i2=array();
    while($names=pg_fetch_assoc($result))
    {
        $service_i2[]= $names;
    }
    return $service_i2;
}

function get_customername_hiredate($consumer_iddddd)
{
    $result=pg_query_params("select * from techmatcher.itconsumer where itconsumer_id=$1",array($consumer_iddddd));
    $customer_names=array();
    while($result1=pg_fetch_assoc($result))
    {
        $customer_names[]=$result1;
    }
    return $customer_names;
}

?>
