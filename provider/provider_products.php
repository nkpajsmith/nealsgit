<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Services for Service Providers</title>
        <?php require_once 'scripts_provider.php';?>

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

                <?php require_once 'header_provider.php';?>

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

						<h2>Subscriptions Page</h2>
						<h1>Techmatcher Products for Service Providers</h1>

                                    <!-- main column -->
                                    <div class="main">
                                    <div class="main-inner">
                                <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
							<h3>Subscriber Benefits</h3>
							<p> <img style=float:right src="../images/pie_listedinsearches.png" width="299" height="171" />


							<p>Subscribers have access to a growing body of information about customers and market trends.  Techmatcher assembles the statistics and data to enable subscribing providers to 
							more intelligently analyze and fine-tune marketing strategies.	</p>
			
						<b>Subscriber tools provide local data and business intelligence (BI)</b> <br/>
							<p>For our subscribers, Techmatcher's enhanced analytics help providers target services local needs. Although individual users' information is kept confidential, as a subscriber you will be able 
							to <u>export aggregate market data</u> from us for input into your own business intelligence (BI) systems. </p>

						  <p>Using these tools subscribers can see who is searching and not finding matches.  You can see what services are popular in your region.  Using Techmatcher can promote discovery of niche opportunities and allow you to tune your profile to exploit them. </p>

							<h3>Types of Subscriptions:</h3>
							<br/>
							There are three levels of subscription for Service Providers:</p>
							<?php include_once 'subscription.php';
							$result=getSubsTypeDetailDesc(200);

							echo '<br/>';
                           echo ' <table width="500px">';
                             echo '  <tr style="border: solid 0; border-top-width:1px; padding-left:0.5ex" ><td width="100px"><strong>'.$result[0]['productname'].'</strong></td> <td width="350px">'.$result[0]['productdescription'].' </td><td width="50px" align="right">'.$result[0]['subscriptionrate'].'</td></tr>';
                             echo '  <tr style="background-color: #8fc28a;"><td><strong>'.$result[1]['productname'].'</strong></td> <td >'.$result[1]['productdescription'].' </td><td width="50px" align="right">'.$result[1]['subscriptionrate'].'</td></tr>';
                             echo '  <tr ><td><strong>'.$result[2]['productname'].'</strong></td> <td>'.$result[2]['productdescription'].' </td><td width="50px" align="right">'.$result[2]['subscriptionrate'].'</td></tr>';
                               if (isset($result[3])) {
                             echo '  <tr style="background-color: #8fc28a;"><td><strong>'.$result[3]['productname'].'</strong></td> <td>'.$result[3]['productdescription'].' </td><td width="50px" align="right">'.$result[3]['subscriptionrate'].'</td></tr>';
                             }  if (isset($result[4])) {
                             echo '  <tr style="border: solid 0; border-bottom-width:1px; padding-left:0.5ex" ><td><strong>'.$result[4]['productname'].'</strong></td> <td>'.$result[4]['productdescription'].' </td><td width="50px" align="right">'.$result[4]['subscriptionrate'].'</td></tr>';
                               } else {
                               echo '  <tr style="border: solid 0; border-bottom-width:1px; padding-left:0.5ex" ><td><strong></strong></td> <td> </td><td width="50px" align="right"></td></tr>';
                               }    echo '   </table>';
                            ?>
							<p>Experience the full power of Techmatcher &nbsp &nbsp &nbsp
							<input type="submit" value="Subscribe Now!" class="btn" a href="javascript: void(0);" onclick="return provider_subscription();"></p>
                             </div><!-- /tab-panel -->      
                                        </div></div><!-- /main column -->
                        <?php include_once '../includes/sidebar_provider.php';?>
                                    <div class="clear"></div>
                                    <br />
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php require_once 'footer1.php';
              require_once 'provider_subscription.php';
              require_once 'status_subscription.php';
              require_once 'login_header.php';
        $_SESSION['cookie_selected'] = '';
        unset($_SESSION['cookie_selected']);
        ?>
    </body>
</html>
