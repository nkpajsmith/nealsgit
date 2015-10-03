<?php session_start();
include_once 'staff.php';
include_once 'reference.php';
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
        <?php include_once 'scripts_provider.php';?>

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
        include_once("search.php");
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
                <?php include_once 'header_provider.php';?>

                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
                                <?php include_once("header_login.php"); ?>
                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">My Account Home </a></h2>
                                    <h1><a href="#">References</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                <ul class="clearfix">
                                                    <li><a href="provider_profile.php"><span>At a Glance</span></a></li>
                                                    <li><a href="provider_locations.php"><span>Contact</span></a></li>
                                                    <li><a href="provider_services.php"><span>Services</span></a></li>
                                                    <li><a href="provider_staff_skills.php"><span>Staff & Skills</span></a></li>
                                                    <li class="active"><a href="provider_references.php"><span>Reference</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->

                                            <div id="tab_content" class="tab-content">
                                                <h3>List your References</h3>
                                                <p>As a great Service Provider you have some customers that can support you in attracting new customers. </p>
                                            <p><i>(Techmatcher will not share your reference customer information with anyone.  We will only report a count of references you've offered.  Techmatcher does audit and verify the references to keep our data reliable.)</i> </p>
                                            <p>List as many as you want.</p>

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
                                                                <label>Reference name:</label>
                                                                <label><?php echo $get_names[0]['itconsumername'];?></label>
                                                            </div>

                                                            <div class="row">
                                                                <label>Email Address:</label>
                                                                    <?php echo $get_names[0]['itconsumer_emailaddress'];?>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                    <?php $flagzz++;} ?>
                                                <!-- tooltip -->

                                                <span>&nbsp;</span>                                                

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
            include_once 'add_reference.php';
            include_once 'provider_subscription.php';
            include_once 'login_header.php';
            include_once 'status_subscription.php';?>

    </body>
</html>