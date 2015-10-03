<?php session_start();
include_once '../dao/consumer.php';
$user = consumer_findByEmail2($_SESSION['consumer']['itconsumer_emailaddress']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- meta -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="Pragma" content="no-cache" />

		<!-- title -->
		<title>Techmatcher&trade;</title>
                <?php include '../includes/scripts_consumer.php';?>

		<!-- css -->
		<link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
		<link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

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
				DD_belatedPNG.fix('#container-inner, .logo a, .intro-side-content, .intro-side h2, .intro-side-bottom, .home-form, .bd-home, .bd-page, .ft-logo a, .how-it-works-content, .how-it-works-top, .how-it-works-bottom, .how-it-works-icon, .continue-link a, .continue-link a span, dashboard-content, .dashboard-top, .dashboard-bottom, .dashboard-icon, .count-box, .count-box span, .action-btn a, .action-btn a span, .user-notify-top, .user-notify-bottom, .user-notify-content, .action-log a, .action-log span, .page-container-top, .page-container-bottom');
			</script>
		<![endif]-->
	</head>
	<body>
            <?php
                include_once("../dao/search.php");
                //check_consumer_access();
            ?>
		<!-- container -->
		<div id="container" class="container-page"><div id="container-inner">

			<?php include '../includes/header_consumer.php';?>

			<!-- body -->
			<div id="bd" class="bd-page"><div id="bd-inner">

				<!-- page-content -->
				<div class="page-content">

					<!-- user-notify -->
					<div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
						<div class="user-notify-content clearfix">
                                                <?php
                                                if(isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="") {?>
                                                <p>You are logged in as <b style="color:#F29822"><?php echo $_SESSION['consumer']['itconsumername']?></b>.</p>
                                                <?php $qry_abc= pg_query_params("select distinct(serviceprovider_id) from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
                                                $records = pg_num_rows($qry_abc);
                                                if($records > 0) { ?>
                                                <p> &nbsp; Good news! We found  <b style="color:#F29822"><?php echo $records;?></b> matches for you. </p>
                                                <?php } ?>
                                                <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
                                                <?php }else{?>
                                                <p>Please login by clicking on <span style="color:#F29822">My Account Home</span> to use your custom profile.</p>
                                                <?php $qry_abc= pg_query_params("select distinct(serviceprovider_id) from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
                                                $records = pg_num_rows($qry_abc);
                                                if($records > 0) { ?>
                                                <p> &nbsp; Good news! We found <b style="color:#F29822"><?php echo $records;?></b> matches for you. </p>
                                                <?php }} ?>
                                            </div><!-- /user-notify-content -->
					<!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

					<!-- page-container -->
					<div class="page-container provider-profile">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

						<?php if($user['recordstatus'] == 'initialentry'){?>
                                                    <h2><a href="javascript: void(0);" onclick="return open_signup_dialog(2);">My Account Home </a></h2>
                                                <?php }else{ ?>
                                                    <h2><a href="profile.php">My Account Home ^</a></h2>
                                                <?php }?>
                                                <h1><a href="#">Search Results</a></h1>
                                                                                          
                                                <div class="main search-result-main">
                                                <!-- main column -->
                                                    <!-- search result -->
                                                    <div class="search-result"><div class="search-result-inner">
                                                        <form>
                                                            <span class="addr-street">We are sorry we are not able to make a match with your criteria. You may alter your profile (by adding more locations or details) or you may search again with alternate criteria.</span>
                                                            <br/>
                                                            
                                                        </form>
							</div></div><!-- /search results -->
                                                       
							<!-- search result -->
                                                </div><!-- /main column -->
                                               
                                                <?php include '../includes/sidebar_consumer.php';?>
					</div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                                            
				</div><!-- /page-content -->

			</div></div><!-- /body -->

		</div></div><!-- /container -->
		<?php include_once '../includes/footer1.php';
                      include_once '../includes/advance_search_progress_bar.php';
                      include_once '../popups/advance_search.php';
                      include_once '../popups/consumer_subscription.php';
                      include_once '../popups/status_subscription.php';
                      include_once '../popups/login.php';
                      include_once '../popups/login_both.php';
                      include_once '../popups/signup.php';
                ?>
	</body>
</html>