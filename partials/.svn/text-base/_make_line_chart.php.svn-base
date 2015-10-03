<?php 
include_once "dbcon.php";
include_once "sp_charts.php";
include_once "common_functions.php";

$path = $DOCROOT;
$_date = 'lastquarter'; //default value
$display_date="Last Quarter";
$_SESSION['selected_value'] = $_date;
$csvfile="/var/www/charts/genlinedata_".$_date.".csv";

$_SESSION['csvfile']=$csvfile;
 $data = 0;

$count= "";
$imagename = "provider__glob_statistics_default.png";


$record = get_no_of_searches_by_day($_date, $provid);

$matchdate = array();
$count = array();
 
$row = 0; 
$num=0;
 
if (($handle = fopen($csvfile,"r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
//        echo "<p> line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c< $num; $c++) {
        if ($c %2) {        
            array_push($count,$data[$c]);} else{
            array_push($matchdate,$data[$c]);}
        }
    }
    fclose($handle);
    }

array_shift($count);
array_shift($matchdate);

//  echo "matchdate";
//       print_r($matchdate);
//      print_r($count);

 
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


$filename  = $path."/provider/charts/defaultimages/".$imagename;

$c->makeChart($filename);

?>
