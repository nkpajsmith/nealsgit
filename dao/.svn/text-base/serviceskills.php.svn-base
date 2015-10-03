<?php include_once 'dbcon.php';


/******************** Function for first time skill values  ****************/
function getskilltypes($skill_level){

    $result=pg_query_params("select * from techmatcher.serviceskills where parent_serviceskill_id=$1",array("0"));
    $skilltypes=array();
    while ($name= pg_fetch_assoc($result)){
         $skilltypes[] = $name;
    }
    return $skilltypes;
}

/********************** Function to get child/parent skills ***********************/
function getsubskilltypes($skill_level,$parentid){
    if($skill_level == 1)
    {
        $result=pg_query_params("select * from techmatcher.serviceskills where parent_serviceskill_id=$1",array($parentid));
        $result1 = pg_query_params("select * from techmatcher.serviceskills where serviceskill_id= $1",array($parentid));
        $skilltypes=array();
        $name = pg_fetch_assoc($result1);
        $skilltypes[] = $name;
        while ($name= pg_fetch_assoc($result))
        {
             $skilltypes[] = $name;
        }
       return $skilltypes;
    }
    else
    {
        $result=pg_query_params("select * from techmatcher.serviceskills where serviceskill_id= $1",array($parentid));
        $row = pg_fetch_array($result);
        $parent_id = $row['parent_serviceskill_id'];
        $result1=pg_query_params("select * from techmatcher.serviceskills where parent_serviceskill_id=$1",array($parent_id));
        $result2 = pg_query_params("select * from techmatcher.serviceskills where serviceskill_id= $1",array($parent_id));
        $skilltypes=array();
        $skilltypes[]= pg_fetch_assoc($result2);
        while ($name= pg_fetch_assoc($result1))
        {
             $skilltypes[] = $name;
        }
        return $skilltypes;
    }
}

   /***************** RETURNS MIN LEVEL ***************************/

function getminlevel($parentskill)
{
    $result = pg_query_params("select * from techmatcher.serviceskills where serviceskill_id= $1",array($parentskill));
    $row = pg_fetch_array($result);
    $max = $row["parent_serviceskill_id"];
    if($max==null)
        return true;
    else
        return false;
}
/********************************************************************/

function get_skillid_from_serviceprovider($provider_idd)
{
    $result=pg_query_params("select * from techmatcher.serviceprovidershaveskills where serviceprovider_id=$1 and skill_deleted=$2",array($provider_idd,"FALSE"));
    $skilltypes=array();
     while ($name= pg_fetch_assoc($result))
     {
         $skilltypes[] = $name;

     }
       return $skilltypes;
}
function get_all_skillid_from_serviceprovider($provider_idd)
{
    $result=pg_query_params("select * from techmatcher.serviceprovidershaveskills where serviceprovider_id=$1",array($provider_idd));
    $skilltypes=array();
     while ($name= pg_fetch_assoc($result))
     {
         $skilltypes[] = $name;
     }
       return $skilltypes;
}

function get_organisation_detail_name($consumer_id){
     $result=pg_query_params("select distinct(orgdetailnamevalue) from techmatcher.orgprofiledetails where itconsumer_id=$1",array($consumer_id));
     $skilltypes=array();
     while ($name= pg_fetch_assoc($result))
     {
         $skilltypes[] = $name;
     }
       return $skilltypes;
}

function get_skill_name_from_service_skills()
{
    $result=pg_query_params("Select * from techmatcher.serviceskills",array());
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
     {
         $skillnames[] = $name;

     }
       return $skillnames;

}
function get_name_from_service_skills_view()
{
    $result=pg_query_params("Select * from techmatcher.skillbylevel where skilllevel=$1",array("Top Level Skill"));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
     {
         $skillnames[] = $name;
     }
       return $skillnames;  
}

function get_firstlevel_from_service_skills_view()
{
    $result=pg_query_params("Select * from techmatcher.skillbylevel where skilllevel=$1",array("First Level Skill"));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
         $skillnames[] = $name;
    }
      return $skillnames;
}

function get_secondlevel_from_service_skills_view()
{
    $result=pg_query_params("Select * from techmatcher.skillbylevel where skilllevel=$1",array('Second Level Skill'));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}

function get_level1_skills(){
    $result=pg_query_params("Select * from techmatcher.serviceskillbylevel where skilllevel=$1 order by serviceskill_id",array(1));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}

function get_level2_skills(){
    $result=pg_query_params("Select * from techmatcher.serviceskillbylevel where skilllevel=$1",array(2));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}

function get_level3_skills(){
    $result=pg_query_params("Select * from techmatcher.serviceskillbylevel where skilllevel=$1",array(3));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}

function get_level4_skills(){
    $result=pg_query_params("Select * from techmatcher.serviceskillbylevel where skilllevel=$1",array(4));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}

function get_level5_skills(){
    $result=pg_query_params("Select * from techmatcher.serviceskillbylevel where skilllevel=$1",array(5));
    $skillnames=array();
    while ($name= pg_fetch_assoc($result))
    {
        $skillnames[] = $name;
    }
    return $skillnames;
}


function get_skillname($skill_iddd)
{
    $result=pg_query_params("select * from techmatcher.serviceskills where serviceskill_id=$1",array($skill_iddd));
    $skillnames=array();
    while($result1=pg_fetch_assoc($result))
    {
        $skill_names[]=$result1;
    }
    return $skill_names;
}

function get_childs($parent_id) {
    $qry = pg_query_params("Select * from techmatcher.serviceskillbylevel where parent_serviceskill_id =$1 order by serviceskill_id",array($parent_id));

    while ($name= pg_fetch_assoc($qry)) {
        $skillnames[] = $name;
    }
    return $skillnames;
}

?>