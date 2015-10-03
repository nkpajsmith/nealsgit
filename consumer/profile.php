<?php session_start();

if(isset($_SESSION['cookie_selected']) && $_SESSION['cookie_selected'] == 'savecookie') {
    $value = 'consumer_'.$_SESSION['consumer']['itconsumer_emailaddress'];
    $Month = 15552000 + time(); // 180 days
    setcookie("user_visit", $value, $Month,"/techmatcher/");
}

if(isset($_SESSION['securimage_code_value'])){
    unset($_SESSION['securimage_code_value']);
}

if(isset($_SESSION['securimage_code_ctime'])){
    unset($_SESSION['securimage_code_ctime']);
}

if(isset($_SESSION["search_id"])){
    unset($_SESSION["search_id"]);
}

if(isset($_SESSION['records'])){
    unset($_SESSION['records']);
}

if(isset($_SESSION['providers_count'])){
    unset($_SESSION['providers_count']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Tech User Profile</title>
        <?php require_once 'scripts_consumer.php';?>

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
        require_once 'search.php';
        require_once 'consumer.php';
        require_once 'address.php';       
        $consumer = consumer_findByEmail($_SESSION['consumer']['itconsumer_emailaddress']);
        ?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
                <?php require_once 'header_consumer.php';?>
                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>

                                <!-- user-notify-content -->
                                <?php require_once("header_login.php"); ?>

                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2>My Account Home </a></h2>
                                    <h1>Consumer Profile</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix tp-progress">
                                                <ul class="clearfix">
                                                    <li class="active"><a href="profile.php"><span>At a Glance</span></a></li>
                                                    <li class="next"><a href="locations.php"><span>Locations</span></a></li>
                                                    <li><a href="organization_details.php"><span>Your Details</span></a></li>
                                                    <li class="last"><a href="referrals.php"><span>Referrals</span></a></li>
                                                </ul>                                                
                                            </div><!-- /tab-panel -->

                                            <!-- tab-content -->
                                            <div class="tab-content">

                                                <!-- section -->
                                                <div class="section clearfix">
                                                    <?php
                                                    // fetching records from ataglance view...
                                                    $query = pg_query_params("SELECT itconsumer_id,activesubscriber,profilecompletestatus,subscriptionenddate,matchesfound FROM techmatcher.consumer_ataglance where itconsumer_id= $1", array($_SESSION['consumer']['itconsumer_id']));
                                                    $at_a_glance_records=pg_fetch_all($query);
                                                    ?>

                                                    <ul class="at-a-glance">
                                                        <li>
                                                            <?php if($at_a_glance_records[0]['profilecompletestatus'] == 'Profile Incomplete') { ?>
                                                            <span class="data-value">N</span>
                                                            <p>Your profile has not been completed.  Click on the tabs above (start with Locations) and fill out the details to get great matches. </p>
                                                                <?php }else { ?>
                                                            <span class="data-value">Y</span>
                                                            <p>Awesome, your profile is complete.  Now Get Your Matches! </p>
                                                                <?php } ?>

                                                        </li>
                                                        <li>
                                                            <?php if($at_a_glance_records[0]['subscriptionenddate'] == NULL) {?>
                                                            <span class="data-value"><?php echo 'N'; // modify it later...?></span>
                                                            <p>You are not currently subscribed.</p>
                                                                <?php }else {?>
                                                            <span class="data-value"><?php echo $at_a_glance_records[0]['activesubscriber'];?></span>
                                                            <p>You are a Subscriber. <br/>Your Subscription will end on <?php echo $at_a_glance_records[0]['subscriptionenddate'];?> </p>
                                                                <?php } ?>
                                                        </li>
                                                        <li>
                                                            <span class="data-value"><?php echo $at_a_glance_records[0]['matchesfound'];?></span>
                                                            <p>Matches you have found.  Try a free match or click Match Now to get matched.</p>
                                                        </li>
                                                    </ul>
                                                </div><!-- /section -->
                                                <?php // getting last update from DB
                                                $qry_last_update = pg_query_params("select lastupdatedate from techmatcher.itconsumer where itconsumer_id = $1", array($_SESSION['consumer']['itconsumer_id']));
                                                $last_update = pg_fetch_array($qry_last_update);
                                                $last_update1 = substr($last_update[0],0,11);

                                                // have to modify this code .....

                                                $test1 = "select usertip_txt_id from techmatcher.usertips_text where usertip_type = $1";
                                                $res= pg_query_params($test1,array('consumer'));
                                                
                                                $arr = array();
                                                while($result = pg_fetch_array($res)) {
                                                    array_push($arr, $result);
                                                }
                                                $arr_size      = sizeof($arr);
                                                $r1=rand($arr[0][0],$arr[$arr_size-1][0]);

                                                $sql = "SELECT usertip_txt_text FROM techmatcher.usertips_text WHERE usertip_txt_id = $1";
                                                $rrww= pg_query_params($sql,array($r1));
                                                $tt=pg_fetch_all($rrww);
                                                ?>
                                                <h4><span>Profile History</span></h4>
                                                <p>Welcome to your personal profile. The profile is a powerful element of our matching process. Your account was last updated on <?php echo $last_update1;?></p>
                                                <h4><span>Tech User Tip</span></h4>
                                                <p><?php echo $tt[0]["usertip_txt_text"];?></p>
                                            </div><!-- /tab-content -->
                                        </div></div><!-- /main column -->
                                    <?php require_once 'sidebar_consumer.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php require_once 'footer1.php';
        require_once 'advance_search_progress_bar.php';
        require_once 'login_consumer.php';
        require_once 'login_header.php';
        require_once 'login_both.php';
        require_once 'advance_search.php';
        require_once 'consumer_subscription.php';
        require_once 'status_subscription.php';
        $_SESSION['cookie_selected'] = '';
        unset($_SESSION['cookie_selected']);
        unset($_SESSION['type']);?>
    </body>
</html>