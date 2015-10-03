<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/experience.php';
include_once '../dao/staff.php';

$staff_id = $_GET['staff_id'];

$qry = pg_query_params("update techmatcher.staff set inactiverecordflag = true where spstaff_id = $1", array($staff_id));
$qry = pg_query_params("delete from techmatcher.serviceprovidershavestaff where spstaff_id = $1", array($staff_id));//@todo ...modify if required
?>

    <!-- add Staff button-->
    <div class="add-new-address clearfix">
        <p class="add-new-btn"><a href="javascript:void(0)" class="modalform" onclick="add_staff();">+ ADD STAFF</a></p>
    </div>

    <?php
    $staff_number=get_staff_for_provider($_SESSION['provider']['serviceprovider_id']);
    $staff_counting=count($staff_number);
    $staff_checker=0;
    while($staff_counting>$staff_checker) {
        $get_staff_name=get_stafff_namee($staff_number[$staff_checker]['spstaff_id']);?>
    <!-- address box -->
    <div id="div_staff_<?php echo $address1[0]['address_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
        <div class="address-box"><div class="address-box-inner">
                <p class="address-box-label">Staff Name</p>
                <p class="address-box-value"><?php echo $get_staff_name[0]['spstaffname'];?></p>
                <p class="address-box-show"><a id="show_box_<?php echo $staff_checker;?>"href="javascript: void(0);" onClick="$('#staff_container<?php echo $staff_checker;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $staff_checker;?>'))">Show</a></p>
            </div></div>
        <div id="staff_container<?php echo $staff_checker;?>" class="address-box-content">
            <form id="staff_form<?php print $staff_checker;?>" name="staff_form<?php print $staff_checker;?>" method="POST">
                <div class="row">
                    <label>Has following skills: </label>
                    <label><p class="selectskills add-new-btn"><a href="javascript:void(0);" onclick="open_4_across_selector('<?php echo $get_staff_name[0]['spstaffname'];?>');">+ ADD SKILLS</a></p> </label>
                    <label><?php
                            $get_service_idddzz=get_service_skillid_from_staff_id($staff_number[$staff_checker]['spstaff_id']);
                            $skill_id_count=count($get_service_idddzz);
                            $service_skill_counter=0;
                            while($skill_id_count>$service_skill_counter) {
                                $get_namesss=get_service_name_from_id($get_service_idddzz[$service_skill_counter]['serviceskill_id']);?>
                        <div style="float:left;width:490px;margin:10px 125px;">
                            <strong><div style="width:185px;float:left;"> <?php echo $get_namesss[0]['serviceskillname']; ?> </div></strong>
                            <img style="float:left;" src="../images/del.png" onclick = "return delete_skill('<?php echo $staff_number[$staff_checker]['spstaff_id'];?>','<?php echo $get_namesss[0]['serviceskill_id']; ?>')"/>
                        </div>
                                <?php $service_skill_counter++;
                            }?>
                    </label>

                </div>

                <div class="row">
                    <label>     </label>
                </div>
                <input type="hidden" name="staff_id" value="<?php echo $staff_number[$staff_checker]['spstaff_id'];?>"/>
                <div class="submit-row">
                    <input id="delete_button" class="btn" type=button name="delete" value="DELETE" onclick="delete_provider_staff_confirmation('<?php echo $staff_number[$staff_checker]['spstaff_id'];?>')"/>
                    <input class="btn" type=button value="EDIT" name="edit" onclick="open_edit_staff('<?php echo $staff_number[$staff_checker]['spstaff_id'];?>');"/>
                </div>
            </form>
        </div>
    </div>
        <?php $staff_checker++;
} ?>
    <!-- tooltip -->
    <span>&nbsp;</span>