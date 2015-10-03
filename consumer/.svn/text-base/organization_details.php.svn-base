<?php session_start();
include_once '../dao/consumer.php';
include_once '../dao/serviceskills.php';
include_once '../dao/address.php';
include_once("../dao/search.php");
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
        <?php include '../includes/scripts_consumer.php';?>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

        <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" src="../js/modals.js"></script>
        <script type="text/javascript" src="../js/cluetip/jquery.cluetip.js"></script>
        <script type="text/javascript" src="../js/tooltips.js"></script>
        <script src="../js/default.js" type="text/javascript"></script>

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

                                    <h2><a href="profile.php">My Account Home </a></h2>
                                    <h1><a href="organization_details.php">Organizational Details</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix tp-progress">
                                                <ul class="clearfix">
                                                    <li class="completed"><a href="profile.php"><span>At a Glance</span></a></li>
                                                    <li class="completed"><a href="locations.php"><span>Locations</span></a></li>
                                                    <li class="active"><a href="organization_details.php"><span>Your Details</span></a></li>
                                                    <li class="next last"><a href="referrals.php"><span>Referrals</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->

                                            <!-- tab-content -->
                                            <div class="tab-content">

                                                <?php $qry = pg_query_params("select itconsumeranalog_id from techmatcher.itconsumeranalogselected where itconsumer_id = $1",array($_SESSION['consumer']['itconsumer_id']));
                                                $result = pg_num_rows($qry);
                                                if($result >0) { // record is present
                                                    ?>
                                                <!-- section -->

                                                <div id="bck" class="popup_grey_holder">
                                                    <div  class="head"></div>

                                                    <div class="mid">
                                                        <div class="edit_btn">
                                                    <a id="back_btn"href="javascript: void(0)" onclick="disable_popup();"><img src="../images/modal-edit.png" class="edit_img" /></a>
                                                        </div>
                                                     </div>
                                                    <div class="foot"></div>
                                                </div>

                                               <!-- <div id="bck" class="popup_bck"></div>
                                                <div id="back_btn" class="popUp_btn"><a href="javascript: void(0)" onclick="disable_popup();"><img src="../images/edit.gif"/></a></div>-->
                                                <div class="section clearfix">
                                                    <div class="fw-section" id="basic-info-1"><div class="fw-section-inner" style="width: 487px;">
                                                            <h3>Which of the following best describes you?</h3>
                                                            <!-- radio-container -->
                                                            <div class="radio-container">
                                                                    <?php
                                                                    $query = pg_query_params("SELECT  distinct subscribertypename, subscribertype_Id FROM techmatcher.itconsumer_profile_selections",array());
                                                                    while($result = pg_fetch_assoc($query)) {?>
                                                                <!-- choice-one-three -->
                                                                <div class="choice-one-three">
                                                                    <input name="choice" type="radio" value="<?php echo $result['subscribertypename'];?>" onclick="show_analog_size('<?php echo $result['subscribertype_id'];?>');"/>
                                                                    <label><?php echo $result['subscribertypename']; ?></label>
                                                                </div><!--/choice-one-three-->
                                                                        <?php  }?>
                                                            </div><!--/radio-container-->
                                                        </div></div><!--/section-->

                                                    <!-- section -->
                                                        <?php $qry2 = pg_query_params("select subscribertype_id from techmatcher.itconsumer where itconsumer_id = $1", array($_SESSION['consumer']['itconsumer_id']));
                                                        $record = pg_fetch_array($qry2);
                                                        $subscriptiontype_id = $record[0];

                                                        $promp2 = pg_query_params("SELECT distinct orgdetailcategory_sdesc, orgdetailname, orgdetail_id,sectionheadertxt
                                                                FROM techmatcher.itconsumer_profile_selections where profileselectionorder=1
                                                                and subscribertype_id=$1 order by orgdetail_id",array($subscriptiontype_id));
                                                        $arr = array();
                                                        while($result = pg_fetch_array($promp2)) {
                                                            array_push($arr, $result);
                                                        }
                                                        ?>

                                                    <div class="fw-section" id="basic-info-2"> <div class="fw-section-inner" style="width: 487px;">
                                                            <h3><?php echo $arr[0][3];?></h3>
                                                            <!-- radio-container -->
                                                            <div class="radio-container clearfix">
                                                                <!-- choice-one-three -->
                                                                    <?php   foreach($arr as $key => $value) { ?>
                                                                <div class="choice-one-three">
                                                                    <input name="choice1" type="radio" id="<?php echo $arr[$key][1];?>" onclick="get_analog_staffing('<?php echo $arr[0][2]; ?>','<?php echo $subscriptiontype_id; ?>');"/>
                                                                    <label for="<?php echo $arr[$key][1];?>"><?php echo $arr[$key][1]; ?></label>
                                                                </div><!--/choice-one-three-->
                                                                        <?php } ?>
                                                            </div><!--/radio-container-->
                                                        </div>
                                                    </div><!--/section-->
                                                        <?php $promp3 = pg_query_params("SELECT  distinct orgdetailcategory_sdesc, orgdetailname, orgdetail_id,sectionheadertxt
                                                                FROM techmatcher.itconsumer_profile_selections where profileselectionorder=2 and subscribertype_id=$1 order by orgdetail_id" ,array($subscriptiontype_id));
                                                        $arr1 = array();
                                                        while($result1 = pg_fetch_array($promp3)) {
                                                            array_push($arr1, $result1);
                                                        }?>
                                                    <!-- section -->
                                                    <div class="fw-section" id="basic-info-3"> <div class="fw-section-inner" style="width: 487px;">
                                                            <h3><?php echo $arr1[0][3];?></h3>
                                                            <!-- radio-container -->
                                                            <div class="radio-container clearfix">
                                                                <!-- choice-one-three -->
                                                                    <?php   foreach($arr1 as $key => $value) {

                                                                        ?>

                                                                <div class="choice-one-three">
                                                                    <input name="choice2" type="radio" id="<?php echo $arr1[$key][1];?>" onclick="show_analogs('<?php echo $arr1[$key][2]; ?>','<?php echo $arr[0][2]; ?>','<?php echo $subscriptiontype_id; ?>');"/>
                                                                    <label for="<?php echo $arr1[$key][1];?>"><?php echo $arr1[$key][1]; ?></label>
                                                                </div><!--/choice-one-three-->
                                                                        <?php } ?>
                                                            </div><!--/radio-container-->
                                                        </div>
                                                    </div><!--/section-->
                                                        <?php
                                                        $result2 = pg_fetch_array($qry);
                                                        
                                                        $query7=pg_query_params("select itconsumeranalogdate from techmatcher.itconsumer_profile_selections where itconsumeranalog_id = $1", array($result2[0]));
                                                        $analog_date = pg_fetch_assoc($query7);
                                                        
                                                        $query3 = pg_query_params("select analogtext, analog_text_header from techmatcher.itconsumeranalog where itconsumeranalog_id=$1",array($result2[0]));
                                                        while($result3 = pg_fetch_array($query3)) {?>
                                                    <!-- section -->
                                                    <div class="fw-section" id="basic-info-4"> <div id ="change" class="fw-section-inner" style="width: 487px;">
                                                            <h3>Here&rsquo;s the picture we&rsquo;re getting&hellip;</h3>
                                                            <h2><?php echo $result3[1];?></h2>
                                                            <div><p><?php echo $result3[0]; ?></p>
                                                                <input type="hidden" id="analog_id" value="<?php echo $result2[0]; ?>"/>
                                                                <input type="hidden" id="analog_date" value="<?php echo $analog_date['itconsumeranalogdate']; ?>"/>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div id="select_status" style="margin:0px; color: red;"> </div>
                                                     </div>
                                                </div><!-- /section -->

                                                    <?php }else { // if not present?>
                                                <div id="bck" class="popup_bck" style="display: none;"></div>
                                                <div id="back_btn" class="popUp_btn" style="display: none;"><a href="javascript: void(0)" onclick="disable_popup();"><img src="../images/edit.gif"/></a></div>
                                                <!-- section -->
                                                <div class="section clearfix">                                                   
                                                    <div class="fw-section" id="basic-info-1"><div class="fw-section-inner" style="width: 487px;">
                                                            <h3>Which of the following best describes you?</h3>

                                                            <!-- radio-container -->
                                                            <div class="radio-container">
                                                                    <?php
                                                                    $query = pg_query_params("SELECT  distinct subscribertypename, subscribertype_Id FROM techmatcher.itconsumer_profile_selections",array());
                                                                    while($result = pg_fetch_assoc($query)) {?>
                                                                <!-- choice-one-three -->
                                                                <div class="choice-one-three">
                                                                    <input name="choice" type="radio" value="<?php echo $result['subscribertypename'];?>" onclick="show_analog_size('<?php echo $result['subscribertype_id'];?>');"/>
                                                                    <label><?php echo $result['subscribertypename']; ?></label>
                                                                </div><!--/choice-one-three-->
                                                                        <?php  }?>
                                                            </div><!--/radio-container-->

                                                        </div></div><!--/section-->

                                                    <!-- section -->
                                                    <div class="fw-section" id="basic-info-2">
                                                    </div><!--/section-->
                                                    <!-- section -->
                                                    <div class="fw-section" id="basic-info-3">
                                                    </div><!--/section-->

                                                    <!-- section -->
                                                    <div class="fw-section" id="basic-info-4">
                                                    </div>
                                                </div><!-- /section -->

                                                    <?php }?>
                                            </div><!-- /tab-content -->

                                        </div></div><!-- /main column -->
 
                                    <?php include_once '../includes/sidebar_consumer_tour.php';?>

                                    <div class="clear"></div>
                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';
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