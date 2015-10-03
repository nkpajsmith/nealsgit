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
		<title>Techmatcher |  Oops!</title>
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
			<?php include_once 'header_about.php';?>
			<!-- body -->
			<div id="bd" class="bd-page layout-b"><div id="bd-inner">

				<!-- page-content -->
				<div class="page-content">

					<!-- user-notify -->
					<!-- page-container -->
					<div class="page-container">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

						<h2><a href="#"> Techmatcher</a> Error Report</h2>
						<h1>File Not Found Error!</h1>

						<!-- tab-panel -->
						<div class="tab-panel tab-panel-sections">
							<ul class="clearfix">
								<li class="active"><a href="about.php"><span>Page not Found</span></a></li>
								<li></li>
								<li></li>
							</ul>
						</div><!-- /tab-panel -->

						<!-- section-->
						<div class="fw-content-page"><div class="fw-content-page-inner">
							<img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />

							<h2>Oops!</h2>
							<p>Somehow we let you get off track. The page you tried to open doesn't exist.</p>
							<p>The error has been logged and we will try to make sure it doesn't happen again.  </p>
							<p>Click on the Techmatcher icon to return to the home page or use your back button to return to where you were.</p>
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