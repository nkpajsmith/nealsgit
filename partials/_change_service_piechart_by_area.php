<?php session_start();
include_once "dbcon.php";
include_once "sp_charts.php";
include_once "common_functions.php";

$path = $DOCROOT;
if(isset($_POST['first_sele'])){
    $_date = $_POST['first_sele'];
    $_geo_area=$_POST['geo_area'];
}else{
    $_date = 'currentmonth';
    $_geo_area='county';
}




if ($_geo_area=="zipcode"){$display_geo='in My Zip Code';}
if ($_geo_area=="city"){$display_geo='in My City';}
if ($_geo_area=="county"){$display_geo='in My County';}
if ($_geo_area=="state"){$display_geo='in My State';}

if ($_date=='currentquarter'){$display_date='Current Quarter';} else
if ($_date=='lastquarter'){$display_date='Last Quarter';} else
if ($_date=='currentweek'){$display_date='Current Week';}
if ($_date=='lastweek'){$display_date='Last Week';} else
if ($_date=='currentmonth'){$display_date='Current Month';} else
if ($_date=='lastmonth'){$display_date='Last Month';} else
if ($_date=='currentyear'){$display_date='Current Year';} else
if ($_date=='lastyear'){$display_date='Last Year';}

$_SESSION['selected_value'] = $_date;

$csvfile="/var/www/charts/gen_pop_area_pie".$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$data = 0;
$imagename= "";
$count= "";

$imagename = "pie_popularsearchesby_area.png";


$services = array();
$searches = array();  

$res_by_popularity = get_popular_services($_date, $_geo_area,$_SESSION['provider']['serviceprovider_id']);

$row = 0; 
$num=0;

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
   $c->addTitle($display_date.' '.$display_geo);

# Set the color palette
$colors = array(0x378a30,0x71cb68,0x276a21,0x7bb372,0xe8fee7,0x5d9758,0x355e72,0x6699b6,0x6a9db8,0x7fb0ce,0x95c8e5,0x699cb9,0xd47710,0xde8a30,0xd37108,0xd29039,0xf29e43,0xee7d05);

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
    
 $filename  = $path."/provider/charts/tempimages/".$imagename;
    
 $c->makeChart($filename);
?>