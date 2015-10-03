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
		<title>Techmatcher | FAQ</title>
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
					
					<!-- page-container -->
					<div class="page-container">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">
						
						<h2><a href="#">About Techmatcher</a></h2>
						<h1>Techmatcher Overview</h1>
						
						<!-- tab-panel -->
						<div class="tab-panel tab-panel-sections">
							<ul class="clearfix">
								<li><a href="about.php"><span>Our Approach</span></a></li>
								<li class="active"><a href="FAQ.php"><span>FAQ</span></a></li>
								<li><a href="terms_of_service.php"><span>Terms of Service</span></a></li>
							</ul>
						</div><!-- /tab-panel -->

						<!-- section-->
						<div class="fw-content-page"><div class="fw-content-page-inner">
							<img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />
							
							<h2>FAQs<br />
							(Some questions you may have)</h2>

							<ol>
							<li>
							<h3>Why Techmatcher?</h3>

							<p>Techmatcher addresses some very basic problems in finding and delivering quality tech services.  Many people who use technology (users) have
							difficulty expressing their specific needs and are not experienced in evaluating technical helpers.  As a result they struggle to know and have confidence
							that they have the right help.</p>
							<p>Technical helpers (service providers) struggle to get new customers.  If they are good they often don't have time for marketing because their hands are full.
							If they do market, there are not very good means to find basic average users.  As a result these two never quite meet up.</p>
							<p>Techmatcher answers these two problems by providing a common place for users and service providers to find each other.
							We take the challenge out of describing needs by using personal profiles.  And we enable the service providers to study their market and
							address needs based on the searches users are performing.</p>
							<p> We think this is good news. Hope you agree.</p></li>

							<li>
							<h3>How do Service Providers Benefit?</h3>
								<p>We think that when used, Techmatcher provides a great tool for service providers to grow their business.  It does that in three ways:</p>
								<ul >
								<li >Techmatcher lets service providers freely describe what they have to offer in a place where users are actively looking for them.</li>
								<li >Techmatcher enables service providers to perform analysis with graphs and comparisons to see how they stack up against the competition.  </li>
								<li >Techmatcher provides an independent rating of service providers so good service providers can standout from the pack. </li>
								</ul>
								</li>
							<li>
							<h3>How do Tech Users Benefit? </h3>
										<p>Techmatcher provides a great tool for tech users as they seek service providers.  It does that in three ways:</p>
								<ul >
								<li >Techmatcher enables users to freely fill out a profile in language and expressions that makes sense to them.</li>
								<li >Techmatcher enables users to search for service providers using both basic and advance methods.  Tech users will easily be able to create a list of potential service providers that clearly suits their needs.  </li>
								<li >The Techmatcher service providers are rated for quality, making it easy for users to see clearly which service providers are better than others.</li>
                                                                </ul>
							</li>

							</ol>
							
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