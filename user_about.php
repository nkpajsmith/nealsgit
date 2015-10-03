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
		<meta http-equiv="Pragma" content="no-cache" />
		
		<!-- title -->
		<title>Techmatcher | Tech User Benefits</title>
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
							
							<h2>Hi, we're Techmatcher. Your one-stop shop for finding quality technical services. </h2>
                            <h3>We do the matching. You make the choice and get the help you need.</h3>
							
							<br/>
						  <p>Techmatcher™ is a matching service designed to connect technology users with technology service providers.  Techmatcher receives and processes in-depth profiles submitted by  service providers.  </p>
						  <p>When you subscribe to Techmatcher, you complete your own profile - telling us about your needs and what you're hoping for in a service provider. </p>
						  <p>Then simply request a match. </p>
						  <p>Techmatcher searches for and matches compatible profile. We'll provide names and contact information relevant to your search, and tailored to be as close as possible to the criteria you've provided.							  </p>
							<p>User profiles are always confidential. Techmatcher never discloses any sensitive information about any subscriber. And we won't sell your personal information, ever.<br />
							  <br />
							</p>
						  <h3>Techmatcher creates three kinds of matches:</h3><br />

						  <p><strong>Service Search</strong><br />
							Techmatcher identifies providers that offer services that meet the specific needs listed in your profile.</p>

						  <p><strong>Skills Search</strong><br />
					      Techmatcher reviews provider profiles for the specific skills you require and lists possible matches that will best meet your needs</p>

						  <p><strong>Geographic Search</strong><br />
							Techmatcher returns possible matches in your local area and close to your location(s).</p>

						  <p>As a subscribing user, once you request a search, Techmatcher will show you  possible matches which are best suited to your needs. <br />
						    <br />
						  </p>
						  <h3>Free Preliminary Search</h3>
						  <br />
						  <p>You can also do a preliminary search without being a subscriber. Once your profile is complete, you can run a free preliminary search for a service provider. This level of search will yield 5 provider (name only) matches.  This is a good way to make sure you have reasonable results before paying for more details.</p>
						  <p>Once you have a list that you are satisfied with, you can subscribe to see the detailed profile for any service provider in the match. <br />
						    <br />
						  </p>
						  <h3>Here's How Techmatcher Benefits You:</h3>
						  <br />
                          <p><strong>Use everyday language (no 'geek-speak' required)</strong></p>
                          <p>With Techmatcher, you can easily fill out a profile using everyday language to describe your need, without requiring knowledge of technical terminology.</p>
                          <p><strong>Two levels of search</strong></p>
                          <p>Techmatcher will enable you to search for service providers using both basic and advanced methods. Regardless of the method used, you will easily be able to create a list of potential service providers that will likely meet your needs. </p>
                          <p><strong>An independent voice</strong></p>
                          <p>Techmatcher seeks to be an independent voice in the technology services industry to consumers, so quality service providers stand out from the pack. In addition, all personally-identifying information we receive about you is never released directly to service providers.  As the system grows and collects more information, we will be forming an independent rating for each service provider, thus giving technology users like yourself an even greater ability to choose between providers.</p>
                          <p>&nbsp;</p>
						</div></div><!--/section-->
						
						
						<div class="clear"></div>
						
						<br />
						
						
					</div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
					
				</div><!-- /page-content -->
				
'
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