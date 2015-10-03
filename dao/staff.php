<?php include 'dbcon.php';

function get_staffid_from_serviceprovider($serv_id)
{
    $result=pg_query_params("select spstaff_id from techmatcher.serviceprovidershavestaff where serviceprovider_id=$1",array($serv_id));
    $service_i2=array();
      while($names=pg_fetch_assoc($result))
      {
        $service_i2[]= $names;
    }
    return $service_i2;
}
function get_staffname_hiredate($service_iddddd)
{
    $result=pg_query_params("select * from techmatcher.staff where spstaff_id=$1",array($service_iddddd));
    $service_names=array();
    while($result1=pg_fetch_assoc($result))
    {
        $service_names[]=$result1;
    }
    return $service_names;
}

function get_staff_id1(){
   $result=pg_query_params("select Max(spstaff_id) from techmatcher.staff",array());
   $result1=pg_fetch_assoc($result);
   return $result1;
}

function get_staffid_from_staffname($name){
    $qry = pg_query_params("select spstaff_id from techmatcher.staff where spstaffname = $1",array($name));
    $result = pg_fetch_assoc($qry);
    return $result;
}
?>