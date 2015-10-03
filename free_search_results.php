<?php session_start();
include_once 'consumer.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

        <!-- title -->
        <title>Techmatcher | Free Search Results</title>
        <?php include_once 'common_functions.php';?>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
			<script src="../js/jquery.js" type="text/javascript"></script>
			<script src="../js/default.js" type="text/javascript"></script>
			<script src="../js/ie-dropdown.js" type="text/javascript"></script>
			<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
			<script src="../js/jquery.corner.js" type="text/javascript"></script>
			<script src="../js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
			<script src="../js/modals.js" type="text/javascript"></script>
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

                <?php include_once 'header_consumer_nl.php';
                
                   ?>

                <!-- body -->
                <div id="bd" class="bd-page"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">
                            <?php include_once '_change_free_match.php' ;  
                             include_once "search.php"; ?>
                        
                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">
                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                    <h2><a href="profile.php">Techmatcher Presents! </a></h2>
                                
                                    <h1><a href="#">Free Search Results</a></h1>
                                    
                                    <div class="tab-panel-b clearfix">
                                        <ul class="clearfix">
                                            <li class="active"><a href="#"><span>At a Glance</span></a></li>
                                        </ul>
                                    </div><!-- /tab-panel -->

                                      <!-- tab-content -->
                                            <div class="tab-content">
                                            
                                                <!-- section -->
                                                <div class="section clearfix">
                                                  <div id="image_div">
                                                <?php $def_image_name = $_SESSION['imagename'];
                                                $source ="consumer/charts/";
                                                $image_source = $source.$def_image_name;?>
                                                <img id="free_match_result" src="<?php echo $image_source;?>"/>
                                            </div>

                                           <div style='font-size:110%'>
                                           <h4><span>What's this mean?</span></h4>
                                            
                                           <p > This chart shows the number of service providers that would be found based on the criteria you chose.  If you ran a similar match looking for services you would be searching within the pool of services indicated by the service bar.  Same goes for the skills bar, searching on skills you would find up to this many providers with the skill you need.</p>
                                            <p> <i>If there are few skills or services, that means that the providers in the area you have searched have not yet filled out a profile.  We are continually working to encourage providers to fill out a profile, so can you.  </i></p>
                                
                                           <h4><span>What's Next</span></h4>
                                           <?php
                                           if ($_SESSION['consumer']['itconsumer_id']=='') {
                                           echo  "<p >You've seen, in general terms,  a picture of what is offered to you.  Your next step is to find the service providers best suited to serve you.  This involves making sure your profile is filled out and using the matching tools to find the right service providers for you.</p>";
                                           } else {  
                                           echo "<p >You've seen, in general terms,  a picture of what is offered to you.  Click on Manage Profile to add details to your profile for better matching.  Already done with that? Use our matching engine to find the best service provider for you.  Click on"; echo' <a href="javascript: void(0);" onclick="show_subscription_msg("root");">Get a Match Now!</a> to take the next step.</p>';
										    }
										    ?>
                                            </div>
                                            
                                                     <div class="borderbottom">   </div>   
                                               </div><!-- /section -->
                                                </div><!-- /tab-content -->
                                        </div></div><!-- /main column -->
                                    <?php include_once 'sidebar_consumer_tour.php';?>
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div>
                            </div><!-- /page-container -->
                        </div><!-- /page-content -->

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php
        include_once 'footer1.php';
       include_once 'login.php';
        ?>
    </body>
</html>