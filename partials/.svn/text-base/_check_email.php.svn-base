<?php session_start();
include '../dao/dbcon.php';
include '../dao/consumer.php';

$email = $_GET['email'];
$errors="";

if($email==NULL) {
    echo $errors.="Please enter email.";
}
else {   
    $result=pg_query_params("select * from techmatcher.itconsumer where itconsumer_emailaddress=$1 and (recordstatus='signupcomplete' or recordstatus='profileentered')",array($email));

    $rows = pg_num_rows($result);

    if($rows > 0) {
        print "ok";
    }else {
        print "notok";
    }

}
?>