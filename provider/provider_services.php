<?php session_start();
include_once '../dao/service.php';?>
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
        include_once "../dao/search.php";
        include_once "../dao/address.php";
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
         <img id="load" src="../images/loader.gif" border="0" style="z-index:1001; position:absolute; top: 404px; left: 516px; display: none; "/>
        <div id="main" style=" background-color:gray; position:absolute; width: 100%; height: 100%; z-index:1000; display: none;"> </div>
                <?php include_once '../includes/header_provider.php';?>
                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
                                <?php include_once("../includes/header_login.php"); ?>
                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">My Account Home </a></h2>
                                    <h1><a href="#">Services</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                <ul class="clearfix">
                                                    <li><a href="provider_profile.php"><span>At a Glance</span></a></li>
                                                    <li><a href="provider_locations.php"><span>Contact</span></a></li>
                                                    <li class="active"><a href="provider_services.php"><span>Services</span></a></li>
                                                    <li><a href="provider_staff_skills.php"><span>Staff & Skills</span></a></li>
                                                    <li><a href="provider_references.php"><span>Reference</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->

                                            <div id="tab_content" class="tab-content">
                                                <h4><span>Service Statement</span></h4>
                                                <?php $service_name_is="Company Service Statement for ".$_SESSION['provider']['primaryname'];
                                                $qry = pg_query_params("select servicedescr from techmatcher.services where servicename = $1", array($service_name_is));
                                                      $description = pg_fetch_all($qry);                                                     
                                                      if(empty($description) && $desription == ''){
                                                ?>
                                                <div class="square_box_holder">
                                                    <div style="padding-left: 10px; padding-right: 10px;">No Service Statement set for your company. Press the Change button and set it. </div>
                                                      
                                                </div>
                                                <?php }else{?>
                                                <div class="square_box_holder">
                                                    <div style="padding-left: 10px; padding-right: 10px;"><?php echo $description[0]['servicedescr']; ?> </div>
                                                </div>
                                                <?php } ?>

                                                <div class="add-new-address clearfix">
                                                    <p class="add-new-btn"><a href="javascript:void(0)" onclick="open_service_statement_dialog();">+ CHANGE</a></p>
                                                </div>
                                                
                                                <!-- section -->
                                                
                                                <h4><span>Detailed Services</span></h4>
							<!-- add address button -->
							<div class="add-new-address clearfix">
                                                            <p class="add-new-btn"><a href="javascript:void(0)" onclick="open_add_new_services_dialog();">+ ADD NEW SERVICES</a></p>
							</div>

                                                        <?php
                                                            $service_idd=get_service_id($_SESSION['provider']['serviceprovider_id']);
                                                            $resultt=count($service_idd);
                                                            $flag=0;
                                                            while ($resultt>$flag){
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
                                                        <?php $flag++;} ?>
                                                        <!-- tooltip -->
                                                        <span>&nbsp;</span>

                                            </div><!-- /tab-content -->
                                        </div></div><!-- /main column -->

                                    <?php include_once '../includes/sidebar_provider.php';?>

                                    <div class="clear"></div>

                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                        <?php include_once '../includes/dashboard_inner.php';?>

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';
        include_once '../popups/add_services.php';
        include_once '../popups/change_service_statement.php';
        include_once '../popups/provider_subscription.php';
        include_once '../popups/status_subscription.php';
        include_once '../popups/login_header.php';
        ?>

    </body>
</html>