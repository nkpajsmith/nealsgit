<?php 
include_once "dbcon.php";
include_once "sp_charts.php";
include_once "common_functions.php";



$path = $DOCROOT;
$_date = 'lastyear';
$display_date="Last Year";

$provider_id = $_SESSION['provider']['serviceprovider_id'];
$csvfile="/var/www/charts/genpie_". $_date.".csv";
$_SESSION['csvfile']=$csvfile;

$imagename= "";
$count= "";
$imagename=  "pie_popularsearches.png";
$row = 0; 
$num=0;
$services = array();
$searches = array();  

$res_by_popularity = get_search_by_popularity($_date, $provider_id);

if (($handle = fopen($csvfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++) {
        if ($c %2) {   
        array_push($searches,$data[$c]);
        } else {
        array_push($services,$data[$c]);
        }
        }
 }  
}

require_once("/var/www/ChartDirector/lib/phpchartdir.php");


# Create a PieChart object of size 360 x 300 pixels
    $c = new PieChart(770, 390);

# Set the center of the pie at (180, 140) and the radius to 100 pixels
    $c->setPieSize(470, 200, 180);

# Add a title to the pie chart
   $c->addTitle($display_date);

# Set the color palette
$colors = array( 0x378a30,0x71cb68,0x276a21,0x7bb372,0xe8fee7,0x5d9758,0x355e72,0x6699b6,0x6a9db8,0x7fb0ce,0x95c8e5,0x699cb9,0xd47710,0xde8a30,0xd37108,0xd29039,0xf29e43,0xee7d05);

# Set the font
$c->setLabelStyle("arial.ttf", 10);


# Set the sector colors
$c->setColors2(DataColor, $colors);

# Set the gradient 
$c->setSectorStyle(LocalGradientShading);

# Draw the pie in 3D
    $c->set3D();

    $c->addLegend(0,0);

    $c->setLabelFormat("{percent}%");

# Set the pie data and the pie labels
    $c->setData($searches,$services);

# Explode the 1st sector (index = 0)
    $c->setExplode(0);

 $filename  = $path."/provider/charts/defaultimages/".$imagename;

$c->makeChart($filename);
?>
