<?php session_start();
include '../dao/dbcon.php';
include '../dao/reference.php';

$referencee_nam = $_POST['reference_name'];
$referencee_emaill = $_POST['reference_email'];

$errors="";
$provider_id=$_SESSION['provider']['serviceprovider_id'];
if($referencee_nam==NULL || $referencee_emaill==Null) {
    $errors.="<li >Please fill all boxes.</li>";
}
else {
    $res = reference_checkusernameemail($referencee_nam,$referencee_emaill);

    if($res == 0) {
        $itcon_sq=pg_query_params("select nextval('techmatcher.itconsumerid_seq')",array());
        $result_sq=pg_fetch_row($itcon_sq);
        $itconsumer_id = $result_sq[0];
        $result=pg_query_params("insert into techmatcher.itconsumer(itconsumer_id,itconsumername,itconsumer_emailaddress,lastupdatedate,subscribertype_id,recordsource) values($1,$2,$3,NOW(),$4,$5)",array($itconsumer_id,$referencee_nam,$referencee_emaill,"100","EnteredasReference")) or die(pg_errormessage());
        $result1=pg_query_params("insert into techmatcher.serviceprovidercustomerlinkhistory(serviceprovider_id,itconsumer_id,lastupdatedate,referenceflag)values($1,$2,$3,$4)",array($provider_id,$itconsumer_id,'now()','TRUE'));
        echo "OK";
    }
    else {
    $itcon_sq=pg_query_params("select Max(itconsumer_id) from techmatcher.itconsumer where itconsumer_emailaddress=$1",array($referencee_emaill));
    $result_sq=pg_fetch_row($itcon_sq);
      $itconsumer_id = $result_sq[0];
        $result1=pg_query_params("insert into techmatcher.serviceprovidercustomerlinkhistory(serviceprovider_id,itconsumer_id,lastupdatedate,referenceflag)values($1,$2,$3,$4)",array($provider_id,$itconsumer_id,'now()','TRUE'));
        echo "OK";
        }
}
echo $errors;
?>