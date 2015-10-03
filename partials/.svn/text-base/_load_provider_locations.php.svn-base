<?php session_start();
include_once "../dao/search.php";
include_once '../dao/address.php';
$address=get_address_by_serviceid($_SESSION['provider']['serviceprovider_id']);
$resultt=count($address);
$counting=0;

while($counting < $resultt ) {
    $address1=get_address_from_id($address[$counting]['address_id']);
    ?>
<!-- address box -->
<div id="div_address_<?php echo $address1[0]['address_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
    <div class="address-box"><div class="address-box-inner">
            <p class="address-box-label">Address</p>
            <p class="address-box-value"><?php echo $address1[0]['addressline1'];?></p>
            <p class="address-box-show"><a id="show_box_<?php echo $counting;?>"href="javascript: void(0);" onClick="$('#address_container<?php echo $counting;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $counting;?>'))">Show</a></p>
        </div></div>
    <div id="address_container<?php echo $counting;?>" class="address-box-content">
        <form id="change_address" name="change_address<?php print $counting; ?>" method="POST">
            <div class="row">
                <label>Address Type</label>
                <!--<select class="select-short"><option>Choose a type</option></select> -->
                <label><?php
                        $addressez = getaddresstypes();
                        foreach($addressez as $name) {
                            if($name['addresstype_id']==$address1[0]['addresstype_id']) {
                                echo $name['addresstype_name'];
                            }
                        }
                        ?></label>
            </div>

            <div class="row">
                <label>Address 1</label>
                    <?php echo $address1[0]['addressline1'];?>
            </div>

            <div class="row">
                <label>Address 2</label>
                    <?php echo $address1[0]['addressline2'];?>
            </div>

            <div class="row">
                <label>City</label>
                    <?php echo $address1[0]['city'];?>
            </div>

            <div class="row">
                <label>State</label>
                    <?php echo $address1[0]['state'];?>
            </div>

            <div class="row">
                <label>Zip</label>
                    <?php echo $address1[0]['zipcode'];?>
            </div>
                <?php   $phone1     = $address1[0]['phonenumber'];
                $phone_ini  = substr($phone1,0,3);
                $phone_mid  = substr($phone1,3,3);
                $phone_last = substr($phone1,6,4);
                ?>
            <div class="row">
                <label>Phone</label>
								(<?php echo $phone_ini; ?>) <?php echo $phone_mid;?> - <?php echo $phone_last;?>
            </div>

            <input type="hidden" name="address_idddd" value="<?php echo $address[$counting]['address_id'];?>"/>

            <div class="submit-row">
                <input id="delete_button" class="btn" type=button name="delete" onclick="delete_confirmation('<?php echo $address[$counting]['address_id'];?>')" value="DELETE"/>
                <input class="btn" type=button value="EDIT" name="edit" onclick="open_edit_provider_address('<?php echo $address1[0]['address_id'];?>');"/>
            </div>
            <div id="div_register_errors_sp_loc1" class="errordiv" ></div>
        </form>
    </div>
</div>
    <?php $counting++;
} ?>
<!-- tooltip -->
<span>&nbsp;</span>