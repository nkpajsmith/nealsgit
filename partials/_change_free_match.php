<?php 
session_start();
include_once "dbcon.php";

$path = $DOCROOT; 

$counts = array();
$row = 0; 
$num=0;
$time=time();



$imagename='free_match'.$time.'.png';
$matchname=Array('Service Providers',' Services',' Skills');
  
if (($handle =  fopen($_SESSION['csvfile'], "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c< $num; $c++) {
         array_push($counts,$data[$c]); 
#for   
       } 
# While      
        }
    fclose($handle);
    }  else
    {echo "Error";}


require_once("/var/www/ChartDirector/lib/phpchartdir.php");

# Create a Bar object of size 360 x 300 pixels
    $c = new XYChart(500, 390);
    
        $c->addTitle('Service Providers Available by Type of Match');

# Set the plotarea at (30, 20) and of size 200 x 200 pixels
    $c->setPlotArea(20, 10, 440, 280, 0xE9FAE7,0xffffff);

 $barLayerObj = $c->addBarLayer($counts, 0x8fc28a);
 $barLayerObj->set3D(); 
 $barLayerObj->setBarShape(CircleShape);
 
# Set the labels on the x axis.
$c->xAxis->setLabels($matchname);
 $c->xAxis->setLabelStyle("Arial", 8, TextColor,30);

# Add a title to the y axis
$c->yAxis->setTitle("Service Providers Available");


$filename  = $path."/consumer/charts/".$imagename;
$_SESSION['imagename']=$imagename;
$c->makeChart($filename);

?>
