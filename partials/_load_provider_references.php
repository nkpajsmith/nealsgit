<?php session_start();
include_once '../dao/staff.php';
include_once '../dao/reference.php';
?>
<!-- add address button -->
<div class="add-new-address clearfix">
    <p class="add-new-btn"><a href="javascript:void(0)" onClick="add_reference();">+ ADD NEW REFERENCE</a></p>
</div>

<?php
$serv1=get_staffid_from_serviceprovider($_SESSION['provider']['serviceprovider_id']);
$resulttt=count($serv1);
$serv3=get_reference_customers_from_service_provider($_SESSION['provider']['serviceprovider_id']);
$resultz=count($serv3);
$flagzz=0;
while($resultz>$flagzz) {
    $get_names=get_customername_hiredate($serv3[$flagzz]['itconsumer_id']); ?>
<!-- address box -->
<div id="div_address_<?php echo $address1[0]['address_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
    <div class="address-box"><div class="address-box-inner">
            <p class="address-box-label">Customer</p>
            <p class="address-box-value"><?php echo $get_names[0]['itconsumername'];?></p>
            <p class="address-box-show"><a id="show_box_<?php echo $flagzz;?>"href="javascript: void(0);" onClick="$('#address_container<?php echo $flagzz;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $flagzz;?>'))">Show</a></p>
        </div></div>
    <div id="address_container<?php echo $flagzz;?>" class="address-box-content">
        <form id="change_address" name="change_address<?php print $flagzz; ?>" method="POST">
            <div class="row">
                <label>Employee name:</label>
                <label><?php echo $get_names[0]['itconsumername'];?></label>
            </div>

            <div class="row">
                <label>Email Address:</label>
                    <?php echo $get_names[0]['itconsumer_emailaddress'];?>
            </div>
        </form>
    </div>
</div>
    <?php $flagzz++;
} ?>
<!-- tooltip -->

<span>&nbsp;</span>
