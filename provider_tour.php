<?php session_start();
include_once 'login_logout_dao.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <!-- title -->
        <title>Techmatcher | Service Provider Tour</title>

        <!-- css  -->
        <link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />   
       	<script src="js/ie-dropdown.js" type="text/javascript"></script>
 		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/default.js" type="text/javascript"></script>
		<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
		<script src="js/jquery.corner.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
		<script src="js/modals.js" type="text/javascript"></script>

		<!--PrettyPhoto Block 
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
         <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
         <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>-->
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
                <?php include_once 'header_provider_tour.php';?> 
               <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">
                      
                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div>
                                 <div class="page-container-inner clearfix">
                   
						 <h2>Techmatcher U. Presents:</h2>
						<h1>The Tour!</h1>

                                    <!-- main column -->
                                    <div class="main">
                                    <div class="main-inner">

                                <!-- tab-panel -->
                                <div class="tab-panel-b clearfix">
                                       <h3> All the Core Techmatcher Features 1, 2, 3! </h3>
                                <p></p>
                                    <h5>Get Started by Activating Your Firm! </h5>
                                            <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
                                                 Follow these simple steps to make your company searchable and to access your account.
                                            </p> 
                                            		<ol style="list-style-type: lower-alpha; margin-left:20px; font-size: 90%; font-weight:normal">
                                            		  <ol>
                                            		    <li>To get started you need the Post Card you got in the mail with your company code. </li>
                                            		    <li>Click on the Green Action Button on the side of this page to go to the activation screen. </li>
                                            		    <li>Fill in the information, pick a password and contact email and you are ready to go!</li>
                                          		    </ol>
                                           		  </ol>
                           		  <h5>Create Your Profile and Be Found! </h5>
													  <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%"> 
                                                     Build a compelling profile that gets matches.  
                                                      </p>
                                            		  <ol style="list-style-type: lower-alpha; margin-left:20px; font-size: 90%; font-weight:normal">
                                            		  <ol>
                                            		    <li>To get started login or activate your account.  </li>
                                            		    <li>On either the side-bar menu or the Provider Home Page click on Manage My Profile</li>
                                            		    <li>The profile has tabs for Contact info, Services, Staff and Skills, and References.  Fill out the information in these tabs as completely as possible for more matches.</li>
                                          		    </ol>
                                           		  </ol>
                               <h5> Take a Free Look at the Market!</h5>
													  <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
														Examine the free analysis to see what we have to offer .
														</p>
                                            		  		<ol style="list-style-type: lower-alpha; margin-left:20px; font-size: 90%; font-weight:normal">
                                            		  <ol>
                                            		    <li>Click on Free Analytics on the side-bar. </li>
                                            		    <li>On the page that opens select the Daily Searches to see how active users are in searching.  Use the date range picker to pick a timeframe that gives you the best picture of activity.  You can download a table of the data to keep if you'd like.</li>
                                            		    <li>Go back to the Free Analytics page and select the Most Poplular Services.  See how this compares to what you offer?  Check this chart regularly to see changes in the needs for services.</li>
                                          		    </ol>
                                           		  </ol>
                                <h5>  Subscribe to Unlock Deeper Market Research!</h5>
                                           		       <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
                                           		       Fill out a subscription level that fits you and unlock the deeper analytical tools.
                                           		       </p>
                                            		  		<ol style="list-style-type: lower-alpha; margin-left:20px; font-size: 90%; font-weight:normal">
                                            		  <ol>
                                            		    <li>A subscription will unlock advanced analytics, click on Subscriptions to start.</li>
                                            		    <li>The product page opens and with a full description of the benefits of subscribing. </li>
                                            		    <li> Click on the green action button to Subscribe Now! Fill in the credit card and billing information and you are ready to go!</li>
                                          		    </ol>
                                           		  </ol>
                        		<h5> Take a Deep Look and Adjust to Maximize Your Sales!</h5>
                                           		      <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%"> 
                                           		      Use the various charts and graphs to gain perspective on your market.
                                           		      </p>
                                          		<ol style="list-style-type: lower-alpha; margin-left:20px; font-size: 90%; font-weight:normal">
                                            		  <ol>
                                            		    <li>To get started, you must be signed in and be subscribed. </li>
                                            		    <li>Click on the Green <b>Analyze Your Market!</b> Action Button on the side of this page to go to the Analysis menu. </li>
                                            		    <li>Click on each of the charts.  Note the different results and compare them.  Think about what you offer, how is it unique? Are there needs you can address that you don't list in your profile? Check back often to see trends and download the data to track your results over time. </li>
                                          		    </ol>
                                           		  </ol>
							                             </div><!-- /tab-panel -->      
                                        </div></div><!-- /main column -->
                        <?php include_once 'sidebar_provider.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                        </div><!-- /page-content -->
                        <?php include_once 'dashboard.php';?>
                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once 'footer.php';
        include_once 'login_both.php';
        include_once 'login_provider.php';
        include_once 'signup.php';
        include_once 'forgot_password.php';
        require_once 'advance_search_progress_bar.php';
        ?>
		<!-- Pretty Photo stuff
		<script type="text/javascript" charset="utf-8">
		  $(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		  });
		</script> -->
    </body>
</html>
