<?php 
include_once '../dao/dbcon.php';
include_once "../dao/sp_charts.php";
include_once "../includes/common_functions.php";

$path = $DOCROOT;


if(isset($_POST['first_sele'])){
    $_date = $_POST['first_sele'];
    if ($_date=='currentquarter'){$display_date='Current Quarter';} else
    if ($_date=='lastquarter'){$display_date='Last Quarter';} else
    if ($_date=='currentweek'){$display_date='Current Week';}
    if ($_date=='lastweek'){$display_date='Last Week';} else
    if ($_date=='currentmonth'){$display_date='Current Month';} else
    if ($_date=='lastmonth'){$display_date='Last Month';} else
    if ($_date=='currentyear'){$display_date='Current Year';} else
    if ($_date=='lastyear'){$display_date='Last Year';}
}else{
    $_date = 'currentquarter';
    $display_date = 'Current Quarter';
}

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


if(isset($_POST['searchtype']))
{
    $_searchtype = $_POST['searchtype'];
   if ($_searchtype=='Any')
    {
    $display_searchtype='All Types of Searches';
    $SpecificSkills='SpecificSkills';
    $ZipVariable='ZipVariable';
    $CountyVariable='CountyVariable';
    $ServiceCategory='Service Category';    
    } 
    else
     if ($_searchtype=='Geography')
      {
        $display_searchtype='Geographic';
        $SpecificSkills='';
        $ZipVariable='ZipVariable';
        $CountyVariable='CountyVariable';
        $ServiceCategory='';
       } 
        else
         if ($_searchtype=='Services')
         { 
           $display_searchtype='Services';
           $SpecificSkills='';
           $ZipVariable='';
           $CountyVariable='';
           $ServiceCategory='Service Category';
         } 
         else
           if ($_searchtype=='Skills')
            {
             $display_searchtype='Skills';
		     $SpecificSkills='SpecificSkills';
		     $ZipVariable='';
		     $CountyVariable='';
		     $ServiceCategory='';
		     } 
    } else {
    $_searchtype = 'Any';
    $display_searchtype = 'All Types of Searches';
    $SpecificSkills='SpecificSkills';
    $ZipVariable='ZipVariable';
    $CountyVariable='CountyVariable';
    $ServiceCategory='Service Category';  }
    
$imagename= "";
$counter= "";

$provider_id = $_SESSION['provider']['serviceprovider_id'];

$_SESSION['selected_value'] = $_date;

$csvfile="/var/www/charts/gen_skillservicesearches_". $provider_id.'_'.$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$data = 0;

$imagename = "pie_".$provider_id.'_skillservicesearches.png';

$services = array();
$searches = array();  

$row = 0; 
$num=0;

$res_skills_services = get_skills_services_result($_date,$geo_area,$provider_id, $SpecificSkills, $ZipVariable, $CountyVariable, $ServiceCategory);

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
   $c->addTitle($display_date. ' / '.$display_geo. ' / '.$display_searchtype);

# Set the color palette
$colors = array(0x378a30,0x71cb68,0x276a21,0x7bb372,0xe8fee7,0x5d9758,0x355e72,0x6699b6,0x6a9db8,0x7fb0ce,0x95c8e5,0x699cb9,0xd47710,0xde8a30,0xd37108,0xd29039,0xf29e43,0xee7d05);


# Set the font
$c->setLabelStyle("arial.ttf", 9);

# Set the sector colors
$c->setColors2(DataColor, $colors);

# Set the gradient 
$c->setSectorStyle(LocalGradientShading);

# Draw the pie in 3D
    $c->set3D();
    $c->addLegend(0,30);
    $c->setLabelFormat("{percent}%");

# Set the pie data and the pie labels
    $c->setData($searches,$services);

# Explode the 1st sector (index = 0)
    $c->setExplode(0);
    
 $filename  = $path."/provider/charts/tempimages/".$imagename;
 
 $c->makeChart($filename);
?>