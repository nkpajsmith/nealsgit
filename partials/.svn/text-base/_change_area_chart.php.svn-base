<?php
include_once '../dao/dbcon.php';
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

$path = $DOCROOT;

if(isset($_POST['date_range'])){
    $_date = $_POST['date_range'];
}else{
    $_date = 'currentmonth';
}

if ($_date=='currentquarter'){$display_date='Current Quarter';} else
if ($_date=='lastquarter'){$display_date='Last Quarter';} else
if ($_date=='currentweek'){$display_date='Current Week';}
if ($_date=='lastweek'){$display_date='Last Week';} else
if ($_date=='currentmonth'){$display_date='Current Month';} else
if ($_date=='lastmonth'){$display_date='Last Month';} else
if ($_date=='currentyear'){$display_date='Current Year';} else
if ($_date=='lastyear'){$display_date='Last Year';}

if(isset($_POST['geo_area'])){
    $geo_area = $_POST['geo_area'];
    if ($geo_area== "custadd.zipcode = provadd.zipcode"){$display_geo='Zip Code';} else
    if ($geo_area=="custadd.cityname =provadd.cityname and custadd.statecode =provadd.statecode") {$display_geo='City';} else
    if ($geo_area=="custadd.countyname =provadd.countyname and custadd.statecode =provadd.statecode") {$display_geo='County';} else
    if ($geo_area=="custadd.statecode = provadd.statecode") {$display_geo='State';}
    
}else{
    $geo_area = 'custadd.countyname = provadd.countyname';
    $display_geo='County';
}

if(isset($_POST['org_type'])){
    $org_type = $_POST['org_type'];
    if ($org_type== "Any"){$display_org_type='All Types of Customers';} else
    if ($org_type=="Organization Size") {$display_org_type='Organization Size';} else
    if ($org_type=="Organization Type") {$display_org_type='Organization Type';} else
    if ($org_type== "Technical Capability") {$display_org_type='Technical Capability';}
    
}else{
    $org_type = 'Any';
    $display_org_type='All Types of Customers';
}

$provider_id = $_SESSION['provider']['serviceprovider_id'];
$_SESSION['selected_value'] = $_date;

$csvfile="/var/www/charts/genbarcustarea_". $provider_id.'_'.$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$data = 0;
$imagename= "";
$count= "";

$imagename = "bar".$provider_id.'_customersinarea.png';


$OrgDetails = array();
$OrgCategory = array();  
$Numberofsearches = array();

$res_listed_type = get_area_details($_date, $geo_area,$org_type);

$row = 0; 
$num=0;

if (($handle = fopen($csvfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++)  
        if ($c %2) {        
            array_push($Numberofsearches,$data[$c]);} else{
            array_push($OrgDetails,$data[$c]);}
       } 
}
//print_r( $OrgDetails);
//print_r ($Numberofsearches);

  require_once("/var/www/ChartDirector/lib/phpchartdir.php");

# Create a Bar object of size 360 x 300 pixels
    $c = new XYChart(810, 390);
    
        $c->addTitle($display_date.' / '.$display_org_type.' / '.$display_geo);

# Set the plotarea at (30, 20) and of size 200 x 200 pixels
    $c->setPlotArea(40, 10, 640, 280, 0xE9FAE7,0xffffff);

 $barLayerObj = $c->addBarLayer($Numberofsearches, 0x8fc28a);
 $barLayerObj->set3D(); 
 $barLayerObj->setBarShape(CircleShape);
 
# Set the labels on the x axis.
$c->xAxis->setLabels($OrgDetails);
 $c->xAxis->setLabelStyle("Arial", 8, TextColor,30);

# Add a title to the y axis
$c->yAxis->setTitle("Searches");

$filename  = $path."/provider/charts/defaultimages/".$imagename;

$c->makeChart($filename);
?>