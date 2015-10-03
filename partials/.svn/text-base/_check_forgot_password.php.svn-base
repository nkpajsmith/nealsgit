<?php session_start();
include '../dao/dbcon.php';
include '../dao/address.php';
include '../dao/provider.php';

$cname = $_GET['cname1'];
$ccode = $_GET['ccode1'];

$errors="";



$res = checkcnamepassword($cname,$ccode);

if(!strcmp($cname, null) || !strcmp($ccode,null))
{
    $errors.="<li >Please fill all boxes.</li>";

}

else if($res == '1')
{
    ////login successfull

    $temp = findByName($cname);

    //var_dump($temp);die;
    $_SESSION['provider'] = $temp;
    echo "OK";
}
else
{
    $errors.="<li >Invalid Company name or Company Code</li>";


}

echo $errors;

?>