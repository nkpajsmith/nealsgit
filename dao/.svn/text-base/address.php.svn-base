<?php include_once 'dbcon.php';

function get_address_by_serviceid($serviceprovider_id){
    $result = pg_query_params("SELECT address_id FROM techmatcher.serviceprovidertoaddress WHERE serviceprovider_id=$1 AND address_deleted=$2",array($serviceprovider_id,"FALSE")) or die(pg_errormessage());
    $names=array();
    while ($name= pg_fetch_assoc($result))
    {
         $names[] = $name;
    }
    return $names;
}

function get_address_from_id($address_id){
    $result=pg_query_params("select * from techmatcher.address where address_id = $1",array($address_id));
    $addresses=array();
    while ($name= pg_fetch_assoc($result))
    {
        $addresses[] = $name;
    }
    return $addresses;
}

function getaddresstypes() {
   $result=pg_query_params("select * from techmatcher.addresstypelookup ORDER BY displaysortorder",array());
   $addresstypes=array();
   while ($name= pg_fetch_assoc($result))
   {
         $addresstypes[] = $name;
   }
   return $addresstypes;
}

function setBillingAddress($cons_id,$address1,$address2,$city,$state,$zipcode,$phone){
    $qry = pg_query("select nextval('techmatcher.addressid_seq')");
    $result = pg_fetch_row($qry);
    $nextAddress= $result[0];

    $qry = pg_query_params("insert into techmatcher.address(address_id,addresstype_id,addressline1,addressline2,city,state,country,zipcode,phonenumber) values ($1,4,$2,$3,$4,$5,'USA',$6,$7)",array($nextAddress,$address1,$address2,$city,$state,$zipcode,$phone));
    $result1=pg_query_params("insert into techmatcher.itconsumeraddress(itconsumer_id,address_id,lastupdatedate) values($1,$2,NOW())",array($cons_id,$nextAddress));
}

function updateBillingAddress($cons_id,$address1,$address2,$city,$state,$zipcode,$phone) {
    $qry= "select aa.address_id from techmatcher.itconsumeraddress it,techmatcher.address aa where it.itconsumer_id=$1 and aa.addresstype_id=4 AND aa.address_id = it.address_id and it.address_deleted=$2;";
    $r1=pg_query_params($qry, array($cons_id,'FALSE'));
    $r2= pg_fetch_all($r1);
    $address_id=$r2[0]['address_id'];

    pg_query_params("Update techmatcher.address set addressline1 =$1, addressline2 =$2,city= $3, state = $4, country = $5, zipcode = $6, phonenumber= $7 Where address_id=$8", array($address1,$address2,$city,$state,'USA',$zipcode,$phone,$address_id));
}

function updateHomeAddress($cons_id,$address1,$address2,$city,$state,$zipcode,$phone){
    $qry= "select aa.address_id from techmatcher.itconsumeraddress it,techmatcher.address aa where it.itconsumer_id=$1 and aa.addresstype_id=3 AND aa.address_id = it.address_id and it.address_deleted=$2;";
    $r1=pg_query_params($qry, array($cons_id,'FALSE'));
    $r2= pg_fetch_all($r1);
    $address_id=$r2[0]['address_id'];

    pg_query_params("Update techmatcher.address set addressline1 =$1, addressline2 =$2,city= $3, state = $4, country = $5, zipcode = $6, phonenumber= $7 Where address_id=$8", array($address1,$address2,$city,$state,'USA',$zipcode,$phone,$address_id));
}

function updateProviderHomeAddress($provider_id,$address1,$address2,$city,$state,$zipcode,$phone){
    $qry= "select aa.address_id from techmatcher.serviceprovidertoaddress it,techmatcher.address aa where it.serviceprovider_id=$1 and aa.addresstype_id=3 AND aa.address_id = it.address_id and it.address_deleted=$2;";
    $r1=pg_query_params($qry, array($provider_id,'FALSE'));
    $r2= pg_fetch_all($r1);
    $address_id=$r2[0]['address_id'];

    pg_query_params("Update techmatcher.address set addressline1 =$1, addressline2 =$2,city= $3, state = $4, country = $5, zipcode = $6, phonenumber= $7 Where address_id=$8", array($address1,$address2,$city,$state,'USA',$zipcode,$phone,$address_id));
}

function setProviderBillingAddress($provider_id,$address1,$address2,$city,$state,$zipcode,$phone){
    $qry = pg_query("select nextval('techmatcher.addressid_seq')");
    $result = pg_fetch_row($qry);
    $nextAddress= $result[0];

    $qry = pg_query_params("insert into techmatcher.address(address_id,addresstype_id,addressline1,addressline2,city,state,country,zipcode,phonenumber) values ($1,4,$2,$3,$4,$5,'USA',$6,$7)",array($nextAddress,$address1,$address2,$city,$state,$zipcode,$phone));
    $result1=pg_query_params("insert into techmatcher.serviceprovidertoaddress(serviceprovider_id,address_id,lastupdatedate) values($1,$2,NOW())",array($provider_id,$nextAddress));
}

function updateProviderBillingAddress($provider_id,$address1,$address2,$city,$state,$zipcode,$phone) {
    $qry= "select aa.address_id from techmatcher.serviceprovidertoaddress it,techmatcher.address aa where it.serviceprovider_id=$1 and aa.addresstype_id=4 AND aa.address_id = it.address_id and it.address_deleted=$2;";
    $r1=pg_query_params($qry, array($cons_id,'FALSE'));
    $r2= pg_fetch_all($r1);
    $address_id=$r2[0]['address_id'];

    pg_query_params("Update techmatcher.address set addressline1 =$1, addressline2 =$2,city= $3, state = $4, country = $5, zipcode = $6, phonenumber= $7 Where address_id=$8", array($address1,$address2,$city,$state,'USA',$zipcode,$phone,$address_id));
}
?>