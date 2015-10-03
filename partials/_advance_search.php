<?php session_start();
include_once 'dbcon.php';

$names=array();
$it_consumer = $_SESSION['consumer']['itconsumer_id'];
$record_counter             =0;

$reportcriteria=$_POST['provider_rating'];
$reportselected =$_POST['reportselected'];

if (isset ($_POST['incexc'])) {
    $incexc=$_POST['incexc'];
} else {
    $incexc=array(0);
}


$Report = array(
        'Service'=>false,
        'Skills'=>false,
        'Geography'=>false,
        'Rated' =>false,
        'Exclude'=>false);

//    This section of logic determines which search blocks to run and with what parameters...

$search_id_service =0;
$search_id_skill=0;
$search_id_geo=0;
$search_id_rated=0;
$qry_id='select nextval(\'techmatcher.mh_search_id_seq\')';

foreach ($reportselected as $reps) {
    if ($reps==1) {
        $Report['Service']=true;
        if ($reps==max($reportselected)) {
            $finalflag='Service';
        }
    }

    elseif  ($reps==2) {
        $Report['Skills']=true;
        if ($reps==max($reportselected)) {
            $finalflag='Skills';
        }
    }

    elseif ($reps==3) {
        $Report['Geography']=true ;
        if ($reps==max($reportselected)) {
            $finalflag='Geography';
        }
    }

}

if (isset( $reportcriteria['rated'])) {
    if ($reportcriteria['rated']==1 ) {
        $Report['Rated']=true;
    } ;
}

if ($Report['Service']==true) {
    $serviceselected =$_POST['services_category_typ'];


    $search_id_qry=pg_query($qry_id);
    $search_id_service = pg_result($search_id_qry,0,0);

    if ($serviceselected=='Services For My Profile') {
        $qry= 'select techmatcher.makematch(' . $it_consumer . ', \'services\' ,'. $search_id_service . ')';
    } else {
        $qry='select techmatcher.specificservicesearch('. $it_consumer .',' . $reportcriteria['specific_services'] .',' . $search_id_service . ')';
    }

    $match_result=pg_query($qry);
    $mresult= pg_result($match_result,0,0);

    if ($mresult=='f') {
        $Report['Service']=false;
    };
}
//$result = pg_query_params($qry,array()) or die(pg_errormessage());

if ($Report['Skills']==true) {
    $skillselected =$_POST['skill_type'];

    $search_id_qry=pg_query($qry_id);
    $search_id_skill = pg_result($search_id_qry,0,0);


    if ($skillselected=='Skills For My Profile') {
        //echo '<strong> Match query string </strong> = select techmatcher.makematch(' . $it_consumer . ', '.'\'skills\' ,'. $search_id_skill . ')<br/>';
    } else {
        //echo '<strong> Match query string </strong> = select techmatcher.specificskillsearch('. $it_consumer .',' . $reportcriteria['skill_types'] .',' . $search_id_skill . ')<br/>';
    }

    if ($skillselected=='Skills For My Profile') {
        $qry= 'select techmatcher.makematch(' . $it_consumer . ', '.'\'skills\' ,'. $search_id_skill . ')';
    } else {
        //$qry='select techmatcher.specificskillsearch('. $it_consumer .',' . $reportcriteria['skill_types'] .',' . $search_id_skill . ')';
        $qry="select techmatcher.specificskillsearch(". $it_consumer .",'" .$reportcriteria['more_skills']."'," . $search_id_skill . ")";
    }

    $match_result=pg_query($qry);
    $mresult= pg_result($match_result,0,0);

    if ($mresult=='f') {
        $Report['Skills']=false;
    };

}
if ($Report['Geography']==true) {
    $geoselected =$_POST['geographic_type'];
    $search_id_qry=pg_query($qry_id);
    $search_id_geo = pg_result($search_id_qry,0,0);


    if ($geoselected=='MyCounty') {
        $qry='select techmatcher.makematch(' . $it_consumer . ',\'county\' ,'. $search_id_geo. ')';
    }
    elseif ($geoselected=='MyZipcode') {
        $qry='select techmatcher.makematch(' . $it_consumer . ',\'zipcode\' ,'. $search_id_geo .')';
    }
    elseif ($geoselected=='OtherValue') {
        $qry='select techmatcher.makevariablematch(' . $it_consumer .',\''. $reportcriteria['my_county']. '\',' .'\''. $reportcriteria['text_value'].'\','.$search_id_geo.')';
    }

    $match_result=pg_query($qry);
    $mresult= pg_result($match_result,0,0);

    if ($mresult=='f') {
        $Report['Geography']=false;
    };

}


//  This section processes records for display


$strgqry=''; {
    $serviceexclude='include';
} {
    $skillexclude='include';
} {
    $geoexclude='include';
} {
    $ratingexclude='include';
}

if ($incexc[0]>0) {
    foreach ($incexc as $inx) {
        if ($inx==1) {
            $serviceexclude='exclude';
        } 
        if ($inx==2) {
            $skillexclude='exclude';
        } 
        if ($inx==3) {
            $geoexclude='exclude';
        }
        if ($inx==4) {
            $ratingexclude='exclude';
        }
    }
}

if ($Report['Service']==true) {
    $strgqry='SELECT  serviceprovider_id FROM techmatcher.matchhistory where search_id='. $search_id_service;
    $pgarraystr1 = '{"service","true",'. '"'.$search_id_service.'",'. '"'.$serviceexclude.'"}';
}
else {
    $pgarraystr1 = '{"service","false",'. '"'.$search_id_service.'",'. '"'.$serviceexclude.'"}';
}

if ($Report['Skills']==true) {
    $strgqry=$strgqry . 'SELECT serviceprovider_id FROM techmatcher.matchhistory where search_id='.$search_id_skill ;
    $pgarraystr2 = '{"skills","true",'. '"'.$search_id_skill.'",'. '"'.$skillexclude.'"}';
}  else {
    $pgarraystr2 = '{"skills","false",'. '"'.$search_id_skill.'",'. '"'.$skillexclude.'"}';
}

if ($Report['Geography']==true) {
    $strgqry=$strgqry . 'SELECT serviceprovider_id FROM techmatcher.matchhistory where search_id='.$search_id_geo ;
    $pgarraystr3 = '{"geo","true",'. '"'.$search_id_geo.'",'. '"'.$geoexclude.'"}';
}  else {
    $pgarraystr3 = '{"geo","false",'. '"'.$search_id_geo.'",'. '"'.$geoexclude.'"}';
}

if ($Report['Rated']==true) {
    $strgqry=$strgqry. 'SELECT serviceprovider_id FROM techmatcher.ratingevents where ratingtotal>0';
    $reportrated='true';
}   else {
    $reportrated='false';
}


$resultid=0;

$qry='select techmatcher.matchhandler('.$it_consumer .',\''  . '\',\'' . $finalflag . '\',' . '\'{' .$pgarraystr1 .',' .  $pgarraystr2 .','. $pgarraystr3 .' }\',' . '\'' .  $reportrated .'\',\''. $ratingexclude. '\')' or die(pg_errormessage());

if(pg_query($qry) == FALSE){
    $match_result=pg_send_query($dbconn,$qry);
    $res1 = pg_get_result($dbconn);
    $error_field_description = pg_result_error_field($res1, PGSQL_DIAG_MESSAGE_PRIMARY);
    echo $error_field_description;
}else{
    //match_result=pg_query($qry);
    $resultid=pg_result(pg_query($qry), 0,0);
    //$resultid=pg_result($match_result, 0,0);
}

$qry = "select sp.serviceprovider_id, sp.primaryname
             from techmatcher.lastmatch_vw as lmv, techmatcher.matchhistory as mh,techmatcher.serviceprovider as sp
             where lmv.search_id = mh.search_id and mh.serviceprovider_id = sp.serviceprovider_id
             and mh.search_id=$1
             GROUP by sp.serviceprovider_id, sp.primaryname";

if($resultid != 0) {
    $resulting2=pg_query_params($qry,array($resultid));
    while ($name= pg_fetch_assoc($resulting2)) {
        $names[] = $name;
        $record_counter++;
    }
    echo 'OK';
}

$_SESSION['search_id']=$resultid;
$_SESSION['records']=$record_counter;
$providers_count=0;
$_SESSION['providers_count']=$providers_count;
?>