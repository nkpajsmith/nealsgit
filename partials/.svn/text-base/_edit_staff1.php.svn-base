<?php session_start();
include_once '../dao/experience.php';
include_once '../dao/staff.php';

$staff_name = $_POST['employee_name'];
$hire_datee = $_POST['hire_date'];
$errors = '';

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

if($staff_name == NULL || $hire_datee == Null) {
    echo $errors.="<li >Please fill all boxes.</li>";
}else if($hire_datee != null){
    $result = validate_date_format($hire_datee);
    if($result == 1){
        $result=pg_query_params("update techmatcher.staff set spstaffname = $1, spstaffhiredate = $2 where spstaff_id = $3",array($staff_name,$hire_datee,$_SESSION['staff_id1']));
        echo "OK";
    }else{
        echo $errors.="<li >Date Format is incorrect. valid format is MM/DD/YYYY.</li>";
    }
}
?>

