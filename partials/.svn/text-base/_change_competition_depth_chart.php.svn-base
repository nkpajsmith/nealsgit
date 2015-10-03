<?php 
include_once '../dao/dbcon.php';
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

$path = $DOCROOT;


if(isset($_POST['geo_area'])){
    $geo_area = $_POST['geo_area'];
    if ($geo_area== "zipcode"){$display_geo='Zip Code';} else
    if ($geo_area=="city") {$display_geo='City';} else
    if ($geo_area=="county") {$display_geo='County';} else
    if ($geo_area=="state") {$display_geo='State';}
    
}else{
    $geo_area = 'county';
    $display_geo='County';
}

$imagename= "bar".$_SESSION['provider']['serviceprovider_id'].'_competition_depth.png';
$provider_id=$_SESSION['provider']['serviceprovider_id'];


$csvfile="/var/www/charts/gen_competition_depth_". $provider_id.'_'.$display_geo.".csv";
$_SESSION['csvfile']=$csvfile;

$res = get_competition_depth($geo_area);

$services = array();
$competitors = array();  

$row = 0; 
$num=0;
if (($handle = fopen($csvfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++) {
        if ($c %2) {   
        array_push($competitors,$data[$c]);
        } else {
        array_push($services,$data[$c]);
        }
       } 
 }  
}

require_once("/var/www/ChartDirector/lib/phpchartdir.php");

    $c = new XYChart(780, 390);

    # Set the plotarea at (30, 20) and of size 200 x 200 pixels
    $c->setPlotArea(40, 5, 750, 200, 0xE9FAE7,0xffffff);
    
# Add a title to the pie chart
    $c->addTitle($display_geo);

# Add a line chart layer using the given data
 $barLayerObj = $c->addBarLayer($competitors,0x70e17513);
 $barLayerObj->set3D(); 
 $barLayerObj->setBarShape(CircleShape);

# Set the labels on the x axis.
    $c->xAxis->setLabels($services);
     $c->xAxis->setLabelStyle("Arial", 8, TextColor,45);

    # Add a title to the y axis
    $c->yAxis->setTitle("Count of Service Providers");

    # Add a title to the x axis
    $c->xAxis->setTitle("Services");


   $filename  = $path."/provider/charts/tempimages/".$imagename;

  
    $c->makeChart($filename);

?>