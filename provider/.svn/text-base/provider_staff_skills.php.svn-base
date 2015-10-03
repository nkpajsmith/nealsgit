<?php session_start();
include_once '../dao/experience.php';
include_once '../dao/staff.php';

if(isset($_SESSION['staff_id1'])){
    unset($_SESSION['staff_id1']);
}

if(isset($_SESSION['staff_id'])){
    unset($_SESSION['staff_id']);
}

if(isset($_SESSION['parent_id'])){
    unset($_SESSION['parent_id']);
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher&trade;</title>
        <?php include_once '../includes/scripts_provider.php';?>

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
        include_once '../dao/address.php';
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">

                <?php include_once '../includes/header_provider.php';?>

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

                                    <h2><a href="provider_home.php">My Account Home </a></h2>
                                    <h1><a href="#">Staff & Skills</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                <ul class="clearfix">
                                                    <li><a href="provider_profile.php"><span>At a Glance</span></a></li>
                                                    <li><a href="provider_locations.php"><span>Contact</span></a></li>
                                                    <li><a href="provider_services.php"><span>Services</span></a></li>
                                                    <li class="active"><a href="provider_staff_skills.php"><span>Staff & Skills</span></a></li>
                                                    <li><a href="provider_references.php"><span>Reference</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->

                                            <div id="skill_content" class="tab-content">
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
                                                                        <p class="address-box-show"><a id="show_box_<?php echo $staff_checker;?>"href="javascript: void(0);" onClick="$('#staff_container<?php echo $staff_checker;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $staff_checker;?>'))">View/Edit Skils</a></p>
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
                                                        <?php $staff_checker++;} ?>
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
        include_once '../popups/add_staff.php';
        include_once '../popups/selected_skills.php';
        include_once '../popups/provider_subscription.php';
        include_once '../popups/status_subscription.php';
        include_once '../popups/login_header.php';
        include_once '../popups/edit_staff.php';?>
    </body>
</html>