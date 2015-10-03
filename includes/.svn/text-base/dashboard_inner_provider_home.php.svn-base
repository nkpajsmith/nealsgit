<title>Dashboard</title>

<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

<?php  include_once '../dao/search.php';
       include_once '../dao/login_logout_dao.php';
$search_name = getDashboardNames();
?>
		<!-- match history -->
						<div class="match-history-box clearfix">
							<p class="match-history-label">Match History</p>
							
							<div class="match-history-stats">
								<!-- completed-searches -->
								<div class="completed-searches clearfix">
									 <h4 title=><?php echo $search_name[0];?></h4>
									<div class="count-box"><?php $noOfSearches = getAllSearhes(); 
									$searches_with_commas = preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $noOfSearches);?>
                					<span><?php echo $searches_with_commas ?></span></div>
								</div><!-- /completed-searches -->
								
								<!-- number-of-providers -->
								<div class="number-of-providers clearfix">
									<h4><?php echo $search_name[1];?></h4>
									<div class="count-box"> <?php $noOfProviders = getAllProviders();
                $providers_with_commas = preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $noOfProviders);?>
                <span><?php echo $providers_with_commas ?></span></div>
								</div><!-- /number-of-providers -->
							</div>
						</div>
