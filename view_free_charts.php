<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Free Sample Market Analysis</title>
        <?php include_once 'common_functions.php';?>
			<script src="js/jquery.js" type="text/javascript"></script>
			<script src="js/default.js" type="text/javascript"></script>
			<script src="js/ie-dropdown.js" type="text/javascript"></script>
			<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
			<script src="js/jquery.corner.js" type="text/javascript"></script>
			<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
			<script src="js/modals.js" type="text/javascript"></script>
			<script type="text/javascript" src="../js/cluetip/jquery.cluetip.js"></script>
			<script type="text/javascript" src="../js/tooltips.js"></script>
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
        <?php include_once "search.php";?>
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">

                <?php include_once 'header_provider_tour.php';?>

                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                        
                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2>Techmatcher U Presents</h2>
                                    <h1>Free Market Analysis</h1>




						<!-- fw-section -->
						<div class="fw-section-b"><div class="fw-section-b-inner">
							
							<!-- profile feature boxes -->
							<div class="profile-feature-box-row clearfix">
																
								<!-- profile feature box -->
								<div class="profile-feature-box">
									<h3 class="profile-feature-free-analytics"><a href="javascript: void(0);" onclick="return load_glob_stats_chart();">Customer Searches (Daily)</a></h3>
									<div class="profile-feature-box-content">
									<p>Get a quick picture of what is happening in the market served by Techmatcher.  This chart shows the trend in customers searching.  Play with different time frames to see the level of action over different periods.</p>
									</div>
								</div>
									<!-- profile feature box -->
								<div class="profile-feature-box profile-feature-box-right">
								<h3 class="profile-feature-free-analytics"><a href="javascript: void(0);" onclick="return load_service_pop_chart();">Most Popular Services</a></h3>

									<div class="profile-feature-box-content">
									<p>This chart gives you a flavor of what is needed in the market.  The services that are most popular are those in demand. How do your offerings compare? </p>
								
									</div>
								</div>
						
							</div>
							
							<!-- profile feature boxes -->
							<div class="profile-feature-box-row clearfix">
								
								
								<!-- profile feature box -->
								<div class="profile-feature-box">
								<?php
								if ($_SESSION['provider']['serviceprovider_id']=='') { 
								echo 	'<h3 class="profile-feature-edit-your-profile"><a href="javascript: void(0);" onclick="	return open_login_provider_dialog()">Login to Your Profile</a></h3>';
								} else {
								echo    '<h3 class="profile-feature-edit-your-profile"><a href="provider/provider_home.php">Main Provider Page</a></h3>';}
								?>
								<div class="profile-feature-box-content">
									<p>Go to the launch pad for all the Provider activities.</p>
									</div>
								</div>
								
								<!-- profile feature box -->
								<div class="profile-feature-box profile-feature-box">
									<h3 class="profile-feature-take-tour"><a href="provider_tour.php">Go to the Tour</a></h3>
									<div class="profile-feature-box-content">
									<p>New to Techmatcher?  Need a refresher on how to maximize your results?  Take the Tour and learn how Techmatcher helps you build your business.</p>
									</div>
								</div>
							</div>
						</div></div><!--/fw-section-->

                                    <div class="clear"></div>

                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->


                        <?php include_once 'dashboard.php';?>

                    </div></div><!-- /body -->

            </div></div><!-- /container -->

        <?php include_once 'footer1.php';
                 include_once 'login_logout_dao.php';
                 include_once 'signup.php';
                 include_once 'login_provider.php';
                 include_once 'forgot_password.php';?>

    </body>
</html>