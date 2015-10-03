<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher&trade;</title>
        <?php include_once '../includes/scripts_consumer.php';?>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
         
    </head>
   <script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try{
			var pageTracker = _gat._getTracker("UA-17257404-1");
			pageTracker._trackPageview();
			} catch(err) {}
   </script>
    <?php   
    include_once "../dao/search.php";
        include_once '../dao/consumer.php';
        include_once '../dao/address.php';
        include_once "../includes/common_functions.php";
                                               
                                               $address=get_consumer_address_id($_SESSION['consumer']['itconsumer_id']);
                                                $resultt=count($address);
                                                // if no address exists then open the add address window
                                                if($resultt == 0) {
                                                    echo '<body onload="javascript:open_add_consumer_address_dialog()">';} else
                                                   { echo '<body>';}

  
        $consumer = consumer_findByEmail($_SESSION['consumer']['itconsumer_emailaddress']);
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">

                <?php include '../includes/header_consumer.php';?>

                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>

                                <!-- user-notify-content -->
                                <?php include_once("../includes/header_login.php"); ?>

                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="profile.php">My Account Home</a></h2>
                                    <h1><a href="#">Locations</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix tp-progress">
                                                <ul class="clearfix">
                                                    <li class="completed"><a href="profile.php"><span>At a Glance</span></a></li>
                                                    <li class="active"><a href="locations.php"><span>Locations</span></a></li>
                                                    <li class="next"><a href="organization_details.php"><span>Your Details</span></a></li>
                                                    <li class="last"><a href="referrals.php"><span>Referrals</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->
                                            <div id="tab-content" class="tab-content">
                                                <!-- add address button -->
                                                <div class="add-new-address clearfix">
                                                    <p class="add-new-btn"><a href="javascript:void(0);" class="modalform" onclick="open_add_consumer_address_dialog();">+ ADD NEW ADDRESS</a></p>
                                                </div>

                                                <?php
                                                 //$resultt;
												 if($resultt == 0 && $consumer['recordstatus'] != 'signupcomplete') {
                                                    update_record_status($_SESSION['consumer']['itconsumer_id']); // update to signupcomplete
                                                }
                                                $counting=0;

                                                while($counting < $resultt ) {
                                                    $address1=get_address_from_id($address[$counting]['address_id']);?>
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
                                                                <input id="delete_button" class="btn" type=button name="delete" onclick="confirmation('<?php echo $address[$counting]['address_id'];?>')" value="Delete"/>
                                                                <input class="btn" type=button value="Edit" name="edit" onclick="edit_consumeraddress('<?php echo $address1[0]['address_id'];?>');"/>
                                                            </div>
                                                            <div id="div_register_errors1" class="errordiv" ></div>
                                                        </form>
                                                    </div>
                                                </div>
                                                    <?php $counting++;} ?>
                                                <!-- tooltip -->
                                                <span>&nbsp;</span>
 
                                            </div><!-- /tab-content -->

                                        </div></div><!-- /main column -->
                                    <?php include '../includes/sidebar_consumer_tour.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';
        include_once '../popups/add_addresses_consumer.php';// add address popup
        include_once '../popups/edit_consumer_address.php';
        include_once '../popups/login_consumer.php';
        include_once '../popups/login_header.php';
        include_once '../popups/login_both.php';
        include_once '../popups/consumer_subscription.php';
        include_once '../popups/status_subscription.php';
        include_once '../popups/advance_search.php';
        include_once '../includes/advance_search_progress_bar.php';
        ?>
    </body>
</html>