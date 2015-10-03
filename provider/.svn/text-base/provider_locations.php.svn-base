<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher&trade;</title>
        <?php include_once "../includes/scripts_provider.php";?>

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
    <body>
        <?php
        include_once "search.php";
        include_once "address.php";
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
          <img id="load" src="../images/loader.gif" border="0" style="z-index:1001; position:absolute; top: 404px; left: 516px; display: none; "/>
             <div id="main" style=" background-color:gray; position:absolute; width: 100%; height: 100%; z-index:1000; display: none;"> </div>
     
                <?php include_once "header_provider.php";?>

                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>

                                <!-- user-notify-content -->
                                <?php include_once "header_login.php"; ?>

                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">My Account Home </a></h2>
                                    <h1><a href="#">Contact & Locations</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                <ul class="clearfix">
                                                    <li><a href="provider_profile.php"><span>At a Glance</span></a></li>
                                                    <li class="active"><a href="provider_locations.php"><span>Contact</span></a></li>
                                                    <li><a href="provider_services.php"><span>Services</span></a></li>
                                                    <li><a href="provider_staff_skills.php"><span>Staff & Skills</span></a></li>
                                                    <li><a href="provider_references.php"><span>Reference</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->
                                            <?php $qry_service_providers = pg_query_params("select primaryname,aliasname,contactfirstname,contactlastname,contacttitle,companyfounded_dt from techmatcher.serviceprovider where serviceprovider_id = $1", array($_SESSION['provider']['serviceprovider_id']));
                                            $service_providers = pg_fetch_all($qry_service_providers);
                                            ?>
                                            <div class="tab-content">
                                                <div id="contact_info" class="w100">
                                                    <form id="save_record" method="POST" onsubmit="return save_provider_contact($(this));">
                                                        <div class="w100">
                                                        <div class="greybtnwraper">
                                                            <label>Salutation</label>
                                                            <select style="width:73%" id="contacttitle" name="contacttitle">
                                                                <option></option>
                                                                <option value="Mr." <?php if($service_providers[0]['contacttitle'] == 'Mr.') {
                                                                    echo 'selected';
                                                                }?>>Mr.</option>
                                                                <option value="Mrs." <?php if($service_providers[0]['contacttitle'] == 'Mrs.') {
                                                                    echo 'selected';
                                                                }?>>Mrs.</option>
                                                                <option value="Ms." <?php if($service_providers[0]['contacttitle'] == 'Ms.') {
                                                                        echo 'selected';
                                                                    }?>>Ms.</option>
                                                                <option value="Dr." <?php if($service_providers[0]['contacttitle'] == 'Dr.') {
                                                                    echo 'selected';
                                                                }?>>Dr.</option>
                                                            </select>
                                                        </div>
                                                            <div class="greybtnwraper">
                                                                <label>Contact First Name</label>
                                                                <input id="contactfirstname" name="contactfirstname" value="<?php echo $service_providers[0]['contactfirstname'];?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="w100">                                                            
                                                            <div class="greybtnwraper">
                                                                <label>Contact Last Name</label>
                                                                <input id="contactlastname" name="contactlastname" value="<?php echo $service_providers[0]['contactlastname'];?>"/>
                                                            </div>

                                                            <div class="greybtnwraper">
                                                                <label>Business Nickname</label>
                                                                <input id="aliasname" name="aliasname" value="<?php echo $service_providers[0]['aliasname'];?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="w100">
                                                            <div class="greybtnwraper">
                                                                <label>Registered or Licensed Business Name</label>
                                                                <input id="legalname" name="legalname" value="<?php echo $service_providers[0]['primaryname'];?>"/>
                                                            </div>
                                                            <div class="greybtnwraper">
                                                                <label>Company Founded Date</label>
                                                                <input id="compfound_dt" name="compfound_dt" value="<?php echo $service_providers[0]['companyfounded_dt'];?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="b_btn">
                                                            <div class="left"></div>
                                                            <div class="mid"><input id="changecompanycode" type="button" value="CHANGE PASSWORD" onclick="open_change_pwd_dialog();"/></div>
                                                            <div class="right"></div>
                                                        </div>
                                                        
                                                        <div class="b_btn">
                                                            <div class="left"></div>
                                                            <div class="mid"><input type="submit" id="submit_contact" value="SAVE"/></div>
                                                            <div class="right"></div>
                                                        </div>

                                                        <div id="error_provider_contact" style="color:red;font-weight:bold;"></div>
                                                    </form>
                                                </div>
                                                <!-- section -->

                                                <h4><span>Locations</span></h4>
                                                <!-- add address button -->
                                                <div class="add-new-address clearfix">
                                                    <p class="add-new-btn"><a href="javascript:void(0);" class="modalform" onclick="$('#modal_add_address_sp').dialog('open');">+ ADD NEW ADDRESS</a></p>
                                                </div>
                                        <div id="locations_content">
                                        <?php
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
                                                <?php $counting++;} ?>
                                                <!-- tooltip -->
                                                <span>&nbsp;</span>
                                        </div>
                                            </div><!-- /tab-content -->

                                        </div></div><!-- /main column -->
                                    <?php include_once 'sidebar_provider.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->
                        <?php include_once 'dashboard_inner.php';?>
                    </div></div><!-- /body -->
            </div></div><!-- /container -->
            <?php include_once 'footer1.php';
                include_once 'add_addresses_sp.php';
                include_once 'edit_provider_address.php';
                include_once 'changes_password.php';
                include_once 'provider_subscription.php';
                include_once 'status_subscription.php';
                include_once 'login_header.php';
            ?>
    </body>
</html>