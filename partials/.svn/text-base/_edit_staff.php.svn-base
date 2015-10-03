<?php session_start();
include_once '../dao/experience.php';
include_once '../dao/staff.php';

$staff_id = $_GET['id'];
$_SESSION['staff_id1'] = $staff_id;

$get_staff_name=get_stafff_namee($staff_id);
$g_hiredate = get_staffname_hiredate($staff_id);
$hiredate = $g_hiredate[0]['spstaffhiredate'];
//converting date format to m/d/Y
$date = new DateTime($hiredate);
$hire_date= $date->format('m/d/Y');?>

<form name="edit_staff" id="edit_staff" method="post" onsubmit="return update_staff($(this));">
    <table width="90%" border="0" cellspacing="2" cellpadding="5" align="center">

        <tr>
            <td align="right"><strong>Employee name*</strong></td>
            <td><input type="text" name="employee_name" id="employee_name" value="<?php echo $get_staff_name[0]['spstaffname'];?>"/></td>
        </tr>
        <tr>
            <td align="right"><strong>Hire Date*</strong></td>
            <td><input name="hire_date" id="hire_date" value="<?php echo $hire_date;?>"/> MM/DD/YYYY</td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>
                <input id="add_services_btn" type="submit" value="SUBMIT" class="btn">
            </td>
        </tr>
    </table>
    <div id="div_staff_errors" class="errordiv" style="margin:0px;"></div>
</form>