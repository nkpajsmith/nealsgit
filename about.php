<?php session_start();

// destroy session and logout
if(isset($_SESSION['consumer']) || isset($_SESSION['provider'])){
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

		
		<!-- title -->
		<title>About Techmatcher | Techmatcher</title>
	    <META NAME="Description" CONTENT="Techmatcher is an online service which connects computer users with qualified local technology service providers through in-depth profiles.">

                <?php include_once 'scripts.php';?>
		
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
			<?php include_once 'header.php';?>
			<!-- body -->
			<div id="bd" class="bd-page layout-b"><div id="bd-inner">
			
				<!-- page-content -->
				<div class="page-content">
					
					<!-- user-notify -->
					<!-- page-container -->
					<div class="page-container">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">
						
						<h2><a href="#">About Techmatcher</a></h2>
						<h1>Techmatcher Overview</h1>
						
						<!-- tab-panel -->
						<div class="tab-panel tab-panel-sections">
							<ul class="clearfix">
								<li class="active"><a href="about.php"><span>Our Approach</span></a></li>
								<li><a href="FAQ.php"><span>FAQ</span></a></li>
								<li><a href="terms_of_service.php"><span>Terms of Service</span></a></li>
							</ul>
						</div><!-- /tab-panel -->

						<!-- section-->
						<div class="fw-content-page"><div class="fw-content-page-inner">
							<img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />
							
							<h2>Hi there.  We're Techmatcher.</h2>
							
							<br/>
							<p>And as our name  suggests, we're all about matches.  Our sweet spot is bringing together people who need technical help with those firms who can capably provide it. </p>
<p>We got started because we know from our own experience that it can be a challenge for service providers to find new customers. We also have lived the story of the search for the right help when you need it.  We thought there had to be a better way...</p>
<p>Techmatcher tackles these two problems by providing a common place for users and service providers to <b>find each other</b>. By filling out simple profiles we create a communication channel that simplifies and clarifies the connection.  We then get out of the way and let the tech user and the service provider form their own working relationship.</p>
<p>Our goal is to provide an easy to use platform that enables good service providers to meet the needs of individuals and companies.  We think this is pretty good.  We hope you do too.</p>

<ul>
<li>  If you are a Tech User and want more detailed information on how Techmatcher helps you click here: 	<a href="user_about.php">Tech User Info &raquo;</a>	</li>
<li>  If you are a Service Provider and want more detailed information on how Techmatcher helps you click here:<a href="sp_about.php">Service Provider Info &raquo;</a></li>
<li>  To just go back to the main page click here:  <a href="index.php">Go to Main Page&raquo;</a></li>
 </ul>
						</div></div><!--/section-->
						
						
						<div class="clear"></div>
						
						<br />
						
						
					</div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
					
				</div><!-- /page-content -->

				<?php include_once 'dashboard.php';?>
				
			</div></div><!-- /body -->
		
		</div></div><!-- /container -->
                <?php include_once 'footer.php';
                     include_once 'login.php';
                     include_once 'login_both.php';
                     include_once 'login_consumer.php';
                     include_once 'login_provider.php';
                ?>
	</body>
</html>