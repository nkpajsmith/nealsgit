<?php include_once 'dbcon.php';

function checkemailpassword($email,$pwd) {

    $result=pg_query_params("select * from techmatcher.serviceprovider where contactemailaddress=$1 AND companycode=$2",array($email,$pwd));
    $rows = pg_num_rows($result);// checks if result has 0 or more rows
    return $rows;
}

function findByEmail($email) {
    $result = pg_query_params("SELECT * FROM techmatcher.serviceprovider WHERE contactemailaddress = $1",array($email)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}
function findByName($cname) {
    $result = pg_query_params("SELECT * FROM techmatcher.serviceprovider WHERE primaryname = $1",array($cname)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}

function checkcnamepassword($cname,$ccode) {
    $result=pg_query_params("select * from techmatcher.serviceprovider where primaryname=$1 AND companycode=$2",array($cname,$ccode));
    $rows = pg_num_rows($result);
    return $rows;

}
function get_provider_id() {
    $result=pg_query_params("select Max(serviceprovider_id) from techmatcher.serviceprovider",array());
    $result1=pg_fetch_assoc($result);
    return $result1;
}

function get_customer_counts($spid) {
    $result=pg_query_params("select * from techmatcher.serviceprovider_customer_count where serviceprovider_id=$1::bigint and count>0",array($spid));
    $result1=pg_fetch_assoc($result);
    return $result1;
}

function getSubscriberTypeId($id) {
    $query  = pg_query_params("select subscribertype_id from techmatcher.serviceprovider where serviceprovider_id = $1", array($id));
    $result = pg_fetch_row($query);
    return $result[0];
}

function getproviderHomeAddress($providerId) {
    $query  = pg_query_params("SELECT address.* FROM techmatcher.serviceprovidertoaddress, techmatcher.address
              WHERE serviceprovidertoaddress.address_id = address.address_id AND serviceprovidertoaddress.serviceprovider_id = $1 AND
                    serviceprovidertoaddress.address_deleted = FALSE AND address.addresstype_id = 1
              ORDER BY address.country ASC,address.state ASC,address.city ASC,address.addressline1 ASC",array($providerId)) or die(pg_errormessage());
    $result = pg_fetch_all($query);
    return $result;
}

function get_provider_billing_address($provider_id) {
    $qry_provider_address = "SELECT address.* FROM techmatcher.serviceprovidertoaddress, techmatcher.address
                           WHERE serviceprovidertoaddress.address_id = address.address_id AND serviceprovidertoaddress.serviceprovider_id = $1 AND
                                  serviceprovidertoaddress.address_deleted = FALSE AND address.addresstype_id = 4
                           ORDER BY address.country ASC, address.state ASC, address.city ASC, address.addressline1 ASC";
    $result = pg_query_params($qry_provider_address,array($provider_id)) or die(pg_errormessage());
    $result1=pg_fetch_all($result);
    return $result1;
}

function get_provider_home_page($provider_id){
    $qry = pg_query_params("select sp_home_page from techmatcher.serviceprovider where serviceprovider_id=$1",array($provider_id)) or die(pg_errormessage());
    $result = pg_fetch_assoc($qry);
    return $result["sp_home_page"];
}

function get_provider_data($provider_id){
    $qry = pg_query_params("select sp_home_page, contactemail from techmatcher.serviceprovider where serviceprovider_id=$1",array($provider_id)) or die(pg_errormessage());
    $result = pg_fetch_assoc($qry);
    $_SESSION['provider']['contactemail']=$result['contactemail'];
    return $result["sp_home_page"];
}
?>