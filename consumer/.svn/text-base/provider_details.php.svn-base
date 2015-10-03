<?php session_start();
include_once '../dao/serviceskills.php';
include_once '../dao/staff.php';
include_once '../dao/service.php';
include_once '../dao/address.php';
include_once '../dao/consumer.php';

$it_consumer_id = $_SESSION['consumer']['itconsumer_id'];
$subsRecord= getSubscriptionRecordView($it_consumer_id); //subscription record from history
$count = $_POST['counter'];
//------------------------------------- Paging -------------------------------------------
$rowsPerPage = 1;
$pageNum = 1;
if(isset($_POST['counter'])){
    $pageNum = $count;
}else if(isset($_GET['page'])) {
    $pageNum = $_GET['page'];
}
$offset  = ($pageNum - 1) * $rowsPerPage;

$qry5    = pg_query_params("select distinct(matchhistory.serviceprovider_id), toprated, rank
							from techmatcher.matchhistory left join
							(select serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
								case when (rank() over (order by sum(ratingscore) DESC) 
								between 1 and 5) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
								 from techmatcher.ratingevents join 
								 (select ratingsystem_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by ratingsystem_id) latest 
								 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.ratingsystem_id=latest.ratingsystem_id)
								group by serviceprovider_id) ratings
							on (matchhistory.serviceprovider_id=ratings.serviceprovider_id) where itconsumer_id =$1
							and search_id=$2 ORDER BY rank ASC",array($it_consumer_id,$_SESSION['search_id']));
$row     = pg_num_rows($qry5);
$numrows = $row;


$maxPage = ceil($numrows/$rowsPerPage);
$self    = $_SERVER['PHP_SELF'];

if ($pageNum > 1) {
    $page = $pageNum - 1;
    $prev = " <a onclick='all_provider_result($page);' href='javascript: void(0);'>Previous Page</a> ";
    $first = " <a onclick='all_provider_result(1);' href='javascript: void(0);'>First Page</a> ";
}
else {
    $prev  = ' Previous Page ';       // we're on page one, don't enable 'previous' link
    $first = ' First Page '; // nor 'first page' link
}

if ($pageNum < $maxPage) {
    $page = $pageNum + 1;
    $next = " <a onclick='all_provider_result($page);' href='javascript: void(0);'>Next Page</a> ";
    $last = " <a  onclick='all_provider_result($maxPage);' href='javascript: void(0);'>Last Page</a> ";
}
else {
    $next = ' Next Page';      // we're on the last page, don't enable 'next' link
    $last = ' Last Page '; // nor 'last page' link
}
//-------------------------------------------------------------------------------

if(isset($_POST['provider_id'])){  //this is what happens when a provider details link is clicked
    $provider_idd = $_POST['provider_id'];
    $qry_sp = pg_query_params("Select * from techmatcher.serviceprovider where serviceprovider_id=$1", array($provider_idd));
    $all_results = pg_fetch_all($qry_sp);
    $provider_name = $all_results[0]['primaryname'];
    $contactemailaddress=$all_results[0]['contactemailaddress'];
}else{ //Make a query that gets the three values needed.  This is what happens when the tab is clicked.
   $qryy=pg_query_params("select * from techmatcher.serviceprovider join (select spmatch.serviceprovider_id from (select distinct serviceprovider_id from techmatcher.matchhistory where search_id=$1) spmatch /* all providers in match */
			left join
				(select ratingevents.serviceprovider_id, case when (rank() over (order by sum(ratingscore) desc) 
				between 1 and 5) then 'Top 3 in Match' end as top3, rank() over(order by sum(ratingscore) DESC)
				 from techmatcher.ratingevents  join techmatcher.matchhistory on (ratingevents.serviceprovider_id=matchhistory.serviceprovider_id)
				  join 
				 (select serviceprovider_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by serviceprovider_id) latest 
				 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.serviceprovider_id=latest.serviceprovider_id and matchhistory.serviceprovider_id=latest.serviceprovider_id)
				where search_id=$1
				 group by ratingevents.serviceprovider_id limit 3) topinmatch  /*top 3 in match */
			 on (spmatch.serviceprovider_id=topinmatch.serviceprovider_id)	
			left join
				(select ratingevents.serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
				case when (rank() over (order by sum(ratingscore) desc) 
				between 1 and 3) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
				 from techmatcher.ratingevents join 
				 (select serviceprovider_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by serviceprovider_id) latest 
				 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.serviceprovider_id=latest.serviceprovider_id)
				group by ratingevents.serviceprovider_id) ratings   /* Top Rated Over all */
			on (spmatch.serviceprovider_id=ratings.serviceprovider_id)  ORDER BY top3, ratings.rank) matchlist on serviceprovider.serviceprovider_id=matchlist.serviceprovider_id",array($_SESSION['search_id']));
    $resultt= pg_fetch_all($qryy);
    $provider_idd = $resultt[0]['serviceprovider_id'];
    $provider_name = $resultt[0]['primaryname'];
    $contactemailaddress=$resultt[0]['contactemailaddress'];
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
		<title>Match Results -- Service Provider Details</title>
                <?php include_once 'scripts_consumer.php';?>

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
            <?php
                include_once("search.php");
                //check_consumer_access();
            ?>
		<!-- container -->
		<div id="container" class="container-page"><div id="container-inner">

			<?php include_once 'header_consumer.php';?>

			<!-- body -->
			<div id="bd" class="bd-page"><div id="bd-inner">

				<!-- page-content -->
				<div class="page-content">

					<!-- user-notify -->
					<div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
						<div class="user-notify-content clearfix">
                                                <?php  if(isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="") {?>
                                                <p>You are logged in as <b style="color:#F29822"><?php echo (isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="")?$_SESSION['consumer']['itconsumername']:"Anonymous User";?></b></p>
                                                <?php $prov_qry= pg_query_params("select spmatch.serviceprovider_id from (select distinct serviceprovider_id from techmatcher.matchhistory where search_id=$1) spmatch /* all providers in match */
													left join
														(select ratingevents.serviceprovider_id, case when (rank() over (order by sum(ratingscore) desc) 
														between 1 and 5) then 'Top 3 in Match' end as top3, rank() over(order by sum(ratingscore) DESC)
														 from techmatcher.ratingevents  join techmatcher.matchhistory on (ratingevents.serviceprovider_id=matchhistory.serviceprovider_id)
														  join 
														 (select serviceprovider_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by serviceprovider_id) latest 
														 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.serviceprovider_id=latest.serviceprovider_id and matchhistory.serviceprovider_id=latest.serviceprovider_id)
														where search_id=$1
														 group by ratingevents.serviceprovider_id limit 3) topinmatch  /*top 3 in match */
													 on (spmatch.serviceprovider_id=topinmatch.serviceprovider_id)	
													left join
														(select ratingevents.serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
														case when (rank() over (order by sum(ratingscore) desc) 
														between 1 and 3) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
														 from techmatcher.ratingevents join 
														 (select serviceprovider_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by serviceprovider_id) latest 
														 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.serviceprovider_id=latest.serviceprovider_id)
														group by ratingevents.serviceprovider_id) ratings   /* Top Rated Over all */
													on (spmatch.serviceprovider_id=ratings.serviceprovider_id)  ORDER BY top3, ratings.rank ASC",
													array($_SESSION['search_id']));
												
                                                $prov_rows = pg_num_rows($prov_qry);
                                                if($prov_rows > 0) { ?>
                                                <p> &nbsp; Good news! We found <b style="color:#F29822"><?php echo $prov_rows;?></b> matches for you. </p>
                                                <?php } ?>
                                                    <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
                                                <?php }?>
                                            </div><!-- /user-notify-content -->
					<!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

					<!-- page-container -->
					<div class="page-container provider-profile">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

						<h2><a href="profile.php">My Account Home</a></h2>
                                                <h1>Provider Detail</h1>

                                                <div class="tab-panel-b clearfix tab-panel-sections">
                                                       <ul class="clearfix">
                                                           <li><a href="advance_search_results_5.php"><span>Top 5 Results</span></a></li>
                                                           <li><a href="advance_search_results.php"><span>Full Results</span></a></li>
                                                           <li class="active"><a href="provider_details.php"><span>Provider Details</span></a></li>
                                                        </ul>
                                                </div><!-- /tab-panel -->

                                                <div class="main" style="margin-left:-16px;margin-right:13px;">
                                                    <div class="main-inner">
						<!-- section -->
						<div id="pageno" class="fw-section" style="background-image: none;"><div class="fw-section-inner" style="background-image: none; padding-left:14px;">
                                 <?php
								 if ($contactemailaddress!=''){
								 echo '<div style="margin-left:3;line-height:25px"><p class="add-new-btn"><a href="mailto:'.$contactemailaddress.'?from=outreach@techmatcher.com&reply-to=testcuster@techmatcher.com&subject=Service Inquiry Request -- Courtesy of Techmatcher (www.techmatcher.com)&body=Write a short note of inquiry specifying what you need and when you need it.  %0D%0A%0D%0AFor example: %0D%0A%0D%0AI am writing to inquire about hiring your firm I have specific needs in the following areas: Networking, Server support and email.  %0D%0A%0D%0A%0D%0AMake sure you list any questions you have:%0D%0A%0D%0AOnly firms with proven experince will be consided so please include a statement of your qualifications and a summary of at least on recent engagement where you provided these servcies.  %0D%0A%0D%0A%0D%0AGive them some idea of your timeframe for response (1-3 days would be extra fast, 4-6 would be fast and 7 or more would be normal):%0D%0A%0D%0AI am eager to move on this please respond to this email with your information with in 7 business days.%0D%0A%0D%0A%0D%0ASincerely %0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A Thank you%0D%0A%0D%0A  P. S.  I found your firm on Techmatcher."><img src="../images/email.gif" alt="Contact by Email Now!"> Contact by Email Now! </a></p></div>'; 
								} ?>
                                                        
                                                        <h3>Details for <?php echo $provider_name ?> </h3>
							
							                   							
							                              <?php
                                                        $service_idd=get_prime_service_id($provider_idd);                                                       
                                                        $services_iddd=get_services_from_id($service_idd[0]['service_id']);
                                                        ?>
                                                        
                                                      <p><b>Company Service Overview:</b></p>
                                                       <?php echo '<p> "'. $services_iddd[0]['servicedescr'].'"</p>'; 
                                                       echo '<h4>  </h4>'; ?>

							<h5>Locations</h5>
                                                        <?php
                                                        $address=get_address_by_serviceid($provider_idd);
                                                        $resultt=count($address);

                                                        $resultt;
                                                        $counting=0;

                                                        while($counting < $resultt ) {
                                                                $address2=get_address_from_id($address[$counting]['address_id']);?>
							<!-- address box -->
                             <div id="div_address_<?php echo $address1[0]['address_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
								<div class="address-box"><div class="address-box-inner">
									<p class="address-box-label"><?php echo $counting+1;?></p>
									<p class="address-box-value"><?php echo $address2[0]['addressline1'];?></p>
                                    <p class="address-box-show"><a id="show_box_<?php echo $counting;?>"href="javascript: void(0);" onClick="$('#address_container<?php echo $counting;?>').slideToggle('slow',changeCollapseImage('show_box_<?php echo $counting;?>'))">Show</a></p>
								</div></div>
								<div id="address_container<?php echo $counting;?>" class="address-box-content">
                                                                            <?php $address1=get_address_from_id($address[$counting]['address_id']);?>
										<div class="row">
											<label>Address Type</label>
											<!--<select class="select-short"><option>Choose a type</option></select> -->
                                                                                        <select name = "address_types">
                                                                                        <?php
                                                                                                $addressez = getaddresstypes();
                                                                                                foreach($addressez as $name){
                                                                                                    if($name['addresstype_id']==$address1[0]['addresstype_id']){
                                                                                                        echo "<option selected='selected' value='{$name['addresstype_id']}' >".$name['addresstype_name']."</option>";
                                                                                                    }else{
                                                                                                        echo "<option value='{$name['addresstype_id']}' >".$name['addresstype_name']."</option>";
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                        </select>
										</div>

										<div class="row">
											<label>Address 1</label>
											<?php echo $address1[0]['addressline1'];?>
										</div>

										<div class="row">
											<label>Address 2</label>
											<?php echo $address1[0]['addressline2'];?>
										</div>

										<div class="row">
											<label>City</label>
											<?php echo $address1[0]['city'];?>
										</div>

										<div class="row">
											<label>State</label>
											<?php echo $address1[0]['state'];?>
										</div>

										<div class="row">
											<label>Zip</label>
											<?php echo $address1[0]['zipcode'];?>
										</div>
                                                                          

                                     <div class="row">
											<label>Phone</label>
											<?php echo '('.substr( $address1[0]['phonenumber'],0,3).') '.substr( $address1[0]['phonenumber'],4,3).'-'.substr( $address1[0]['phonenumber'],6,4); ?>
										</div>

                                    <input type="hidden" name="address_idddd" value="<?php echo $address1[0]['address_id'];?>"/>

										<div id="div_register_errors1" class="errordiv" ></div>									
								</div>
							</div>
                                                        <?php $counting++;} ?>  
                              <p></p>     
                            <?php    echo '<h4>  </h4>'; ?>

							<h5>Services</h5>
                                                     
                                                        <!-- service part-->

                                                        <?php
                                                        $service_idd=get_service_id($provider_idd);                                                       
                                                        $resultt=count($service_idd);                                                        
                                                        $flag=0;                                                       
                                                        while ($resultt>$flag){                                                           
                                                            $services_iddd=get_services_from_id($service_idd[$flag]['service_id']);
                                                        ?>
							<!-- address box -->
                                                        <div id="div_service_<?php echo $service_idd[$flag]['service_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
								<div class="address-box"><div class="address-box-inner">
									<p class="address-box-label"><?php echo $flag+1;?></p>
									<p class="address-box-value"><?php echo $services_iddd[0]['servicename'];?></p>
                                                                        <p class="address-box-show"><a id="show_box2_<?php echo $flag ;?>"href="javascript: void(0);" onClick="$('#service_descriptionn<?php echo $flag ;?>').slideToggle('slow',changeCollapseImage('show_box2_<?php echo $flag ;?>'))">Show</a></p>
								</div></div>
								<div id="service_descriptionn<?php echo $flag ;?>" class="address-box-content">
									<div class="row">
                                                                            <label> Service type</label>
                                                                            <?php $category_name = get_servicecategoryname($services_iddd[0]['servicecategory_id']);
                                                                                  echo $category_name['servicecategoryname'];
                                                                            ?>
                                                                        </div>
									<div class="row">
                                                                            <label>Service Name</label>
                                                                            <?php echo $services_iddd[0]['servicename']; ?>
									</div>
                                                                        <div class="row">
                                                                            <label> Service Description</label>
                                                                                <?php echo $services_iddd[0]['servicedescr']; ?>
                                                                        </div>
                                                                        <input type="hidden" name="service_idddd" value="<?php echo $services_iddd[0]['service_id'];?>"/>
								</div>
							</div>
                                                         <?php   $flag++; } ?>
                                                                              
                             <p></p>                           
                            <?php   echo '<h4>  </h4>'; ?>

							<h5>Staff</h5>
                      
                                                    <!-- staffing parts-->
						
                                                    <?php
                                                        $serv1=get_staffid_from_serviceprovider($provider_idd);
                                                        $resulttt=count($serv1);
                                                        $flags=0;
                                                        while($resulttt>$flags){
                                                        $get_name=get_staffname_hiredate($serv1[$flags]['spstaff_id']);
                                                    ?>
							<!-- address box -->
                                                        <div id="div_staff_<?php echo $serv1[$flags]['spstaff_id']?>" class="address-box-wrap" style="float: left; margin-top: 12px;">
								<div class="address-box"><div class="address-box-inner">
									<p class="address-box-label"><?php echo $flags+1;?></p>
									<p class="address-box-value"><?php echo $get_name[0]['spstaffname'];?></p>
                                                                        <p class="address-box-show"><a id="show_box1_<?php echo $flags ;?>"href="javascript: void(0);" onClick="$('#add_stafff<?php echo $flags ;?>').slideToggle('slow',changeCollapseImage('show_box1_<?php echo $flags ;?>'))">Show</a></p>
								</div></div>
								<div id="add_stafff<?php echo $flags;?>" class="address-box-content">  
										<div class="row">
											<label>Employee Name *</label>
											<?php echo $get_name[0]['spstaffname'];?>
										</div>

										<div class="row">
											<label>Hire Date *</label>
											<?php echo $get_name[0]['spstaffhiredate'];?>
										</div>
								</div>
							</div>
                                                        <?php   $flags++; } ?>
                                   
                                 <p></p>                               
                            <?php    echo '<h4>  </h4>'; ?>

							<h5>Skills</h5>
                      
                                                        <div id="selected_skills" class="address-box-wrap" style="float: left; margin-top: 12px;">
                                                        <div class="address-box"><div class="address-box-inner">
                                                            <p class="address-box-label"></p>
                                                            <p class="address-box-value">Skills of our Staff</p>
                                                            <p class="address-box-show"><a id="show_box3" href="javascript: void(0);" onClick="$('#add_skills').slideToggle('slow',changeCollapseImage('show_box3'))">Show</a></p>
							</div></div>
                                                        <!-- Selected Skills -->
                                                        <div id="add_skills" class="address-box-content">
                                                        <?php
                                                            $serv2=get_skillid_from_serviceprovider($provider_idd);
                                                            $resultttt=count($serv2);                                                            
                                                            $flags1=0;
                                                            while($resultttt>$flags1){
                                                                $get_skillname=get_skillname($serv2[$flags1]['serviceskill_id']);
                                                        ?>
                                                        <table>
                                                            <tr class="row">
                                                                <td><?php echo $get_skillname[0]['serviceskillname']; ?></td>
                                                            </tr>
                                                        </table>
                                                        <?php   $flags1++; } ?>
                                                        </div>
                                                                                                         
                                                        
                                                        
   
                                                        </div>
                                                        <!-- end-->
                                                    </div>
                                                    <?php echo "<b><<".$first .'     <'. $prev ."</b>". " ( $pageNum / $maxPage ) " . "<b>".$next .'>       '. $last.">></b>"; ?>
                                                  </div><!-- /section --> 
                                                 </div>
                                               </div>

                                               <?php include 'sidebar_consumer_tour.php';?>
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
                      include_once '../popups/signup.php';?>
	</body>
</html>