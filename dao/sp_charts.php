<?php include_once 'dbcon.php';

//new method with modified query...
function get_search_by_day_dates() {
    $qry = "SELECT matchdate, count
FROM techmatcher.searchhistorycount_vw
order by matchdate";
$result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function get_no_of_searches_by_day($_date, $provid) {
$file = "/var/www/charts/genlinedata_". $provid.'_'.$_date.'.csv';
$fp = fopen($file, "w");

$matchdate_str = $_date;
$qry = "SELECT case when '".$matchdate_str ."'::character varying in ('lastweek','currentweek','currentmonth','lastmonth','currentquarter','lastquarter') then
	                                 to_char(matchdate,'MM-DD-YYYY') when '".$matchdate_str ."'::character varying in ( 'currentyear','lastyear') then
	                    to_char(matchdate,'Mon-YYYY') End as match_date, sum(count) as count_of_searches FROM techmatcher.searchhistorycount_vw 
	                    where matchdate between techmatcher.startdate('".$matchdate_str ."'::character varying) AND techmatcher.enddate('".$matchdate_str ."'::character varying)
	         group by case when '".$matchdate_str ."'::character varying in ('lastweek','currentweek','currentmonth','lastmonth','currentquarter','lastquarter') then
	                                 to_char(matchdate,'MM-DD-YYYY') when '".$matchdate_str ."'::character varying in ( 'currentyear','lastyear') then to_char(matchdate,'Mon-YYYY') End,to_char(matchdate,'MM')
		        order by  to_char(matchdate,'MM')";
    
$result = pg_query_params($qry, array()) or die(pg_errormessage().$provid);
 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
return $result_var;
}

function match_type_and_date($start_date,$end_date,$match_types) {
    $qry="SELECT matchdate,count
            FROM techmatcher.searchhistorycountbytype_vw
            where matchdate between date $1 AND date $2 AND
            matchtype_id in ($3)";
    /*$qry="SELECT matchdate,count
            FROM techmatcher.searchhistorycountbytype_vw
            where matchdate between date '$start_date' AND date '$end_date' AND
            matchtype_id in ($match_types)";*/


    $result = pg_query_params($qry,array("$start_date","$end_date","$match_types")) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }

}
function get_results_from() {
    $qry="SELECT matchdate,
case when matchtypename= 'ZipCode' then sum(count) Else 0 End as HomeZipCodeMatchTotal
,case when matchtypename= 'County' then sum(count) Else 0 End as HomeCountyMatchTotal
,case when matchtypename= 'Skills' then sum(count) Else 0 End as SkillsMatchTotal
,case when matchtypename= 'Services' then sum(count) Else 0 End as ServicesMatchTotal
,case when matchtypename= 'SpecificSkills' then sum(count) Else 0 End as SpecificSkillsMatchTotal
,case when matchtypename= 'CountyVariable' then sum(count) Else 0 End as CountyVariableMatchTotal
,case when matchtypename= 'ZipVariable' then sum(count) Else 0 End as ZipVariableMatchTotal
,case when matchtypename= 'Service Category' then sum(count) Else 0 End as
ServiceCategoryMatchTotal
FROM techmatcher.searchhistorycountbytype_vw join techmatcher.matchtypelookup on
searchhistorycountbytype_vw.matchtype_id = matchtypelookup.matchtype_id
group by matchdate, matchtypename
order by matchdate";

    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }

}

function get_results_from_searches_and_skills($provider_id) {
    // $_SESSION['provider'][''];
    $qry="SELECT trim(serviceskillname) as Itemsinmyprofile,
countofsearches, providercount
FROM techmatcher.serviceprovidercompared_vw
where serviceprovider_id=$1
order by searchtype";

    $result = pg_query_params($qry,array($provider_id)) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

function find_categories($start_date,$end_date,$categories_types) {
    $qry="SELECT servicecategoryname,sumofcount
            FROM techmatcher.numberofservicesearchesbytype
            where matchdate between date $1 AND date $2 AND
            servicecategory_id in ($3)";
    /*$qry="SELECT servicecategoryname,sumofcount
            FROM techmatcher.numberofservicesearchesbytype
            where matchdate between date '$start_date' AND date '$end_date' AND
            servicecategory_id in ($categories_types)";*/


    $result = pg_query_params($qry,array("$start_date","$end_date","$categories_types")) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}



function number_of_skill_searches($start_date,$end_date,$skill_typezz) {
    $qry="SELECT trim(serviceskillname) as serviceskillname,sum(sumofcount)
            FROM techmatcher.numberofskillsearchesbytype
            
            where matchdate between date $1 AND date $2 AND
            serviceskill_id in ($3)
            group by trim(serviceskillname)";
    /*$qry="SELECT trim(serviceskillname) as serviceskillname,sum(sumofcount)
            FROM techmatcher.numberofskillsearchesbytype

            where matchdate between date '$start_date' AND date '$end_date' AND
            serviceskill_id in ($skill_typezz)
            group by trim(serviceskillname)";*/

    $result = pg_query_params($qry,array("$start_date","$end_date","$skill_typezz")) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }


}

function get_search_by_day_searches() {
    $qry = "SELECT count as num_searches
              FROM techmatcher.searchhistorycount_vw
              order by matchdate";
    //echo $qry;
    $result = pg_query_params($qry,array()) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}

//generic chart based on profiles not matches
function get_search_by_popularity($_date, $csvfile) {

$file = $csvfile;
$fp = fopen($file, "w");

    $qry = "SELECT 
	  servicecategories.servicecategoryname, 
	  count(itconsumer.itconsumer_id)
	FROM 
	  techmatcher.itconsumer, 
	  techmatcher.itconsumeranalogselected,
	  techmatcher.orgprofiledetails, 
	  techmatcher.orgdetailsneedservice, 
	  techmatcher.servicecategories
	WHERE 
	  itconsumer.itconsumer_id = orgprofiledetails.itconsumer_id AND
	  itconsumer.itconsumer_id=itconsumeranalogselected.itconsumer_id and
	  orgprofiledetails.orgdetail_id = orgdetailsneedservice.orgdetail_id AND
	  orgdetailsneedservice.servicecategory_id = servicecategories.servicecategory_id AND
	  itconsumeranalogselected.lastupdatedate between techmatcher.startdate($1) and techmatcher.enddate ($1)
	GROUP BY 
	  servicecategories.servicecategoryname
	Order by count(itconsumer.itconsumer_id) DESC";

$result = pg_query_params($qry, array($_date)) or die(pg_errormessage().$provid);
 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
return $result_var;
}

function get_search_by_activity() {
    $sp_id = $_SESSION['provider']['serviceprovider_id'];
    $qry = "SELECT  trim(serviceskillname) as Itemsinmyprofile,
                  countofsearches as num_searches, providercount as num_other_sp 
              FROM techmatcher.serviceprovidercompared_vw
              where serviceprovider_id=$1
              order by searchtype
              Limit 10";
    //echo $qry;
    $result = pg_query_params($qry,array($sp_id)) or die(pg_errormessage());
    if(pg_num_rows($result)>0) {
        return $result;
    } else {
        return false;
    }
}
//advanced line chart for subscribed providers.
function get_users_in_geography($_date,$geo_area,$provid) {

$file = "/var/www/charts/gengeo". $provid."_".$_date.".csv";
$fp = fopen($file, "w");

if ($geo_area=='county') 
{$query="select matchdate, sum(searches)
        from (SELECT matchdate,  count( search_id) searches, custadd.countyname, custadd.statecode
	FROM techmatcher.matchhistory, (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, 
	        techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	Where matchhistory.address_id=custadd.address_id
		and matchdate BETWEEN techmatcher.startdate( 'currentquarter' ) AND techmatcher.enddate( 'currentquarter' )
	Group by matchdate, custadd.countyname, custadd.statecode) custcount,
	(select distinct g.countyname, g.statecode from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.zipcode=g.zipcode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=".$provid." and address_deleted='f')  provadd
        where custcount.countyname =provadd.countyname 
		and custcount.statecode =provadd.statecode 
group by matchdate";}
elseif 
($geo_area=='city') 
{$query="select matchdate, sum(searches)
        from (SELECT matchdate,  count( search_id) searches, custadd.cityname, custadd.statecode
	FROM techmatcher.matchhistory, (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, 
	        techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	Where matchhistory.address_id=custadd.address_id
		and matchdate BETWEEN techmatcher.startdate( 'currentquarter' ) AND techmatcher.enddate( 'currentquarter' )
	Group by matchdate, custadd.cityname, custadd.statecode) custcount,
	(select distinct g.cityname, g.statecode from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.zipcode=g.zipcode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=".$provid." and address_deleted='f')  provadd
        where custcount.cityname =provadd.cityname 
		and custcount.statecode =provadd.statecode 
group by matchdate";}
elseif 
($geo_area=='state') 
{$query="select matchdate, sum(searches)
        from (SELECT matchdate,  count( search_id) searches, custadd.statecode
	FROM techmatcher.matchhistory, (select distinct a.address_id, g.statecode from techmatcher.address a, 
	        techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	Where matchhistory.address_id=custadd.address_id
		and matchdate BETWEEN techmatcher.startdate( 'currentquarter' ) AND techmatcher.enddate( 'currentquarter' )
	Group by matchdate,custadd.statecode) custcount,
	(select distinct g.statecode from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.zipcode=g.zipcode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=".$provid." and address_deleted='f')  provadd
        where custcount.statecode =provadd.statecode 
group by matchdate";}
elseif ($geo_area=='zipcode') 
{$query="select matchdate, sum(searches)
        from (SELECT matchdate,  count( search_id) searches, custadd.zipcode 
	FROM techmatcher.matchhistory, (select a.address_id, a.zipcode from techmatcher.address a, 
	        techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	Where matchhistory.address_id=custadd.address_id
		and matchdate BETWEEN techmatcher.startdate( 'currentquarter' ) AND techmatcher.enddate( 'currentquarter' )
	Group by matchdate, custadd.zipcode ) custcount,
	(select distinct a.zipcode  from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.zipcode=g.zipcode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=".$provid." and address_deleted='f')  provadd
        where  custcount.zipcode  =provadd.zipcode  
group by matchdate";}
        
$result = pg_query_params($query, array()) or die(pg_errormessage());
 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
return $result_var;
}

function get_skills_services_result($_date, $geo_area,$provider_id,$SpecificSkills,$ZipVariable,$CountyVariable,$ServiceCategory) {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");

    $result = pg_query_params("SELECT  'Skill'||' : '|| serviceskillname typeofsearch, count( search_id) numsearches
	  FROM techmatcher.search_no_result, techmatcher.matchtypelookup, techmatcher.itconsumeraddress, 
	  (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	  ,  (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g, techmatcher.serviceprovidertoaddress where a.zipcode=g.zipcode and serviceprovidertoaddress.address_id=a.address_id and serviceprovider_id=$2 and address_deleted='f')  provadd,
		 techmatcher.serviceskills
	Where search_no_result.matchtype_id=matchtypelookup.matchtype_id
		and search_no_result.itconsumer_id=itconsumeraddress.itconsumer_id
		and itconsumeraddress.address_id=custadd.address_id
		and custadd.statecode = provadd.statecode
	        and serviceskills.serviceskill_id=(case when search_no_result.additionalparameters between '00000' and '99999'  then search_no_result.additionalparameters::integer else NULL end)
		and matchtypename = $3
		and matchdate BETWEEN techmatcher.startdate($1) AND techmatcher.enddate($1)
	Group by  matchtypename,serviceskillname
	Union
	SELECT  case when matchtypename=$4 then 'Zip Code'||' : '||additionalparameters
							when matchtypename=$5 then 'County'||' : '||additionalparameters end
							typeofsearch, count( search_id) numsearches
	  FROM techmatcher.search_no_result, techmatcher.matchtypelookup, techmatcher.itconsumeraddress, (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	  ,  (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g, techmatcher.serviceprovidertoaddress where a.zipcode=g.zipcode and serviceprovidertoaddress.address_id=a.address_id and serviceprovider_id=$2 and address_deleted='f')  provadd
	Where search_no_result.matchtype_id=matchtypelookup.matchtype_id
		and search_no_result.itconsumer_id=itconsumeraddress.itconsumer_id
		and itconsumeraddress.address_id=custadd.address_id
		and custadd.statecode = provadd.statecode
		and matchtypename in ($4, $5)
                 and matchdate BETWEEN techmatcher.startdate($1) AND techmatcher.enddate($1)
	Group by  matchtypename,additionalparameters
	Union
	 SELECT  'Service'||' : '|| servicecategoryname typeofsearch,  count( search_id) numsearches
	  FROM techmatcher.search_no_result, techmatcher.matchtypelookup, techmatcher.itconsumeraddress, (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	  ,  (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g, techmatcher.serviceprovidertoaddress where a.zipcode=g.zipcode and serviceprovidertoaddress.address_id=a.address_id and serviceprovider_id=$2 and address_deleted='f')  provadd
	      ,  techmatcher.servicecategories
	Where search_no_result.matchtype_id=matchtypelookup.matchtype_id
		and search_no_result.itconsumer_id=itconsumeraddress.itconsumer_id
		and itconsumeraddress.address_id=custadd.address_id
	       and custadd.statecode = provadd.statecode
	            and matchtypename = $6
		and servicecategories.servicecategory_id=(case when search_no_result.additionalparameters between '00000' and '99999'  then search_no_result.additionalparameters::integer else NULL end)
		and matchdate BETWEEN techmatcher.startdate($1) AND techmatcher.enddate($1)
	Group by  matchtypename,servicecategoryname
	 order by  typeofsearch", array($_date,$provider_id,$SpecificSkills,$ZipVariable,$CountyVariable,$ServiceCategory));

 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
}
function organization_type_categories() {
    $qry = pg_query_params("select orgdetailcategory_sdesc from (
(Select 'Any' as "."orgdetailcategory_sdesc".", '0' as "."profileselectionorder"." from techmatcher.orgdetailscategory limit 1)
Union 
(Select orgdetailcategory_sdesc, profileselectionorder  from techmatcher.orgdetailscategory)) as temp
where profileselectionorder <5
order by orgdetailcategory_sdesc",array());
    $org_types=array();
    while ($types= pg_fetch_assoc($qry)) {
        $org_types[] = $types;
    }
    return $org_types;
}

function get_area_details($data, $geo_area,$org_type) {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");

    $result = pg_query_params("SELECT  trim(orgdetailname) organization_type_detail, count( search_id) numsearches
	  FROM techmatcher.matchhistory,(select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g where a.zipcode=g.zipcode) custadd
	  ,  (select a.address_id, a.zipcode, g.cityname, g.countyname, g.statecode from techmatcher.address a, techmatcher.geographylookup g, techmatcher.serviceprovidertoaddress 
	  where a.zipcode=g.zipcode and a.address_id=serviceprovidertoaddress.address_id and serviceprovider_id=$2 and address_deleted='f')  provadd
	   , techmatcher.orgprofiledetails, techmatcher.orgdetails, techmatcher.orgdetailscategory
	Where matchhistory.address_id=custadd.address_id
		and matchhistory.itconsumer_id=orgprofiledetails.itconsumer_id
		and orgdetails.orgdetailcategory_id=orgdetailscategory.orgdetailcategory_id
		and orgdetails.orgdetail_id=orgprofiledetails.orgdetail_id
		and ". $geo_area."
		and matchdate BETWEEN techmatcher.startdate($1) AND techmatcher.enddate($1)
	   and  case when $3='Any' then 'Any'='Any' else orgdetailcategory_sdesc =  $3 end
	Group by
	 orgdetailcategory_sdesc ,orgdetails.orgdetail_id, trim(orgdetailname)
	 order by  orgdetailcategory_sdesc,orgdetails.orgdetail_id", array($data,$_SESSION['provider']['serviceprovider_id'],$org_type));

 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
}

// popular services related to my area
function get_popular_services($_date, $geo_area, $provid) {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");


if ($geo_area=='zipcode') {
$qry = "SELECT 
	  servicecategories.servicecategoryname, 
	  count(itconsumer.itconsumer_id)
	FROM 
	  techmatcher.itconsumer 
	  join techmatcher.itconsumeranalogselected on (itconsumer.itconsumer_id=itconsumeranalogselected.itconsumer_id 
	  and itconsumeranalogselected.lastupdatedate between techmatcher.startdate('".$_date."') and techmatcher.enddate ('".$_date."'))
	  join techmatcher.orgprofiledetails on (itconsumer.itconsumer_id = orgprofiledetails.itconsumer_id)
	  join techmatcher.orgdetailsneedservice on (orgprofiledetails.orgdetail_id = orgdetailsneedservice.orgdetail_id)
	  join techmatcher.servicecategories on (orgdetailsneedservice.servicecategory_id = servicecategories.servicecategory_id )
	  join techmatcher.itconsumeraddress on (itconsumer.itconsumer_id=itconsumeraddress.itconsumer_id and  itconsumeraddress.address_deleted='f' )
	  join techmatcher.address on (itconsumeraddress.address_id=address.address_id)
	  join (select distinct a.zipcode  from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.zipcode=g.zipcode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=$1 and address_deleted='f')  provadd
	        on (address.zipcode=provadd.zipcode)
	   GROUP BY 
	  servicecategories.servicecategoryname
Order by count(itconsumer.itconsumer_id) DESC";}
elseif 
($geo_area=='county'){
$qry = "SELECT 
	  servicecategories.servicecategoryname, 
	  count(itconsumer.itconsumer_id)
	FROM 
	  techmatcher.itconsumer 
	  join techmatcher.itconsumeranalogselected on (itconsumer.itconsumer_id=itconsumeranalogselected.itconsumer_id 
	        and itconsumeranalogselected.lastupdatedate between techmatcher.startdate('".$_date."') and techmatcher.enddate ('".$_date."'))
	  join techmatcher.orgprofiledetails on (itconsumer.itconsumer_id = orgprofiledetails.itconsumer_id)
	  join techmatcher.orgdetailsneedservice on (orgprofiledetails.orgdetail_id = orgdetailsneedservice.orgdetail_id)
	  join techmatcher.servicecategories on (orgdetailsneedservice.servicecategory_id = servicecategories.servicecategory_id )
	  join techmatcher.itconsumeraddress on (itconsumer.itconsumer_id=itconsumeraddress.itconsumer_id and  itconsumeraddress.address_deleted='f' )
	  join techmatcher.address on (itconsumeraddress.address_id=address.address_id)
	  join (select distinct coalesce(a.county,g.countyname) as county, a.state  from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
		        techmatcher.geographylookup g 
		        where a.zipcode=g.zipcode
		        and a.address_id=t.address_id
	        and t.serviceprovider_id=$1 and address_deleted='f')  provadd
	        on (address.county=provadd.county
	        and address.state=provadd.state)
	   GROUP BY 
	  servicecategories.servicecategoryname
Order by count(itconsumer.itconsumer_id) DESC";}
elseif 
($geo_area=='city'){
$qry = "SELECT 
	  servicecategories.servicecategoryname, 
	  count(itconsumer.itconsumer_id)
	FROM 
	  techmatcher.itconsumer 
	  join techmatcher.itconsumeranalogselected on (itconsumer.itconsumer_id=itconsumeranalogselected.itconsumer_id 
	        and date_trunc('day',itconsumeranalogselected.lastupdatedate) between techmatcher.startdate('".$_date."') and techmatcher.enddate ('".$_date."'))
	  join techmatcher.orgprofiledetails on (itconsumer.itconsumer_id = orgprofiledetails.itconsumer_id)
	  join techmatcher.orgdetailsneedservice on (orgprofiledetails.orgdetail_id = orgdetailsneedservice.orgdetail_id)
	  join techmatcher.servicecategories on (orgdetailsneedservice.servicecategory_id = servicecategories.servicecategory_id )
	  join techmatcher.itconsumeraddress on (itconsumer.itconsumer_id=itconsumeraddress.itconsumer_id and  itconsumeraddress.address_deleted='f' )
	  join techmatcher.address on (itconsumeraddress.address_id=address.address_id)
	  join (select distinct coalesce(a.city,g.cityname) as city, a.state  from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
		        techmatcher.geographylookup g 
		        where a.zipcode=g.zipcode
		        and a.address_id=t.address_id
	        and t.serviceprovider_id=$1 and address_deleted='f')  provadd
	        on (address.city=provadd.city
	        and address.state=provadd.state)
	   GROUP BY 
	  servicecategories.servicecategoryname
Order by count(itconsumer.itconsumer_id) DESC";}
elseif 
($geo_area=='state'){
$qry = "SELECT 
	  servicecategories.servicecategoryname, 
	  count(itconsumer.itconsumer_id)
	FROM 
	  techmatcher.itconsumer 
	  join techmatcher.itconsumeranalogselected on (itconsumer.itconsumer_id=itconsumeranalogselected.itconsumer_id 
	        and itconsumeranalogselected.lastupdatedate between techmatcher.startdate('".$_date."') and techmatcher.enddate ('".$_date."') )
	  join techmatcher.orgprofiledetails on (itconsumer.itconsumer_id = orgprofiledetails.itconsumer_id)
	  join techmatcher.orgdetailsneedservice on (orgprofiledetails.orgdetail_id = orgdetailsneedservice.orgdetail_id)
	  join techmatcher.servicecategories on (orgdetailsneedservice.servicecategory_id = servicecategories.servicecategory_id )
	  join techmatcher.itconsumeraddress on (itconsumer.itconsumer_id=itconsumeraddress.itconsumer_id and  itconsumeraddress.address_deleted='f' )
	  join techmatcher.address on (itconsumeraddress.address_id=address.address_id)
	  join (select distinct a.state  from techmatcher.address a, techmatcher.serviceprovidertoaddress t, 
	        techmatcher.geographylookup g 
	        where a.state=g.statecode
	        and a.address_id=t.address_id
	        and t.serviceprovider_id=$1 and address_deleted='f')  provadd
           on (address.state=provadd.state)
	   GROUP BY 
	  servicecategories.servicecategoryname
Order by count(itconsumer.itconsumer_id) DESC";}

$result = pg_query_params($qry, array($provid));

 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
return $result_var;
}

function get_listed_by_type($date_range, $provider_id) {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");

    $result = pg_query_params("SELECT  case when matchname='CountyVariable'
              then 'Customer Selected County'
              when matchname='Intersection'
                then 'Match based on Multiple Selections'
              when matchname='ZipVariable'
				then 'Customer Selected Zip Code'
              when matchname='ZipCode'
				then 'Same Zip Code'
		  when matchname='Skills'
				then 'Skills from a Customer Profile'
      when matchname='SpecificSkills'
				then 'Customer Selected Skill'		
              else matchname
                end  AS matchtype
    , count(matchhistory_id)
        FROM techmatcher.matchhistory
        where serviceprovider_id =$1
        and matchdate between techmatcher.startdate($2) and techmatcher.enddate($2)
        group by matchname
        order by matchname", array($provider_id,$date_range));

 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
}

function get_competition_depth($geo_area) {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");
if ($geo_area=='zipcode') {
$querytxt="Select servicecategoryname, sum(numcomps) competitors from 
	(SELECT distinct
		  address.zipcode
		FROM 
		  techmatcher.serviceprovider join techmatcher.serviceprovidertoaddress on (serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id 
		  and serviceprovider.serviceprovider_id=$1) 
		   join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id 	 and serviceprovidertoaddress.address_deleted !='t')
		  ) tempqry1 
	JOIN	  
	(SELECT 
		  count(serviceprovider.serviceprovider_id) numcomps, 
		  serviceprovidersofferservices.servicecategory_id,
        	  address.zipcode
		FROM 
		  techmatcher.serviceprovider, 
		  techmatcher.serviceprovidersofferservices, 
		  techmatcher.serviceprovidertoaddress join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id)
		WHERE 
		  serviceprovider.serviceprovider_id = serviceprovidersofferservices.serviceprovider_id AND
		  serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id and
		  serviceprovidersofferservices.service_deleted != True and
		  serviceprovidersofferservices.servicecategory_id>1	  
		  group by serviceprovidersofferservices.servicecategory_id,
		  address.zipcode
 )
  tempqry2 on (tempqry1.zipcode=tempqry2.zipcode)
  join techmatcher.servicecategories on (tempqry2.servicecategory_id=servicecategories.servicecategory_id)
	group by servicecategoryname";}
elseif ($geo_area=='county') {
$querytxt="Select servicecategoryname, sum(numcomps) competitors from 
	(SELECT distinct
		  address.county,
		  address.state
		FROM 
		  techmatcher.serviceprovider join techmatcher.serviceprovidertoaddress on (serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id 
		  and serviceprovider.serviceprovider_id=$1) 
		   join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id  and serviceprovidertoaddress.address_deleted !='t')
		  ) tempqry1 
	JOIN	  
	(SELECT 
		  count(serviceprovider.serviceprovider_id) numcomps, 
		  serviceprovidersofferservices.servicecategory_id,
          address.county,
		  address.state
		FROM 
		  techmatcher.serviceprovider, 
		  techmatcher.serviceprovidersofferservices, 
		  techmatcher.serviceprovidertoaddress join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id)
		WHERE 
		  serviceprovider.serviceprovider_id = serviceprovidersofferservices.serviceprovider_id AND
		  serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id and
		  serviceprovidersofferservices.service_deleted != True and
		  serviceprovidersofferservices.servicecategory_id>1	  
		  group by  serviceprovidersofferservices.servicecategory_id,
		  address.county,
		  address.state
 )
  tempqry2 on (tempqry1.county=tempqry2.county and tempqry1.state=tempqry2.state)
  join techmatcher.servicecategories on (tempqry2.servicecategory_id=servicecategories.servicecategory_id)
	group by servicecategoryname";
}
elseif ($geo_area=='city') {
$querytxt="Select servicecategoryname, sum(numcomps) competitors from 
	(SELECT distinct
		  address.city,
		  address.state
		FROM 
		  techmatcher.serviceprovider join techmatcher.serviceprovidertoaddress on (serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id 
		  and serviceprovider.serviceprovider_id=$1) 
		   join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id  and serviceprovidertoaddress.address_deleted !='t')
		  ) tempqry1 
	JOIN	  
	(SELECT 
		  count(serviceprovider.serviceprovider_id) numcomps, 
		  serviceprovidersofferservices.servicecategory_id,
		  address.city,
		  address.state
		FROM 
		  techmatcher.serviceprovider, 
		  techmatcher.serviceprovidersofferservices, 
		  techmatcher.serviceprovidertoaddress join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id)
		WHERE 
		  serviceprovider.serviceprovider_id = serviceprovidersofferservices.serviceprovider_id AND
		  serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id and
		  serviceprovidersofferservices.service_deleted != True and
		  serviceprovidersofferservices.servicecategory_id>1	  
		  group by 	  serviceprovidersofferservices.servicecategory_id,
		  address.city,
		  address.state
 )
  tempqry2 on (tempqry1.city=tempqry2.city and tempqry1.state=tempqry2.state)
  join techmatcher.servicecategories on (tempqry2.servicecategory_id=servicecategories.servicecategory_id)
 group by servicecategoryname";
}
elseif ($geo_area=='state') {
$querytxt="Select servicecategoryname, sum(numcomps) competitors from 
	(SELECT distinct
		  address.state
		FROM 
		  techmatcher.serviceprovider join techmatcher.serviceprovidertoaddress on (serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id 
		  and serviceprovider.serviceprovider_id=$1) 
		   join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id  and serviceprovidertoaddress.address_deleted !='t')
		  ) tempqry1 
	JOIN	  
	(SELECT 
		  count(serviceprovider.serviceprovider_id) numcomps, 
		  serviceprovidersofferservices.servicecategory_id,
		  address.state
		FROM 
		  techmatcher.serviceprovider, 
		  techmatcher.serviceprovidersofferservices, 
		  techmatcher.serviceprovidertoaddress join techmatcher.address on (serviceprovidertoaddress.address_id=address.address_id)
		WHERE 
		  serviceprovider.serviceprovider_id = serviceprovidersofferservices.serviceprovider_id AND
		  serviceprovider.serviceprovider_id=serviceprovidertoaddress.serviceprovider_id and
		  serviceprovidersofferservices.service_deleted != True and
		  serviceprovidersofferservices.servicecategory_id>1	  
		  group by 	  serviceprovidersofferservices.servicecategory_id,
		  address.state
 )
  tempqry2 on (tempqry1.state=tempqry2.state)
  join techmatcher.servicecategories on (tempqry2.servicecategory_id=servicecategories.servicecategory_id)
 group by servicecategoryname";
}
 $result = pg_query_params($querytxt, array($_SESSION['provider']['serviceprovider_id']));


 if($result != false) {
    while($rs = pg_fetch_assoc($result)) {
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
}
?>