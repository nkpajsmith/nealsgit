<?php session_start();
include_once '../dao/dbcon.php';
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

if($DOCROOT == 'C:/xampp/htdocs'){
    $path = $DOCROOT."/techmatcher";
}else{
    $path = $DOCROOT;
}

if(isset($_POST['first_sele'])){
    $data = $_POST['first_sele'];
}else{
    $data = 'currentyear';
}

if(isset($_POST['geo_area'])){
    $geo_area = $_POST['geo_area'];
}else{
    $geo_area = 'custadd.zipcode = provadd.zipcode';
}

if(isset($_GET['data'])){
    $data1 = $_GET['data'];
}else{
    $data1 = 0;
}

$imagename= "";
$counter= "";

if($data1 == 1) {
    $imagename = "provider_".$_SESSION['provider']['serviceprovider_id']."_popularservices_default.png";
}else {
    If(!isset($_SESSION['pop_service_counter'])) {
        $_SESSION['pop_service_counter'] =0;
        $counter = $_SESSION['pop_service_counter'];
        $imagename= "img_".$_SESSION['provider']['serviceprovider_id']."_".$counter.".png";
    }else {
        $counter = ++$_SESSION['pop_service_counter'];
        $imagename= "img_".$_SESSION['provider']['serviceprovider_id']."_".$counter.".png";
    }
}


$res_pop_services = get_popular_services($data,$geo_area);

if(!$res_pop_services) {
    // No Rec Found
    $servicecategoryname = "";
    $numsearches  ="";
    unset($_SESSION['pop_service_counter']);
    echo "NO RECORD";
}else {
    $servicecategoryname = array();
    $numsearches  = array();
    while($rs = pg_fetch_array($res_pop_services)) {
        array_push($servicecategoryname,trim($rs['servicecategoryname']));
        array_push($numsearches,trim($rs['numsearches']));
    }

    require_once("/var/www/ChartDirector/lib/phpchartdir.php");

# Create a PieChart object of size 360 x 300 pixels
    $c = new PieChart(720, 390);

# Set the center of the pie at (180, 140) and the radius to 100 pixels
    $c->setPieSize(410, 270, 110);

# Add a title to the pie chart
    $c->addTitle("Most popular services in my area");

# Draw the pie in 3D
    $c->set3D();

    $c->addLegend(10, 60);

    $c->setLabelFormat("{percent}%");

# Set the pie data and the pie labels
    $c->setData($numsearches,$servicecategoryname);

# Explode the 1st sector (index = 0)
    $c->setExplode(0);

    if($data1 == 1){
        $filename  = $path."/provider/charts/defaultimages/".$imagename;
    }else{
        $filename  = $path."/provider/charts/tempimages/".$imagename;
    }

    if(file_exists($filename)) {
        unlink($filename);
    }
    $c->makeChart($filename);
}?>