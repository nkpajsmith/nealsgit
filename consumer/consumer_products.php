<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />

        <!-- title -->
        <title>Techmatcher | Products for Tech Users;</title>
        <?php include_once 'scripts_consumer.php';?>

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

                <?php include_once 'header_consumer.php';?>

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

						<h2>Subscriptions Page</h2>
						<h1>Techmatcher Products for Tech Users</h1>
				
                                    <!-- main column -->
                                    <div class="main">
                                    <div class="main-inner">
                                <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                            <img style='float:right' src="../images/about-howdy.png" width="125px" height="125px" />
							<h3>Subscriber Benefits</h3>
								
							<p>Tech Users who are subscribers have the opportunity to fully explore their options in Service Providers.</p>
			
						<b>Subscribing Tech Users have access to three benefits</b> <br/>
						<ol>
							<li> Find providers using advanced matching filters.  Tech Users who are subscribers can search and find providers either by Geography (Who is close to me?) by Services (Who offers the Service I need?) or Skills (Does anyone still fix my kind of database?) </li>
							<li> Match using complex criteria.  When matching using the advanced search features subscribers can build complex sets of provider information.  For example you can build a list of providers in a specific zipcode who offer services for server maintenance but do not work with Windows servers.</li>
							<li> See all the details about each provider.  Tech Users who are subscribers are able to view the details of the provider's profile that are matched.  You can see their contact information, service locations, service offerings, staff persons together with each person's skills</li>
						</ol>	
							
							<h3>Types of Subscriptions:</h3>
							<br/>
							There are three levels of subscription for Service Providers:</p>
							<?php include_once 'subscription.php';
							$result=getSubsTypeDetailDesc($_SESSION['consumer']['subscribertype_id']);

							echo '<br/>';
                           echo ' <table width="500px">';
                             echo '  <tr style="border: solid 0; border-top-width:1px; padding-left:0.5ex" ><td width="100px"><strong>'.$result[0]['productname'].'</strong></td> <td width="350px">'.$result[0]['productdescription'].' </td><td width="50px" align="right">'.$result[0]['subscriptionrate'].'</td></tr>';
                             echo '  <tr style="background-color: #8fc28a;"><td><strong>'.$result[1]['productname'].'</strong></td> <td >'.$result[1]['productdescription'].' </td><td width="50px" align="right">'.$result[1]['subscriptionrate'].'</td></tr>';
                             echo '  <tr ><td><strong>'.$result[2]['productname'].'</strong></td> <td>'.$result[2]['productdescription'].' </td><td width="50px" align="right">'.$result[2]['subscriptionrate'].'</td></tr>';
                             if (isset($result[3])) {
                             echo '  <tr style="background-color: #8fc28a;"><td><strong>'.$result[3]['productname'].'</strong></td> <td>'.$result[3]['productdescription'].' </td><td width="50px" align="right">'.$result[3]['subscriptionrate'].'</td></tr>';
                             }
                             if (isset($result[4])) {
                             echo '  <tr style="border: solid 0; border-bottom-width:1px; padding-left:0.5ex" ><td><strong>'.$result[4]['productname'].'</strong></td> <td>'.$result[4]['productdescription'].' </td><td width="50px" align="right">'.$result[4]['subscriptionrate'].'</td></tr>';
                               } else {
                               echo '  <tr style="border: solid 0; border-bottom-width:1px; padding-left:0.5ex" ><td><strong></strong></td> <td> </td><td width="50px" align="right"></td></tr>';
                               }
                          echo '   </table>';
                            ?>
							<p>Experience the full power of Techmatcher &nbsp &nbsp &nbsp
							<input type="submit" value="Subscribe Now!" class="btn" a href="javascript: void(0);" onclick="return consumer_subscription();"></p>
                             </div><!-- /tab-panel -->      
                                        </div></div><!-- /main column -->
                     <?php include_once '../includes/sidebar_consumer_tour.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';
              include_once '../popups/consumer_subscription.php';
              include_once '../popups/status_subscription.php';
              include_once '../popups/login_header.php';
        $_SESSION['cookie_selected'] = '';
        unset($_SESSION['cookie_selected']);
        ?>
    </body>
</html>
