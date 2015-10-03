<?php include 'dbcon.php';
function getsubscriptionsforprovider() {

    $result=pg_query_params("select * from techmatcher.subscriptiontype where subscribertype_id=$1",array(200));
    $addresstypes=array();
    while ($name= pg_fetch_assoc($result)) {
        $addresstypes[] = $name;

    }
    return $addresstypes;
}

function getsubscriptionforconsumer($consumerId) {
    $qry = "select subcriptionrate, subscriptiondesc from techmatcher.subscriptiontype as st, techmatcher.itconsumer as it where it.subscribertype_id = st.subscribertype_id and it.itconsumer_id=$1 order by subcriptionrate";//
    $result = pg_query_params($qry,array($consumerId));

    $addresstypes=array();
    while ($name= pg_fetch_assoc($result)) {
        $addresstypes[] = $name;
    }
    return $addresstypes;
}

function getsubscriptionforprovider($providerId) {
    $qry = "select subcriptionrate, subscriptiondesc from techmatcher.subscriptiontype as st, techmatcher.serviceprovider as it where it.subscribertype_id = st.subscribertype_id and it.serviceprovider_id=$1 order by subcriptionrate";//
    $result = pg_query_params($qry,array($providerId));

    $addresstypes=array();
    while ($name= pg_fetch_assoc($result)) {
        $addresstypes[] = $name;
    }
    return $addresstypes;
}

//function for getting subscription type description
function getSubsTypeDetail($amount) {
    $qry="select subscriptiontype_id,subscribertype_id,subscriptiondesc,subscriptionterm from techmatcher.subscriptiontype where subcriptionrate = $1";
    $result = pg_query_params($qry,array($amount));
    $value=pg_fetch_row($result);
    return $value;
}

// function for inserting value in DB keeping package type
function setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id) {
    $qry = pg_query_params("select techmatcher.subscribe_function($1,$2, $3)",array($consumer_id,$subscribertype_id,$subscriptiontype_id));
}

//request in db
function setRequestInLog($orderId,$consumer_id,$subscriptiontype_id,$subscribertype_id,$xmlString,$requestMsg) {
    $qry="insert into techmatcher.subscriptiontranslog(subtransaction_id,subscriber_id,subscriptiontype_id,subscriptioneventdate,subscribertype_id,subtranstype,substranstimestamp,xmltext) values($1,$2,$3,NOW(),$4,$5,NOW(),xmlparse(content overlay( $6 placing 'xxxxxxxxxxxx' from (position('cardnumber' in $6)+14) for 12)))";
    $result = pg_query_params($qry,array($orderId,$consumer_id,$subscriptiontype_id,$subscribertype_id,$requestMsg,$xmlString));
}

//response in db
function setResponseInLog($orderId,$consumer_id,$subscriptiontype_id,$subscribertype_id,$xmlString,$responseMsg){
    $qry="insert into techmatcher.subscriptiontranslog(subtransaction_id,subscriber_id,subscriptiontype_id,subscriptioneventdate,subscribertype_id,subtranstype,substranstimestamp,xmltext) values($1,$2,$3,NOW(),$4,$5,NOW(),xmlparse(content overlay( $6 placing 'xxxxxxxxxxxx' from (position('cardnumber' in $6)+14) for 12)));";
    $result = pg_query_params($qry,array($orderId,$consumer_id,$subscriptiontype_id,$subscribertype_id,$responseMsg,$xmlString,));
}

function getNextLogId() {
    $qry    = "select nextval('techmatcher.subscriptiontransactionlog_sq')";
    $result = pg_query($qry);
    $value  = pg_fetch_row($result);
    return $value;
}

//function for getting subscription type description
function getSubsTypeDetailDesc($subscriber_type) {
    $qry="select  productname,   productdescription, subcriptionrate as subscriptionrate  
from techmatcher.subscriptiontype where  subscribertype_id =$1  order by subscriptionrate asc";
    $result = pg_query_params($qry,array($subscriber_type));
    $value=pg_fetch_all($result);
    return $value;
}
?>
