<?php include 'dbcon.php';

function get_number_skills($serviceprovider_id) {

    $result = pg_query_params("SELECT serviceskill_id FROM techmatcher.serviceprovidershaveskills WHERE serviceprovider_id = $1 AND skill_deleted = $2",array($serviceprovider_id,"FALSE")) or die(pg_errormessage());
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_staff_for_provider($serviceprovider_id) {

    $result = pg_query_params("SELECT spstaff_id FROM techmatcher.serviceprovidershavestaff WHERE serviceprovider_id = $1",array($serviceprovider_id)) or die(pg_errormessage());
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_skill_name_from_skill_id($serviceskill_id) {
    $result = pg_query_params("SELECT serviceskillname FROM techmatcher.serviceskills WHERE serviceskill_id = $1",array($serviceskill_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_staff_id_from_skill($serviceskill_id) {
    $result = pg_query_params("SELECT spstaff_id FROM techmatcher.staffhaveskills WHERE serviceskill_id = $1",array($serviceskill_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_service_skillid_from_staff_id($staff_id) {
    $result = pg_query_params("SELECT serviceskill_id FROM techmatcher.staffhaveskills WHERE spstaff_id = $1 and skill_deleted = FALSE",array($staff_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_service_name_from_id($skilll_id) {
    $result = pg_query_params("SELECT serviceskill_id,serviceskillname FROM techmatcher.serviceskills WHERE serviceskill_id = $1",array($skilll_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

function get_staff_experience($staff_id,$skill_id) {
    $result = pg_query_params("SELECT yearsofexperience FROM techmatcher.staffhaveskills WHERE spstaff_id = $1 AND serviceskill_id=$2",array($staff_id,$skill_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}
function get_stafff_namee($staff_id) {

    $result = pg_query_params("SELECT spstaffname FROM techmatcher.staff WHERE spstaff_id= $1",array($staff_id));
    $names=array();
    while ($name= pg_fetch_assoc($result)) {
        $names[] = $name;
    }
    return $names;
}

?>
