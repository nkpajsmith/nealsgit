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
		<title>Techmatcher | Service Provider Advantages</title>
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
							
							<h2>Hi, we're Techmatcher. </h2>
							<h3>Find new customers. Gain insight into the market demand for your services.</h3>
							<br/>
							<p>Techmatcher™ is a matching service designed to give tech service providers like you an opportunity to showcase your capabilities, experience, interests, current approaches, and location. Plain and simple,  Techmatcher helps prospective customers find you.</p>
							<p>Although we never share information on individual firms, we do gather aggregate data from the marketplace that will enable subscribing providers to more intelligently analyze current trends and fine-tune your marketing strategies.							  </p>
							<p>For Service Providers, there are three specific ways Techmatcher will help you tell a better story and enable new customers to find you:							  </p>
							<p><strong>In-depth profiles lead to better matches</strong>							    </p>
							<p>Techmatcher goes beyond basic directory-style listings or search results, and gives you an opportunity to provide potential customers an in-depth look at your firm.  Details like an inventory of your skills-to-staff, office locations, and experience levels. Customers can then see how your firm might meet their needs and preferences with greater clarity. The result: <em>Better information = better probability of a fit.							  </em></p>
							<p>Techmatcher provides the stage and the audience then gives you the microphone. As you build your profile the words are all yours. You get to name and describe your services in ways that show your personality and message. When a willing customer searches for the types of services you offer, we'll match them to your profile. The result: <em>Customers -- who want what you offer -- <strong>find you</strong>.</em> </p>
							<p><strong>Market analytics provide insight on market trends and demand							  </strong></p>
							<p>Techmatcher's basic profile pages will give registered providers access to analytics that show high-level data on what customers are looking for across a given market segment. Through real-time charts, you can gain insight into how trends are impacting your marketing and customer outreach.
							  Using these information tools you can see who is searching and not finding matches. You can see what services are popular in your region. </p>
							<p>You can discover niche opportunities and tune your profile to exploit them.
							  Subscriber tools provide local data and business intelligence (BI)
							  For our subscribers, Techmatcher's enhanced analytics will provide a range of data offerings and tools to help providers target services to local needs. Although individual users' information is kept confidential, as a subscriber you will be able to export aggregate market data from Techmatcher for input into your own business intelligence (BI) systems. 
							  Techmatcher also lets service providers access analysis tools, graphs and comparisons to see how you stack up against the competition.							  </p>
							<p>Techmatcher seeks to be an independent voice to consumers so quality service providers like you can stand out from the pack. As the system grows and collects more information, we will be forming an independent rating for each provider.  </p>
							<p><a href="user_about.php">What do Your Customers get on Techmatcher?</a></p>
						  </div>
						</div><!--/section-->
						
						
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