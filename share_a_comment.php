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
		<title>Techmatcher | Give a Suggestion</title>
                <?php include_once 'scripts.php';?>
		
		<!-- css -->
		<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
		
		<!--[if lte IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen, projection" />
		<![endif]-->
		<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css" media="screen, projection" />
		<![endif]-->
		
		<!-- js -->
		<!--[if lte IE 6]>
			<script type="text/javascript" src="ie6pngfix/fix-min.js"></script>
			<script type="text/javascript">
				// separate multiple html elements or class names with a comma:
				DD_belatedPNG.fix('#container-inner, .logo a, .intro-side-content, .intro-side h2, .intro-side-bottom, .home-form, .bd-home, .bd-page, .ft-logo a, .how-it-works-content, .how-it-works-top, .how-it-works-bottom, .how-it-works-icon, .continue-link a, .continue-link a span, .dashboard-content, .dashboard-top, .dashboard-bottom, .dashboard-icon, .count-box, .count-box span, .action-btn a, .action-btn a span, .user-notify-top, .user-notify-bottom, .user-notify-content, .action-log a, .action-log span, .page-container-top, .page-container-bottom, div.count-box h4');
			</script>
		<![endif]-->
		
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
					
							
					<!-- page-container -->
					<div class="page-container">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">
						
						<h2><a href="#">About Techmatcher</a></h2>
						<h1>Techmatcher Overview</h1>
						
						<!-- tab-panel -->
						<div class="tab-panel tab-panel-sections">
							<ul class="clearfix">
								<li><a href="contact_sales.php"><span>Contact Sales</span></a></li>
								<li><a href="contact_support.php"><span>Contact Support</span></a></li>
								<li class="active"><a href="share_a_comment.php"><span>Share a Comment</span></a></li>
							</ul>
						</div><!-- /tab-panel -->

						<!-- section-->
						<div class="fw-content-page"><div class="fw-content-page-inner">
							<img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />
							
							<h2>Hi, we're Techmatcher :)<br />
							Come take a closer look.</h2>
							
							<p>Techmatcher uses our custom matching logic to take the information you provide and return you
							the names and contact information for service providers that can meet your needs.</p>
							
							<h3>Techmatcher gives you two ways to get a match.</h3>
							
							<p>There are two different ways to get a match. The most comprehensive matching happens when you fill out
							your organization (or personal) profile. Once your profile is complete you can run searches for providers.</p>
							
							<p>There are 3 basic search types:</p>
							
							<p><strong>Service Search</strong><br />
							Techmatcher will focus on identifying service providers that provide services you can use</p>
							
							<p><strong>Skills Search</strong><br />
							Techmatcher will focus on identifying service providers with specific skill sets and staff you may need</p>
							
							<p><strong>Geographic Search</strong><br />
							Techmatcher will focus on identifying service providers who are close to your location(s).</p>
							
							<p>Once you perform a search we show you the results. If you are not a current subscriber you will
							see 5 providers listed and no details about them. This is a good way to make sure you have reasonable results
							before paying for more details.</p>
							
							<p>Once you have a list that you are satisfied with, you may see the detailed profile for any service provider in
							the match. The service provider details include: (Click on any of these details for more info.)</p>
							
							<p class="link-blue"><a href="">Contact information and service locations</a><br />
							<a href="">Services Offered</a><br />
							<a href="">Staff (including experience)</a><br />
							<a href="">Provider Rating Information</a></p>
							
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