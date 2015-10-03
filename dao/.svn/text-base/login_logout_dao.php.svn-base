<?php include_once 'dbcon.php';

function get_user_type($emails,$password){
    $result= pg_query_params("select usertype from techmatcher.logins where emaiaddress = $1 and password = $2", array($emails,(string)$password)); // typecast to string becoz it is character varying
    $data = pg_fetch_assoc($result);
    return $data;
}
//used on index.php page login main button passes encrypted value from _login.php.
function check_user_status_rows($email,$password){
    $result = pg_query_params("SELECT * FROM techmatcher.logins WHERE emailaddress = $1 and password = $2",array($email,$password)) or die(pg_errormessage());
    $rows = pg_num_rows($result);
    return $rows;
}
// for checking if the email entered by user exists in Db or not
function check_user_status($email, $password){
    $result = pg_query_params("SELECT * FROM techmatcher.logins WHERE emailaddress = $1 and password = $2",array($email,$password)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);  
    return $temp;    
}

function check_user_status1($email){
    $result = pg_query_params("SELECT * FROM techmatcher.logins WHERE emailaddress = $1",array($email)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}

function verify_user($email,$pwd) {
    $result=pg_query_params("select * from techmatcher.itconsumer where itconsumer_emailaddress=$1 AND password=$2",array($email,$pwd));
    $rows = pg_num_rows($result);
    return $rows;
}

function findProviderByEmail($email) {
    $result = pg_query_params("SELECT * FROM techmatcher.serviceprovider WHERE contactemailaddress = $1",array($email)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}
function verify_consumer_subscription($email) {
    $result = pg_query_params("SELECT
                            itconsumer.*,
                            subscribertypelookup.subscribertypename
                        FROM
                            techmatcher.itconsumer,
                            techmatcher.subscribertypelookup
                        WHERE
                            itconsumer.subscribertype_id = subscribertypelookup.subscribertype_id
                            AND
                            itconsumer_emailaddress = $1",array($email)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}

// profile entry in it consumer table
function get_user_profile($email) {
    $query= "select recordstatus from techmatcher.itconsumer where itconsumer_emailaddress = $1";
    $result = pg_query_params($query, array($email));
    $value=pg_fetch_row($result);
    return $value;
}

function is_valid_email($email) {
    if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9.-]+.[A-Z]{2,4}$/i",$email)) {
        return false;
    } else {
        return true;
    }
}

function get_bubble_text($id){
    $query = pg_query_params("select bubblehelp_text from techmatcher.bubblehelptext where bubblehelp_object_id=$1", array($id));
    $bubble_text = pg_fetch_assoc($query);
    return $bubble_text["bubblehelp_text"];
}

function check_serviceprovider_unlocked ($id){
      $query= "select record_locked from techmatcher.serviceprovider where serviceprovider_id = $1";
    $result = pg_query_params($query, array($id));
    $value=pg_fetch_row($result);
    return $value;
    }
?>