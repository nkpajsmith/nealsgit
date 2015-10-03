<?php session_start();?>
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
        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
                <?php include_once "../includes/header_provider.php";?>
                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <!-- page-container -->
                            <div class="page-container">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">My Account Home </a></h2>
                                    <img style="float:right" src="../images/about-howdy.png" alt="Howdy!" width="213" height="175" />
                                    <h1>Techmatcher Video</h1>
                                                  
                                    <!-- tab-panel -->
                                    <div class="tab-panel tab-panel-sections">
                                        
                                    </div><!-- /tab-panel -->

                                    <!-- section-->
                                    <div class="fw-content-page"><div class="fw-content-page-inner">
                                         

                                            <object width="444" height="790">
                                                <param name="movie" value="http://www.youtube.com/v/EMv3cJU9ktg&rel=0&fs=1&loop=3"></param>
                                                <param name="allowFullScreen" value="true"></param>
                                                <param name="wmode" value="transparent"></param>
                                                <param name="allowscriptaccess" value="always"></param>
                                                <embed src="http://www.youtube.com/v/EMv3cJU9ktg&rel=0&fs=1&loop=3
                                                       type="application/x-shockwave-flash"
                                                       allowscriptaccess="always"
                                                       allowfullscreen="true"
                                                       width="790"
                                                       height="444">
                                                </embed>
                                            </object>

        

                                        </div></div><!--/section-->

                                    <div class="clear"></div>
                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->


                        <?php include_once "../includes/dashboard_inner.php";?>

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php include_once "../includes/footer1.php";
        include_once "../popups/login.php";
        include_once "../popups/login_both.php";
        include_once "../popups/login_consumer.php";
        include_once "../popups/login_provider.php";
        ?>
    </body>
</html>