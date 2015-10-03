<?php session_start();


include_once 'serviceskills.php';?>
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
        include_once "search.php";
        include_once "address.php";
        include_once "provider.php";
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

                                <!-- user-notify-content -->
                                <?php include_once("header_login.php"); ?>

                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">Account Home </a></h2>
                                    <h1>My Profile</h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                <ul class="clearfix">
                                                    <li class="active"><a href="provider_profile.php"><span>At a Glance</span></a></li>
                                                    <li><a href="provider_locations.php"><span>Contact</span></a></li>
                                                    <li><a href="provider_services.php"><span>Services</span></a></li>
                                                    <li><a href="provider_staff_skills.php"><span>Staff & Skills</span></a></li>
                                                    <li class="last"><a href="provider_references.php"><span>Reference</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->
 
                                            <!-- tab-content -->
                                           <div class="tab-content">
                                            <?php $query1 = pg_query_params("SELECT serviceprovider_id,contactemailaddress FROM techmatcher.serviceprovider where serviceprovider_id= $1", array($_SESSION['provider']['serviceprovider_id']));
                                                $email_fetch=pg_fetch_all($query1);
                                                $_SESSION['provider']['contactemailaddress']=$email_fetch[0]['contactemailaddress']; ?>
                                             <?php $query = pg_query_params("SELECT serviceprovider_id,profilecomplete,subscriber,matches, subscriptionenddate FROM techmatcher.serviceprovider_ataglance where serviceprovider_id= $1", array($_SESSION['provider']['serviceprovider_id']));
                                                $at_a_glance_sp=pg_fetch_all($query);?>
                                                <!-- section -->
                                                <div class="section clearfix">
                                                    <ul class="at-a-glance">
                                                        <li>
                                                            <?php if($at_a_glance_sp[0]['profilecomplete'] == 'N'){?>
                                                            <span class="data-value"><?php echo $at_a_glance_sp[0]['profilecomplete'];?></span>
                                                            <p>Your profile has not been completed </p>
                                                            <?php }else{?>
                                                            <span class="data-value"><?php echo $at_a_glance_sp[0]['profilecomplete'];?></span>
                                                            <p>Your profile is complete </p>
                                                            <?php }?>
                                                        </li>
                                                        <li>
                                                            <?php if($at_a_glance_sp[0]['subscriber'] == 'N'){?>
                                                            <span class="data-value"><?php echo $at_a_glance_sp[0]['subscriber'];?></span>
                                                            <p>You are not currently subscribed.</p>
                                                            <?php }else{?>
                                                            <span class="data-value"><?php echo $at_a_glance_sp[0]['subscriber'];?></span>
                                                            <p>You are subscribed. Thanks! <br/>Your subscription will end on <?php echo $at_a_glance_sp[0]['subscriptionenddate'];?></p>
                                                            <?php }?>
                                                        </li> 
                                                        <?php
                                                       
                                                        if ($at_a_glance_sp[0]['matches']==0) {
                                                          $customer_count=get_customer_counts($_SESSION['provider']['serviceprovider_id']);
                                                          if ($customer_count['count'] > 0) { 
                                                              echo '<li>';
                                                              echo '<span class="data-value">';echo $customer_count['count']; echo'</span>';
                                                              echo '<p>Potential customers in your metro area. </p>';
                                                              echo '</li>'; }
                                                        } else { 
                                                        echo '<li>';
                                                              echo '<span class="data-value">';echo $at_a_glance_sp[0]['matches']; echo'</span>';
                                                            echo '<p>Matches found in our database for your organization </p>';
                                                        echo '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div><!-- /section -->
                                                <?php $qry_last_update = pg_query_params("select lastupdatedate from techmatcher.serviceprovider where serviceprovider_id = $1", array($_SESSION['provider']['serviceprovider_id']));
                                                $last_update = pg_fetch_array($qry_last_update);
                                                $last_update1 = substr($last_update[0],0,11);

                                                // modify it to the provider tip txt...
                                                $test1 = "select usertip_txt_id from techmatcher.usertips_text where usertip_type = $1";
                                                $res= pg_query_params($test1,array('provider'));
                                                
                                                // making it random...with in the array...
                                                $arr = array();
                                                while($result = pg_fetch_array($res)) {
                                                    array_push($arr, $result);                                                    
                                                }
                                                $arr_size      = sizeof($arr);
                                                $r1=rand($arr[0][0],$arr[$arr_size-1][0]);                                              


                                                $sql = "SELECT usertip_txt_text FROM techmatcher.usertips_text WHERE usertip_txt_id = $1";
                                                $rrww= pg_query_params($sql,array($r1));
                                                $tt=pg_fetch_all($rrww);?>
                                                <h4><span>Profile History</span></h4>
                                                <p>Welcome to your company's profile. The profile is a powerful element of our matching process. The more detail you provide the better your chances of having customers find you. Your account was last updated on <?php echo $last_update1;?></p>
                                                <h4><span>Service Provider Tip</span></h4>
                                                <p><?php echo $tt[0]["usertip_txt_text"];?></p>
                                                <h2>To learn how Techmatcher can help you. Check out this <i><a style="text-decoration:underline; color: #f8930d;" href="video.php"> video </a></i></h2>

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
              include_once 'provider_subscription.php';
              include_once 'status_subscription.php';
              include_once 'login_header.php';
       ?>
    </body>
</html>
