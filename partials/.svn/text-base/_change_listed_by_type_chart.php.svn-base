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

$provider_id = $_SESSION['provider']['serviceprovider_id'];
$_SESSION['selected_value'] = $_date;

$csvfile="/var/www/charts/genpielisted_". $provider_id.'_'.$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$data = 0;
$imagename= "";
$count= "";

$imagename = "pie_".$provider_id.'_listedinsearches.png';


$matchtype = array();
$count = array();  

$res_listed_type = get_listed_by_type($_date, $provider_id);

$row = 0; 
$num=0;

if (($handle = fopen($csvfile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++) {
        if ($c %2) {   
        array_push($count,$data[$c]);
        } else {
        array_push($matchtype,$data[$c]);
        }
       } 
 }  
}
    require_once("/var/www/ChartDirector/lib/phpchartdir.php");

# Create a PieChart object of size 360 x 300 pixels
    $c = new PieChart(780, 390);

# Set the center of the pie at (180, 140) and the radius to 100 pixels
    $c->setPieSize(410, 215, 195);

# Add a title to the pie chart
   $c->addTitle($display_date);

# Set the color palette
$colors = array( 0x3e8e35,0x8fc28a,0x2c7524,0xe38919,0xf8930d,0xA86916,0xC2965D);

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
    $c->setData($count,$matchtype);

# Explode the 1st sector (index = 0)
    $c->setExplode(0);
    
 $filename  = $path."/provider/charts/tempimages/".$imagename;
 
 $c->makeChart($filename);
?>