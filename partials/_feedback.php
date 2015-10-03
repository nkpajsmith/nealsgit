<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/login_logout_dao.php';

$feedback_type = $_POST['feedback_type'];
$comments      = $_POST['feedback_comment'];
$errors = '';
if($feedback_type =='' || $comments == '') {
    echo $errors."<li> All fields are mendatory. </li>";
}else {
    $qry="select nextval('techmatcher.custfeedback_seq')";
    $result_q= pg_query_params($qry,array());
    $r_row = pg_fetch_row($result_q);
    $feedback_id = $r_row[0];
    if(isset($_SESSION['consumer'])) {
        $email = $_SESSION['consumer']['itconsumer_emailaddress'];
    }else {
        $email = $_SESSION['provider']['contactemailaddress'];
    }    
    $status = check_user_status1($email);
    $customer_type = $status['usertype'];
    $customer_id = $status['user_id'];

    $qry1 = pg_query_params("insert into techmatcher.customerfeedback(feedback_id,feedbacktype_cd,feedback_text,customer_id,customer_type,lastupdatedate)values($1,$2,$3,$4,$5,now())", array($feedback_id,$feedback_type,$comments,$customer_id,$customer_type));
    echo 'OK';
}?>