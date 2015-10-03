<?php 
include_once "../dao/dbcon.php";
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

$path = $DOCROOT;

if(isset($_POST['first_sele'])) {
    $_date = $_POST['first_sele'];
}else {
    $_date = 'lastquarter'; //default value
}
if ($_date=='currentquarter'){$display_date='Current Quarter';} else
if ($_date=='lastquarter'){$display_date='Last Quarter';} else
if ($_date=='currentweek'){$display_date='Current Week';}
if ($_date=='lastweek'){$display_date='Last Week';} else
if ($_date=='currentmonth'){$display_date='Current Month';} else
if ($_date=='lastmonth'){$display_date='Last Month';} else
if ($_date=='currentyear'){$display_date='Current Year';} else
if ($_date=='lastyear'){$display_date='Last Year';}


$provid = $_SESSION['provider']['serviceprovider_id'];
$_SESSION['selected_value'] = $_date;
$csvfile="/var/www/charts/genlinedata_".$provid."_".$_date.".csv";
$_SESSION['csvfile']=$csvfile;
$data = 0;
$imagename= "";
$count= "";

$imagename = "provider_".$_SESSION['provider']['serviceprovider_id']."_glob_statistics_default.png";



$record = get_no_of_searches_by_day($_date, $provid);

$matchdate = array();
$count = array();
 
$row = 0; 
$num=0;
 
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
    
# Add a title to the pie chart
    $c->addTitle($display_date);

# Add a line chart layer using the given data
    $lineObj = $c->addLineLayer($count,0x70e17513);
    $lineObj->set3D();

$c->yAxis->setTickDensity(30);
$c->xAxis->setTickDensity(75);

# Set the labels on the x axis.
    $c->xAxis->setLabels($matchdate);

    # Add a title to the y axis
    $c->yAxis->setTitle("Searches");

    # Add a title to the x axis
    $c->xAxis->setTitle("Days");

    $labelsObj = $c->xAxis->setLabels($matchdate);
    $labelsObj->setFontAngle(70);
    $labelsObj->setFontStyle("arial.ttf");
    $labelsObj->setFontSize(9);


$filename  = $path."/provider/charts/tempimages/".$imagename;


$c->makeChart($filename);

?>
