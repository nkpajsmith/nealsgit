<?php session_start();

include_once '../dao/consumer.php';
$it_consumer_id=$_SESSION['consumer']['itconsumer_id'];
$it_consumer_email=$_SESSION['consumer']['itconsumer_emailaddress'];
$user = consumer_findByEmail2($_SESSION['consumer']['itconsumer_emailaddress']);
$subsRecord= getSubscriptionRecordView($it_consumer_id); //subscription record from history
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />


        <!-- title -->
        <title>Match Results -- Top 5 Providers in Match</title>


        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
			<script src="../js/jquery.js" type="text/javascript"></script>
			<script src="../js/default.js" type="text/javascript"></script>
			<script src="../js/ie-dropdown.js" type="text/javascript"></script>
			<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
			<script src="../js/jquery.corner.js" type="text/javascript"></script>
			<script src="../js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
			<script src="../js/modals.js" type="text/javascript"></script>
			<script type="text/javascript" src="../js/cluetip/jquery.cluetip.js"></script>
			<script type="text/javascript" src="../js/tooltips.js"></script>

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
        include_once("common_functions.php");
        require_once("login_logout_dao.php");
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
                                    <?php
                                    if(isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="") {?>
                                    <p>You are logged in as <b style="color:#F29822"><?php echo $_SESSION['consumer']['itconsumername']?></b>.</p>
                                        <?php $qry_abc= pg_query_params("select distinct(serviceprovider_id) from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
                                        $records = pg_num_rows($qry_abc);
                                        if($records > 0) { ?>
                                    <p> &nbsp; Good news! We found  <b style="color:#F29822"><?php echo $records;?></b> matches for you. </p>
                                        <?php } ?>
                                    <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
                                        <?php }else {?>
                                    <p>Please login by clicking on <span style="color:#F29822">My Account Home</span> to use your custom profile.</p>
                                        <?php $qry_abc= pg_query_params("select distinct(serviceprovider_id) from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
                                        $records = pg_num_rows($qry_abc);
                                        if($records > 0) { ?>
                                    <p> &nbsp; Good news! We found <b style="color:#F29822"><?php echo $records;?></b> matches for you. </p>
                                            <?php } ?>                                    
                                        <?php } ?>
                                </div><!-- /user-notify-content -->
                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">
                          
                                    <h2><a href="profile.php">My Account Home </a></h2>
       
                                    <h1>Search Results</h1>
                                    
                                    <div class="tab-panel-b clearfix">
                                        <ul class="clearfix">
                                            <li class="active"><a href="advance_search_results_5.php"><span>Top 5 Results</span></a></li>
                                            <li><a href="advance_search_results.php"><span>Full Results</span></a></li>
											<li><a href="provider_details.php"><span>Provider Details</span></a></li>
                                        </ul>
                                    </div><!-- /tab-panel -->

                                    <div id="pageno" class="main search-result-main">
                                        <?php
                                        if(isset($_SESSION['records']) && $_SESSION['records'] == 0) {
                                            $filename= "error_reporting.php";// redirection page
                                            redirect_to($filename);// method to redirect
                                        }else {
                                            $counter = 0;
                                            $qry_sp_id= pg_query_params("select spmatch.serviceprovider_id from (select distinct serviceprovider_id from techmatcher.matchhistory where search_id=$1) spmatch /* all providers in match */
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
			on (spmatch.serviceprovider_id=ratings.serviceprovider_id)  ORDER BY top3, ratings.rank ASC LIMIT 5"
													,array($_SESSION['search_id']));
                                            while($result3 = pg_fetch_array($qry_sp_id)) {
                                                $qry_primary_name=pg_query_params("select distinct serviceprovider.serviceprovider_id,primaryname,contactemailaddress, toprated, top3, ntile, totalscore, rank    from techmatcher.serviceprovider right join (
		select spmatch.serviceprovider_id,toprated, ratings.rank, ntile(100) over (order by totalscore desc) ntile,totalscore,top3
		from (select distinct serviceprovider_id from techmatcher.matchhistory where search_id=$1) spmatch /* all providers in match */
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
		on (spmatch.serviceprovider_id=ratings.serviceprovider_id)  ORDER BY top3, rank ASC
		) provs_ranked 
		on (serviceprovider.serviceprovider_id=provs_ranked.serviceprovider_id) 
		where serviceprovider.serviceprovider_id=$2
		 order by toprated, top3",
													array($_SESSION['search_id'],$result3['serviceprovider_id']));
												$result4= pg_fetch_all($qry_primary_name);
                                                //for getting address of each provider
                                                $qry_addresses = pg_query_params("select * from techmatcher.address as add, techmatcher.serviceprovidertoaddress 
	                                                       as ser where add.address_id = ser.address_id and ser.serviceprovider_id  = $1
	                                                       and address_deleted ='f'
                                                       and addresstype_id in (1,2)", array($result3['serviceprovider_id']));
                                                $result_add = pg_fetch_all($qry_addresses);
                                                $add_city = $result_add[0]['city'].", ".$result_add[0]['state']." ".$result_add[0]['zipcode'];
                                                $counter++;
                                                ?>
                                        <!-- main column -->
                                        <!-- search result -->

                                        <div class="search-result"><div class="search-result-inner">
                                                <form action=provider_details.php method=POST name=<?php echo "form_".$result3['serviceprovider_id'] ?> id=<?php echo $result3['serviceprovider_id'] ?>>
                                                    <h3><?php echo $result4[0]['primaryname'];?></h3>  
                                                        <?php 
                                                         $bb117=get_bubble_text(117);
										                 $bb118=get_bubble_text(118);
                                                        
                                                        if ($result4[0]['toprated']=='Top Rated Provider!')
                                                        {echo '<img src="../images/top-listing.gif" alt="Top Rated Provider!" align="right" class="tooltip" title="'.$bb117.'">';}                                                        
                                                        if ($result4[0]['top3']=='Top 3 in Match')
                                                        {echo '<img src="../images/top-three-listing.gif" alt="Top in Match Provider!" align="right" class="tooltip" title="'.$bb118.'">';}     
                                                        ?> 
                                                    <span class="addr-street"><?php echo $result_add[0]["addressline1"];?></span>
                                                    <span class="addr-city"><?php echo $add_city; ?></span>
                                                   <span class="addr-phone"><?php echo '('.substr($result_add[0]['phonenumber'],0,3).') '.substr($result_add[0]['phonenumber'],4,3).'-'.substr($result_add[0]['phonenumber'],6,4); ?></span>
                                                    <input type="hidden" name=providername value="<?php echo $result4[0]['primaryname']; ?>"/>
                                                    <input type="hidden" name=provider_id value="<?php echo  $result3['serviceprovider_id']; ?>"/>
                                                    <br/>
                                                    <div>
                                                                <?php if($subsRecord != "") { ?>
                                                        <span><b><a href="javascript: void(0);" onclick="document.getElementById(<?php echo $result3['serviceprovider_id'] ?>).submit()">Read Full Profile</a></b></span>
                                                                    <?php } ?>
                                                    </div>
                                                       <?php
                                                                 if ($result4[0]['contactemailaddress']!=''){
														         echo '<div style="margin-left:3;float:left;line-height:25px"><p class="add-new-btn"><a href="mailto:'.$result4[0]['contactemailaddress'].'?from=outreach@techmatcher.com&reply-to='.$it_consumer_email.'&subject=Service Inquiry Request -- Courtesy of Techmatcher (www.techmatcher.com)&body=Write a short note of inquiry specifying what you need and when you need it.  %0D%0A%0D%0AFor example: %0D%0A%0D%0AI am writing to inquire about hiring your firm I have specific needs in the following areas: Networking, Server support and email.  %0D%0A%0D%0A%0D%0AMake sure you list any questions you have:%0D%0A%0D%0AOnly firms with proven experince will be consided so please include a statement of your qualifications and a summary of at least on recent engagement where you provided these servcies.  %0D%0A%0D%0A%0D%0AGive them some idea of your timeframe for response (1-3 days would be extra fast, 4-6 would be fast and 7 or more would be normal):%0D%0A%0D%0AI am eager to move on this please respond to this email with your information with in 7 business days.%0D%0A%0D%0A%0D%0ASincerely %0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A Thank you%0D%0A%0D%0A  P. S.  I found your firm on Techmatcher."><img src="../images/email.gif" alt="Contact by Email Now!"> Contact by Email Now! </a></p></div>'; 
																} ?>
                                                </form>
                                            </div></div><!-- /search results -->
                                        <!-- search result -->
                                                <?php }
                                        }?>
                                    </div><!-- /main column -->
                                    <?php include_once 'sidebar_consumer_tour.php';?>
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                        </div><!-- /page-content -->

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php
        include_once 'footer1.php';
        include_once 'advance_search_progress_bar.php';
        include_once 'advance_search.php';
        include_once 'consumer_subscription.php';
        include_once 'status_subscription.php';
        include_once 'login.php';
        include_once 'login_both.php';
        include_once 'subscription_confirmation.php';
        ?>
    </body>
</html>