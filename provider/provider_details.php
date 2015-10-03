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
if($subsRecord!=""){ // if the subscription is done else show only 5 records
    $qry5    = pg_query_params("select distinct(serviceprovider_id) as numrows from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
    $row     = pg_num_rows($qry5);
    $numrows = $row;
}else{
    $row     = 5;
    $numrows = $row;
}
$maxPage = ceil($numrows/$rowsPerPage);
$self    = $_SERVER['PHP_SELF'];

if ($pageNum > 1) {
    $page = $pageNum - 1;
    $prev = " <a onclick='all_provider_result($page);' href='javascript: void(0);'>[Prev]</a> ";
    $first = " <a onclick='all_provider_result(1);' href='javascript: void(0);'>[First]</a> ";
}
else {
    $prev  = ' [Prev] ';       // we're on page one, don't enable 'previous' link
    $first = ' [First] '; // nor 'first page' link
}

if ($pageNum < $maxPage) {
    $page = $pageNum + 1;
    $next = " <a onclick='all_provider_result($page);' href='javascript: void(0);'>[Next]</a> ";
    $last = " <a  onclick='all_provider_result($maxPage);' href='javascript: void(0);'>[Last]</a> ";
}
else {
    $next = ' [Next] ';      // we're on the last page, don't enable 'next' link
    $last = ' [Last] '; // nor 'last page' link
}
//-------------------------------------------------------------------------------
$qry_sp = pg_query_params("select distinct(serviceprovider_id) as numrows from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($it_consumer_id,$_SESSION['search_id']));
$all_results = pg_fetch_array($qry_sp);
if(isset($_POST['provider_id'])){
    $provider_idd = $_POST['provider_id'];
}else{
    $provider_idd = $all_results[0];
    $qryy=pg_query_params("select primaryname from techmatcher.serviceprovider where serviceprovider_id = $1",array($provider_idd));
    $resultt= pg_fetch_array($qryy);
}

if(isset($_POST['providername'])){
    $provider_name = $_POST['providername'];
}else{
     $provider_name = $resultt[0];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- meta -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />


		<!-- title -->
		<title>Techmatcher&trade;</title>


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
                include_once("../dao/search.php");
                //check_consumer_access();
            ?>
		<!-- container -->
		<div id="container" class="container-page"><div id="container-inner">

			<?php include_once '../includes/header_consumer.php';?>

			<!-- body -->
			<div id="bd" class="bd-page"><div id="bd-inner">

				<!-- page-content -->
				<div class="page-content">

					<!-- user-notify -->
					<div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
						<div class="user-notify-content clearfix">
                                                <?php  if(isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="") {?>
                                                <p>You are logged in as <b style="color:#F29822"><?php echo (isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="")?$_SESSION['consumer']['itconsumername']:"Anonymous User";?></b></p>
                                                <?php $qry_abc= pg_query_params("select distinct(serviceprovider_id) from techmatcher.matchhistory where itconsumer_id =$1 and search_id=$2 ORDER BY serviceprovider_id",array($_SESSION['consumer']['itconsumer_id'],$_SESSION['search_id']));
                                                $test = pg_num_rows($qry_abc);
                                                if($test > 0) { ?>
                                                <p> &nbsp; Good news! We found <b style="color:#F29822"><?php echo $test;?></b> matches for you. </p>
                                                <?php } ?>
                                                    <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
                                                <?php }?>
                                            </div><!-- /user-notify-content -->
					<!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

					<!-- page-container -->
					<div class="page-container provider-profile">
					<!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

						<h2><a href="profile.php">My Account Home </a></h2>
                                                <h1>Provider Detail</a></h1>

                                                <div class="tab-panel-b clearfix tab-panel-sections">
                                                       <ul class="clearfix">
                                                           <li><a href="advance_search_results_5.php"><span>At a Glance</span></a></li>
                                                           <li><a href="advance_search_results.php"><span>Tell Me More</span></a></li>
                                                           <li class="active"><a href="provider_details.php"><span>Full Results</span></a></li>
                                                        </ul>
                                                </div><!-- /tab-panel -->

                                                <div class="main" style="margin-left:-16px;margin-right:13px;">
                                                    <div class="main-inner">
						<!-- section -->
						<div id="pageno" class="fw-section" style="background-image: none;"><div class="fw-section-inner" style="background-image: none; padding-left:14px;">
                                                        <h3>Details of the <?php echo $provider_name ?> </h3>
							
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
									<p class="address-box-label">Address</p>
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
											<?php echo $address1[0]['phonenumber'];?>
										</div>

                                                                                <input type="hidden" name="address_idddd" value="<?php echo $address1[0]['address_id'];?>"/>

										<div id="div_register_errors1" class="errordiv" ></div>									
								</div>
							</div>
                                                        <?php $counting++;} ?>  

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
									<p class="address-box-label">Employee</p>
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
									<p class="address-box-label">Service</p>
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

                                                        <div id="selected_skills" class="address-box-wrap" style="float: left; margin-top: 12px;">
                                                        <div class="address-box"><div class="address-box-inner">
                                                            <p class="address-box-label">Skills</p>
                                                            <p class="address-box-value">Selected Skills</p>
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
                                                    <?php echo "<b>".$first . $prev ."</b>". " ( $pageNum / $maxPage ) " . "<b>".$next . $last."</b>"; ?>
                                                  </div><!-- /section --> 
                                                 </div>
                                               </div>

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
						?>
	</body>
</html>