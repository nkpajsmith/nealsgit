<?php
include_once '../dao/dbcon.php';
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

$path = $DOCROOT;

if(isset($_POST['first_sele'])) {
    $_date = $_POST['first_sele'];
    if ($_date=='currentquarter'){$display_date='Current Quarter';} else
	   if ($_date=='lastquarter'){$display_date='Last Quarter';} else
	   if ($_date=='currentweek'){$display_date='Current Week';}
	   if ($_date=='lastweek'){$display_date='Last Week';} else
	   if ($_date=='currentmonth'){$display_date='Current Month';} else
	   if ($_date=='lastmonth'){$display_date='Last Month';} else
	   if ($_date=='currentyear'){$display_date='Current Year';} else
	   if ($_date=='lastyear'){$display_date='Last Year';}
}else {
    $_date = 'currentquarter';
    $display_date = 'Current Quarter';
}

if(isset($_POST['geo_area'])) {
    $geo_area = $_POST['geo_area'];
    if ($geo_area== "zipcode"){$display_geo='Zip Code';} else
    if ($geo_area=="city") {$display_geo='City';} else
    if ($geo_area=="county") {$display_geo='County';} else
    if ($geo_area=="state") {$display_geo='State';}
}else {
    $geo_area = 'county';
    $display_geo='County';
}




$_SESSION['selected_value'] = $_date;
$_SESSION['geo_area'] = $geo_area;

$data = 0;
$imagename= "";
$counter= "";
$provid = $_SESSION['provider']['serviceprovider_id'];

$imagename = "provider_".$provid."_geo_default.png";

$csvfile="/var/www/charts/gengeo". $provid.'_'.$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$record = get_users_in_geography($_date,$_SESSION['geo_area'], $provid );

$row = 0; 
$num=0;

$matchdate = array();
$count = array();

if (($handle = fopen($csvfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++) {
        if ($c %2) {        
            array_push($count,$data[$c]);} else{
            array_push($matchdate,$data[$c]);}
        }
    }
    fclose($handle);
    }  else
    echo "Error";
    
array_shift($count);
array_shift($matchdate);

    require_once("/var/www/ChartDirector/lib/phpchartdir.php");
# Create a XYChart object of size 250 x 250 pixels
    $c = new XYChart(780, 390);

# Set the plotarea at (30, 20) and of size 200 x 200 pixels
    $c->setPlotArea(40, 10, 700, 290, 0xE9FAE7,0xffffff);

# Add a title to the line chart
    $c->addTitle($display_date.' / '.$display_geo);

# Add a line chart layer using the given data
    $lineObj = $c->addLineLayer($count,0xe17513);
    $lineObj->set3D();
    
$c->yAxis->setTickDensity(30);
$c->xAxis->setTickDensity(75);

# Set the labels on the x axis.
    $c->xAxis->setLabels($matchdate);

    $labelsObj = $c->xAxis->setLabels($matchdate);

    # Add a title to the y axis
    $c->yAxis->setTitle("Searches");

    # Add a title to the x axis
    $c->xAxis->setTitle(" by Day");
    
    $labelsObj = $c->xAxis->setLabels($matchdate);
    $labelsObj->setFontAngle(70);
    $labelsObj->setFontStyle("arial.ttf");
    $labelsObj->setFontSize(9);

     $filename  = $path."/provider/charts/tempimages/".$imagename;

    $c->makeChart($filename);
?>