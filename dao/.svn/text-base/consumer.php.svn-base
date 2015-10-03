<?php include_once 'dbcon.php';

function consumer_findByEmail($email) {
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

function consumer_findByEmail2($email) {
    $result = pg_query_params("SELECT
                            itconsumer.*
                        FROM
                            techmatcher.itconsumer
                        WHERE
                            itconsumer_emailaddress = $1",array($email)) or die(pg_errormessage());
    $temp = pg_fetch_assoc($result);
    return $temp;
}
// new functionality for updating db fields in table in case the user is present but is not subscribed
function update_user_in_db($emails,$name,$pass,$substype) {
    $result = pg_query_params("UPDATE techmatcher.itconsumer set itconsumername=$1, password=$2, subscribertype_id=$3, recordstatus=$5 where itconsumer_emailaddress = $4",array($name,$pass,$substype,$emails,"signupcomplete"));
}

function check_consumers_makematch_access($itconsumer_id,$value,$search_id) {
    // 1. Call MakeMatch to check if the Consumer has a valid id.
    $qry = pg_query_params("select techmatcher.makevariablematch($1,$2,$3,$4)",array($itconsumer_id,'zipcode',(string)$value,$search_id)) or die(pg_errormessage());
    //$qry = "select techmatcher.makevariablematch(".$itconsumer_id.", 'zipcode', '".$value."')";
    //$result = pg_query($qry) or die(pg_errormessage());
    $rs = pg_fetch_assoc($qry);
    if($rs['makevariablematch'] == "t") {
        // Found
        return true;
    } else {
        // Not Found
        return false;
    }
}

function search_provider_byZip2($itconsumer_id,$zip_code) {
    $qry_search_zip = "SELECT
                          distinct(sp.serviceprovider_id) as serviceprovider_id,
                          sp.primaryname
                        FROM
                          techmatcher.serviceprovider as sp LEFT JOIN (techmatcher.matchhistory as mh JOIN techmatcher.address as ad ON (mh.address_id = ad.address_id)) ON (sp.serviceprovider_id = mh.serviceprovider_id)
                        WHERE
                          mh.matchtype_id = 7 AND
                          ad.zipcode = $1
                        ORDER BY primaryname
                        LIMIT 5 OFFSET 0;
                        ";

    $result = pg_query_params($qry_search_zip,array($zip_code)) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

// @todo might be changed later.
function search_provider_byZip($itconsumer_id,$zip_code) {
    $qry_search_zip = "SELECT
                          distinct(sp.serviceprovider_id) as serviceprovider_id,
                          sp.primaryname
                        FROM
                          techmatcher.serviceprovider as sp LEFT JOIN (techmatcher.matchhistory as mh JOIN techmatcher.address as ad ON (mh.address_id = ad.address_id)) ON (sp.serviceprovider_id = mh.serviceprovider_id)
                        WHERE
                          mh.matchtype_id = 7 AND
                          ad.zipcode = $1
                        ORDER BY primaryname;
                        ";

    $result = pg_query_params($qry_search_zip,array($zip_code)) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

//from zipcode page....
function create_anonymous_user_in_db2($emails) {
    $itconsumer_sq   = "select nextval('techmatcher.itconsumerid_seq')";
    $result_itcon = pg_query_params($itconsumer_sq,array());
    $user_sq = pg_fetch_row($result_itcon);
    $max_id = $user_sq[0];

    $qry_create_anonymous_user = "INSERT INTO techmatcher.itconsumer
                                      (itconsumer_id, itconsumer_emailaddress)
                                  VALUES($1,$2)";
    $result = pg_query_params($qry_create_anonymous_user, array($max_id,$emails)) or die(pg_errormessage());


}
function create_anonymous_user_in_db($emails,$password) {
    $itconsumer_sq   = "select nextval('techmatcher.itconsumerid_seq')";
    $result_itcon = pg_query_params($itconsumer_sq,array());
    $user_sq = pg_fetch_row($result_itcon);
    $max_id = $user_sq[0];

    $qry_create_anonymous_user = "INSERT INTO techmatcher.itconsumer
                                      (itconsumer_id, itconsumer_emailaddress, password, lastupdatedate, subscribertype_id)
                                  VALUES
                                      ($1,$2,$3, NOW(),'100')";
    $result = pg_query_params($qry_create_anonymous_user, array($max_id,$emails,$password)) or die(pg_errormessage());
}

function create_user_in_db() {
    $itconsumer_sq   = "select nextval('techmatcher.itconsumerid_seq')";
    $result_itcon = pg_query_params($itconsumer_sq,array());
    $user_sq = pg_fetch_row($result_itcon);
    $max_id = $user_sq[0];

    $name = $_POST['name'];
    $password = $_POST['password'];
    $sec_pass = md5($password);
    $emails = $_POST['email'];
    $subscribertype_id = $_POST['usertype'];

    $qry_create_user = "INSERT INTO techmatcher.itconsumer
                        (itconsumer_id, itconsumername, itconsumer_emailaddress, password, lastupdatedate, subscribertype_id,recordstatus)
                        VALUES($1, $2, $3, $4, NOW(),$5,$6)";

    $result = pg_query_params($qry_create_user,array($max_id,$name,$emails,$sec_pass,$subscribertype_id,'signupcomplete')) or die(pg_errormessage());
}

function get_consumer_billing_address($itconsumer_id) {
    $qry_consumer_address = "SELECT
                                  address.*
                                FROM
                                  techmatcher.itconsumeraddress,
                                  techmatcher.address
                                WHERE
                                  itconsumeraddress.address_id = address.address_id AND
                                  itconsumeraddress.itconsumer_id = $1 AND
                                  itconsumeraddress.address_deleted = FALSE AND
                                  address.addresstype_id = 4
                                ORDER BY
                                  address.country ASC,
                                  address.state ASC,
                                  address.city ASC,
                                  address.addressline1 ASC;
                            ";
    $result = pg_query_params($qry_consumer_address,array($itconsumer_id)) or die(pg_errormessage());
    $result1=pg_fetch_all($result);
    return $result1;
}

function get_consumer_address_id($itconsumer_id) {
    $result = pg_query_params("SELECT address_id FROM techmatcher.itconsumeraddress WHERE itconsumer_id = $1 AND address_deleted = $2",array($itconsumer_id,"FALSE")) or die(pg_errormessage());
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_analogs() {
    $qry_consumer_address = "SELECT * FROM techmatcher.itconsumeranalog;";
    $result = pg_query_params($qry_consumer_address,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function getSubscriberTypeNames() {
    $query = pg_query_params("SELECT  distinct subscibertypename
                            FROM techmatcher.subscribertypelookup, techmatcher.itconsumeranalog
                            where subscribertypelookup.subscribertype_id=itconsumeranalog.subscribertype_id",array());
    $result = pg_fetch_assoc($query);
    return $result;
}

function get_analogs_of_consumer($itconsumer_id) {
    $qry_consumer_address = "SELECT
                                  itconsumeranalogselected.itconsumeranalog_id,
                                  itconsumeranalog.analogtext
                                FROM
                                  techmatcher.itconsumeranalogselected,
                                  techmatcher.itconsumeranalog
                                WHERE
                                  itconsumeranalogselected.itconsumeranalog_id = itconsumeranalog.itconsumeranalog_id AND
                                  itconsumeranalogselected.itconsumer_id =$1";

    $result = pg_query_params($qry_consumer_address,array($itconsumer_id)) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function getSubscriberType() {
    $qry = "SELECT
                  subscriptiontype.subscriptiontype_id,
                  subscriptiontype.subscriptiondesc,
                  subscriptiontype.subcriptionrate
                FROM 
                  techmatcher.subscriptiontype";
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function getSubscriptionRecordView($subscriber_id) {
    $today = date('Y-m-d');
    $query = "SELECT subscriber_id, subscriptioneffectivedate, subscriptionenddate
            FROM techmatcher.currentsubscribers_vw
            WHERE subscriber_id = $1 AND  (subscriptioneffectivedate <= $2 AND $2 <= subscriptionenddate)";
    $result = pg_query_params($query,array($subscriber_id,$today));
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function getZipCode($consumer_id) {
    $today = date('Y-m-d');
    $query = "SELECT additionalparameters
            FROM techmatcher.matchhistory
            WHERE itconsumer_id = $1 AND matchdate = $2";
    $result = pg_query_params($query,array($consumer_id,$today));
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

// profile entry in it consumer table
function getProfileEntry($email) {
    $query= "select recordstatus from techmatcher.itconsumer where itconsumer_emailaddress = $1";
    $result = pg_query_params($query, array($email));
    $value=pg_fetch_row($result);
    return $value;
}

function getSubscriptionId($id) {
    $query  = pg_query_params("select subscribertype_id from techmatcher.itconsumer where itconsumer_id = $1", array($id));
    $result = pg_fetch_row($query);
    return $result[0];
}

function getConsumerHomeAddress($consumerId) {
    $query  = pg_query_params("SELECT address.* FROM techmatcher.itconsumeraddress, techmatcher.address
              WHERE itconsumeraddress.address_id = address.address_id AND itconsumeraddress.itconsumer_id = $1 AND
                    itconsumeraddress.address_deleted = FALSE AND address.addresstype_id = 3
              ORDER BY address.country ASC,address.state ASC,address.city ASC,address.addressline1 ASC",array($consumerId)) or die(pg_errormessage());
    $result = pg_fetch_all($query);
    return $result;
}

function update_record_status($consumerId) {
    $query = pg_query_params("update techmatcher.itconsumer set recordstatus = $1 where itconsumer_id = $2", array('signupcomplete',$consumerId));
}
?>