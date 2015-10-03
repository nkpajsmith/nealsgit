<?php session_start();
include_once '../dao/service.php';
?>

<h4><span>Service Statement</span></h4>
<?php $service_name_is="Company Service Statement for ".$_SESSION['provider']['primaryname'];
$qry = pg_query_params("select servicedescr from techmatcher.services where servicename = $1", array($service_name_is));
$description = pg_fetch_all($qry);
if(empty($description) && $desription == '') {
    ?>
<div class="square_box_holder">
    <div style="padding-left: 10px; padding-right: 10px;">No Service Statement set for your company. Press the Change button and set it. </div>

</div>
    <?php }else {?>
<div class="square_box_holder">
    <div style="padding-left: 10px; padding-right: 10px;"><?php echo $description[0]['servicedescr']; ?> </div>
</div>
    <?php } ?>

<div class="add-new-address clearfix">
    <p class="add-new-btn"><a href="javascript:void(0)" onclick="$('#modal_modify_service_statement').dialog('open');">+ CHANGE</a></p>
</div>

<!-- section -->

<h4><span>Detailed Services</span></h4>
<!-- add address button -->
<div class="add-new-address clearfix">
    <p class="add-new-btn"><a href="javascript:void(0)" onclick="$('#modal_services').dialog('open');">+ ADD NEW SERVICES</a></p>
</div>

<?php
$service_idd=get_service_id($_SESSION['provider']['serviceprovider_id']);
$resultt=count($service_idd);
$flag=0;
while ($resultt>$flag) {
    $services_iddd=get_services_from_id($service_idd[$flag]['service_id']);?>
<!-- address box -->
<div id="div_service_<?php echo $services_iddd[0]['service_id'];?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
    <div class="address-box"><div class="address-box-inner">
            <p class="address-box-label">Service</p>
            <p class="address-box-value"><?php echo $services_iddd[0]['servicename'];?></p>
            <p class="address-box-show"><a id="show_box_<?php echo $flag;?>"href="javascript: void(0);" onclick="$('#address_container<?php echo $flag;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $flag;?>'))">Show</a></p>
        </div></div>
    <div id="address_container<?php echo $flag;?>" class="address-box-content">
        <form id="change_services<?php print $flag; ?>" name="change_services<?php print $flag; ?>" method="POST">
            <div class="row">
                <label>Service Type</label>
                <label><?php
                        $servicez = getservicecategorytypes();
                        foreach($servicez as $name) {
                            if($name['servicecategory_id']==$services_iddd[0]['servicecategory_id']) {
                                echo $name['servicecategoryname'];
                            }
                        }
                        ?></label>
            </div>

            <div class="row">
                <label>Service Name</label>
                    <?php echo $services_iddd[0]['servicename'];?>
            </div>

            <div class="row">
                <label>Service Description</label>
                    <?php echo $services_iddd[0]['servicedescr'];?>
            </div>

            <input type="hidden" name="service_idddd" value="<?php echo $service_idd[$flag]['service_id'];?>"/>

            <div class="submit-row">
                <input id="delete_services" class="btn" type=button name="delete" onclick="confirmation_new_service('<?php echo $service_idd[$flag]['service_id']; ?>')" value="DELETE"/>
            </div>
            <div id="div_register_errors1" class="errordiv" ></div>
        </form>
    </div>
</div>
    <?php $flag++;
} ?>
<!-- tooltip -->
<span>&nbsp;</span>