<?php session_start();
include_once '../dao/dbcon.php';

$analog_id = $_GET['a_id'];
$analog_date = $_GET['a_date'];
$orgdetail_selected1 = $_GET['orgdetail_selected1'];
$orgdetail_selected2 = $_GET['orgdetail_selected2'];

$consumer_id = $_SESSION['consumer']['itconsumer_id'];

// for checking if any row exists aginsts this consumer id
$query2 = pg_query_params("select * from techmatcher.itconsumeranalogselected where itconsumer_id = $1", array($consumer_id));
$result2=pg_num_rows($query2);

if(!empty($result2) && $result2 >= 1){    
    $qry = pg_query_params("select techmatcher.addanalogdetails($1,$2,$3,$4,$5,$6)", array($consumer_id,$analog_id,$analog_date,'update',$orgdetail_selected1,$orgdetail_selected2));
    $result = pg_fetch_all($qry);
}else{
    $qry = pg_query_params("select techmatcher.addanalogdetails($1,$2,$3,$4,$5,$6)", array($consumer_id,$analog_id,$analog_date,'add',$orgdetail_selected1,$orgdetail_selected2));
    $result = pg_fetch_all($qry);
}

//check recrod status
    $check_recordstatus = pg_query_params("select recordstatus from techmatcher.itconsumer where itconsumer_id = $1", array($_SESSION['consumer']['itconsumer_id']));
    $status = pg_fetch_array($check_recordstatus);
    $record_status = $status[0];

    // check if the user has entered the locations and analog part
    $decide_qry = pg_query_params("select count(*) from techmatcher.itconsumeranalogselected, techmatcher.itconsumeraddress
                where itconsumeranalogselected.itconsumer_id=itconsumeraddress.itconsumer_id
                and itconsumeranalogselected.itconsumer_id=$1",array($_SESSION['consumer']['itconsumer_id']));
    $value = pg_fetch_array($decide_qry);
    if($value[0] > 0 && $record_status !='profileentered'){ // if > 0 then update record else not...
        $qry3 = pg_query_params("update techmatcher.itconsumer set recordstatus = $1 where itconsumer_id = $2", array('profileentered', $_SESSION['consumer']['itconsumer_id']));
    }

echo "OK";?>