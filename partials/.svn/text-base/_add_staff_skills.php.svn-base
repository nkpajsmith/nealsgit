<?php session_start();
include_once '../dao/dbcon.php';
$exp= $_POST['yearsExperience'];
$parent_skill_id =$_SESSION['parent_id'];
$staff_id = $_SESSION['staff_id'];

$qry = "insert into techmatcher.staffhaveskills(spstaff_id,serviceskill_id,yearsofexperience,lastupdatedate) values ($staff_id,$parent_skill_id,$exp,now())";

$res1 =(pg_query($dbconn,$qry));
if ($res1== FALSE){
     pg_get_result($dbconn);
    $error_field_description = pg_result_error_field($res1, PGSQL_DIAG_MESSAGE_PRIMARY);
    echo $error_field_description;

}else{
    $qry1 = pg_query_params("select techmatcher.updateserviceproviderskills($1)",array($_SESSION['provider']['serviceprovider_id']));
    $result =pg_send_query($dbconn,$qry1);
    echo 'OK';
}

//echo 'OK';
?>
