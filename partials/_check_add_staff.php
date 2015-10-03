<?php session_start();
include '../dao/staff.php';

$employee_nam = $_POST['employee_name'];
$hire_datee = $_POST['hire_date'];
$_date = urldecode($hire_datee);
$errors="";
$provider_id=$_SESSION['provider']['serviceprovider_id'];

function validate_date_format($_date1) {
    $arr=split("/",$_date1); // splitting the array
    $mm=$arr[0]; // first element of the array is month
    $dd=$arr[1]; // second element is date
    $yy=$arr[2]; // third element is year
    If(!checkdate($mm,$dd,$yy)) {
        return false;
    }else {
        return true;
    }
}

$employ_name = strstr($employee_nam, '"');

if($employee_nam==NULL || $hire_datee==Null) {
    echo $errors.="<li >Please fill all boxes.</li>";
}else if($employ_name != NULL || $employ_name == '"'){
    echo $errors.="<li >Please enter names using text characters without quotations. -- Thank you</li>";
}else if($_date !=NULL) {
    $result = validate_date_format($_date);    
    if($result== 1) {
        $staff_sq=pg_query_params("select nextval('techmatcher.spstaffid')",array());
        $result_staff = pg_fetch_row($staff_sq);
        $staff_id=$result_staff[0];

        $result=pg_query_params("insert into techmatcher.staff(spstaff_id,spstaffname,spstaffhiredate) values($1,$2,$3)",array($staff_id,$employee_nam,$_date));
        $result2=pg_query_params("insert into techmatcher.serviceprovidershavestaff(spstaff_id,serviceprovider_id) values($1,$2)",array($staff_id,$provider_id));//@todo need to modify
        echo "OK";
    }else {
        echo $errors.="<li >Date Format is incorrect. valid format is MM/DD/YYYY.</li>";
    }
}?>