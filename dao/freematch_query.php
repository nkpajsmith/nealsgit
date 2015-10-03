<?php include_once 'dbcon.php';

function get_free_match() {
$file = $_SESSION['csvfile'];
$fp = fopen($file, "w");
  
   $match = pg_query_params("select techmatcher.matchhandler($1,'Geography','{{'service','true',nextval('techmatcher.mh_search_id'),'include'}, {'skills','true',nextval('techmatcher.mh_search_id'),'include'},{'geo',true',nextval('techmatcher.mh_search_id'),'include'} }','false','include')" , array($_SESSION['consumer']['itconsumer_id']));
  
   $matchresult= pg_fetch_all($match); 
  
 	$ressearch_id = pg_query_params("select max(search_id) search_id from techmatcher.matchhistory where itconsumer_id=$1", array($_SESSION['consumer']['itconsumer_id']));
    
    $search_id= pg_fetch_all($ressearch_id); 
 
    $result = pg_query_params("select matchname, count(distinct serviceprovider_id) from techmatcher.matchhistory  where (search_id=$1 or joinset_id=$1) and matchname != 'Intersection' group by matchname", array($search_id));


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