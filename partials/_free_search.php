<?php  session_start();
include_once 'dbcon.php';
$_date=time();
 
$csvfile="/var/www/charts/freesearch".$_date.".csv";
$_SESSION['csvfile']=$csvfile;

$geoselection =$_POST['my_county'];
$zipcode=$_POST['text_value_zip'];
$countyvalue=$_POST['county_value']; 
$state=$_POST['state_value'];

if (isset($_SESSION['consumer']['itconsumer_id'])){
    $consumer_id=$_SESSION['consumer']['itconsumer_id'];
   } else {$consumer_id='00000';
   }

$qry_id='select nextval(\'techmatcher.mh_search_id_seq\')';
 $search_id_qry=pg_query($qry_id);
 $search_id_val = pg_result($search_id_qry,0,0);
 
 if ($geoselection=='ZipCode') {$countyvalue=''; $statevalue='';}
 if ($geoselection=='County') {$zipcode='';}

 
 if ($geoselection=='ZipCode' && $zipcode=='') { 
   exit( 'Ooops! You selected a Zip match but did not give a Zip Code.');
   } else if ($geoselection=='County' && $countyvalue=='') { 
   exit('Ooops! You selected a County match but did not give a County.');
   } else if ($geoselection=='County' && $state=='') { 
   exit( 'Ooops! You selected a County match but did not give a State.');
   }
 
 $qry_id='select count(*),  service_territory from techmatcher.geographylookup where zipcode=$1 or (upper(trim(countyname))=upper(trim($2)) and Statecode=$3) group by service_territory';
 $check_geo_qry=pg_query_params($qry_id,array($zipcode,$countyvalue,$state));
 $check_geo_val = pg_fetch_array($check_geo_qry);
  
  
 if($check_geo_val['count']<1) {
		if ($geoselection=='ZipCode') {
		 exit ('Sorry, but we cannot find that zip in our database.  Are you sure it is valid?  Perhaps you can try a county match instead.'); 
		 } 	else  { 
		 exit ('Sorry, but we cannot find that County and State in our database.  Are you sure it is valid? Check it and try again.'); 
		 }
    } else {  if ($check_geo_val['service_territory'] =='f') {
      exit ("Bummer! We want to provide you a match, but you are looking outside our current service territory. Drop us a line and we'll build out there as quickly as we can.");
        }
  }
  
 if ($geoselection=='ZipCode') {$search_str=$zipcode;} else {$search_str= $countyvalue.$state;}
  
$match_qry="select techmatcher.makevariablematch('".$consumer_id."','". $geoselection."','".$search_str."','".$search_id_val."')";
 $search_result=pg_query($match_qry);
 $search_result_val = pg_result($search_result,0,0);
 
 if  ( $search_result_val =='t') {
 



		 $qry_csv='select count(distinct matchhistory.serviceprovider_id), sum(services) services_count, sum(skills) skills_count from techmatcher.providerskills_service_counts right Join techmatcher.matchhistory 
		 on (providerskills_service_counts.serviceprovider_id=matchhistory.serviceprovider_id) where search_id=$1';
 
 		$csv_get=pg_query_params($qry_csv,array($search_id_val));
 		 
 

		$fp = fopen($csvfile, "w");
 

		 if($csv_get != false) {
			while($rs = pg_fetch_assoc($csv_get)) {
				$matchdate = array();
				foreach($rs as $value) {
					array_push($matchdate,$value);
				}
				fputcsv($fp, $matchdate);
			}
			fclose($fp);
			$result_var=true;
		 }else {
			fclose($fp);
			$result_var=false;
		 }
        echo 'OK';
 } else {echo 'Sorry we dont have a match for that entry.  Try a different location.';}
?>