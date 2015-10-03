<?php session_start();

// destroy session and logout
if(isset($_SESSION['consumer']) || isset($_SESSION['provider'])) {
    unset($_SESSION['consumer']);
    unset($_SESSION['provider']);
    session_destroy();
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
        <title>Techmatcher | Contact Customer Support</title>
        <?php include_once 'includes/scripts.php';?>

        <!-- css -->
        <link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

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
                <?php include_once 'includes/header.php';?>
                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- page-container -->
                            <div class="page-container">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="#">About Techmatcher</a></h2>
                                    <h1>Techmatcher Overview</h1>

                                    <!-- tab-panel -->
                                    <div class="tab-panel tab-panel-sections">
                                        <ul class="clearfix">
                                            <li><a href="contact_sales.php"><span>Contact Sales</span></a></li>
                                            <li class="active"><a href="contact_support.php"><span>Contact Support</span></a></li>
                                        </ul>
                                    </div><!-- /tab-panel -->

                                    <!-- section-->
                                    <div class="fw-content-page"><div class="fw-content-page-inner">
                                            <img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />

                                            <h2>How can we help? <br/>
                                                Have a question? <br/>
                                                Need assistance with your profile.</h2>

                                            <h3>Contact Support at:</h3>
                                            <br/>
                                            <p>support@techmatcher.com </p>

                                            <p><strong>or</strong></p>

                                            <p>(800) 944-3603 x503</p>
                                        

                                            <p><strong>or</strong></p>

                                            <p>Customer Support</p>
                                            <p>P. O. Box 40007</p>
                                            <p>Arlington, VA 22204 </p>

                                        </div></div><!--/section-->


                                    <div class="clear"></div>

                                    <br />


                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                        <?php include_once 'includes/dashboard.php';?>
                      

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php include_once 'includes/footer.php';
        include_once 'popups/login.php';
        include_once 'popups/login_both.php';
        include_once 'popups/login_consumer.php';
        include_once 'popups/login_provider.php';
        ?>
    </body>
</html>