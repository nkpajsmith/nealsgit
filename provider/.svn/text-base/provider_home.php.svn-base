<?php session_start();

// setting cookies
if(isset($_SESSION['cookie_selected']) && $_SESSION['cookie_selected'] == 'savecookie') {
    $value = 'provider_'.$_SESSION['provider']['contactemailaddress'];
    $Month = 15552000 + time(); // 180 days
    setcookie("user_visit", $value, $Month,"/techmatcher/");
}

if(isset($_SESSION['securimage_code_value'])){
    unset($_SESSION['securimage_code_value']);
}

if(isset($_SESSION['securimage_code_ctime'])){
    unset($_SESSION['securimage_code_ctime']);
}
include_once 'consumer.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Provider Home</title>

        
        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

    	<!--[if lte IE 6]>
		<link rel="stylesheet" href="../css/ie6.css" type="text/css" media="screen, projection" />
		<![endif]-->
		<!--[if lte IE 7]>
		<link rel="stylesheet" href="../css/ie7.css" type="text/css" media="screen, projection" />
		<![endif]-->
		
		<!-- js -->
		<!--[if lte IE 6]>
			<script type="text/javascript" src="../ie6pngfix/fix-min.js"></script>
			<script type="text/javascript" src="../ie6pngfix/fixes.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="../js/modals.js"></script>
		
		<script type="text/javascript" src="../js/cluetip/jquery.cluetip.js"></script>
		<script type="text/javascript" src="../js/tooltips.js"></script>
		

    
    
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

                <?php include_once 'header_provider.php';?>

                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
                                <?php include_once "header_login.php";?>
                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2>My Account Home</h2>
									<h1>Toolbox <img src="../images/icon-tools.png" alt="icon" class="headline-icon" /></h1>

								<!-- get enhanced callout -->
									<div class="get-enhanced-callout">
									  <?php $subsRecord= getSubscriptionRecordView($_SESSION['provider']['serviceprovider_id']); //subscription record from history
                                                            if($subsRecord !=""){
                                                              echo  '<a href="analytics.php">Analyze and Improve Your Market Strategy! <img src="../images/icon-gears-enhanced.png" alt="" /></a></li>';
                                                            }else{
                                                            echo    '<a href="javascript: void(0);" class="disable" onclick="show_subscription_msg();">Analyze and Improve Your Market Strategy!<img src="../images/icon-gears-enhanced.png" alt="Advanced Analytics" /></a></li>';
									                      }
									    ?>
									</div>
                               <?php include_once "dashboard_inner_provider_home.php";?>
						<!-- fw-section -->
						<div class="fw-section-b"><div class="fw-section-b-inner">
							
							<!-- profile feature boxes -->
							<div class="profile-feature-box-row clearfix">
								<!-- profile feature box -->
								<div class="profile-feature-box">
									<h3 class="profile-feature-manage-account"><a href="provider_profile.php">Manage/Upgrade Profile</a></h3>
									<div class="profile-feature-box-content">
									<p>Your profile is your what is presented to Tech Users who are searching for you.  Filling it in completely, carefully and 
									keeping up to date is essential to successfully being found.  Providers with rich profiles are found more often, 
									more highly rated and more successful in securing new customers.</p>
									</div>
								</div>
								
								<!-- profile feature box -->
								<div class="profile-feature-box profile-feature-box-right">
									<h3 class="profile-feature-free-analytics"><a href="../view_free_charts.php">Free Market Analysis</a></h3>
									<div class="profile-feature-box-content">
									<p>Get a quick picture of what is happening in the market served by Techmatcher.  These free snapshots are updated instantly when the system is used and give you a taste of what Techmatcher can do to show you how to be effective in marketing your firm.</p>
									</div>
								</div>
							</div>
							
							<!-- profile feature boxes -->
							<div class="profile-feature-box-row clearfix">
								<!-- profile feature box -->
								<div class="profile-feature-box">
									<h3 class="profile-feature-take-tour"><a href="../provider_tour.php">Take the Tour</a></h3>
									<div class="profile-feature-box-content">
									<p>New to Techmatcher?  Need a refresher on how to maximize your results?  Take the Tour and learn how Techmatcher helps you build your business.</p>
									</div>
								</div>
								
								<!-- profile feature box -->
								<div class="profile-feature-box profile-feature-box-right">
									<h3 class="profile-feature-edit-your-profile"><a href="provider_products.php">Subscribe Now!</a></h3>
									<div class="profile-feature-box-content">
									<p>Techmatcher Subscribers have access to an ever growing list of analyic tools to help you gain your strategic edge in your desired market.  You can see what services are hot  in your specific service territory.  You can learn how much competition you have for your customers.  You can discover niche offerings that set you apart.  And much more...  <b>Click here to unlock your potential!</b></p>
									</div>
								</div>
							</div>
						</div></div><!--/fw-section-->
                                    <div class="clear"></div>

                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->


                    </div></div><!-- /body -->

            </div></div><!-- /container -->

        <?php include_once 'footer1.php';
              include_once 'provider_subscription.php';
              include_once 'status_subscription.php';?>
    </body>
</html>