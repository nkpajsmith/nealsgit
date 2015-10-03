<?php session_start();

include_once '../dao/dbcon.php';
include_once '../dao/consumer.php';
include_once '../dao/serviceskills.php';
include_once '../dao/staff.php';
include_once '../dao/service.php';
include_once '../dao/address.php';

$consumer_id=$_SESSION['consumer']['itconsumer_id'];
$search_id=$_SESSION['$search_id'];
$subsRecord= getSubscriptionRecordView($consumer_id); //subscription record from history

//------------------------------------- Paging -------------------------------------------
$rowsPerPage = 1;
$pageNum = 1;

if(isset($_GET['page'])) {
    $pageNum = $_GET['page'];
}
$offset = ($pageNum - 1) * $rowsPerPage;

if($subsRecord != ""){
    $qry5= pg_query_params("select distinct(matchhistory.serviceprovider_id), toprated, rank
							from techmatcher.matchhistory left join
							(select serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
								case when (rank() over (order by sum(ratingscore) DESC) 
								between 1 and 5) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
								 from techmatcher.ratingevents join 
								 (select ratingsystem_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by ratingsystem_id) latest 
								 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.ratingsystem_id=latest.ratingsystem_id)
								group by serviceprovider_id) ratings
							on (matchhistory.serviceprovider_id=ratings.serviceprovider_id) where itconsumer_id =$1
							and search_id=$2",array($consumer_id,$_SESSION['search_id']));
    $row     = pg_num_rows($qry5);
    $numrows = $row;
}else{
    $row     = 5;
    $numrows = $row;
}

$maxPage = ceil($numrows/$rowsPerPage);
$self = $_SERVER['PHP_SELF'];

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
$qry10    = pg_query_params("select distinct(matchhistory.serviceprovider_id), toprated, rank
							from techmatcher.matchhistory left join
							(select serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
								case when (rank() over (order by sum(ratingscore) DESC) 
								between 1 and 5) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
								 from techmatcher.ratingevents join 
								 (select ratingsystem_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by ratingsystem_id) latest 
								 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.ratingsystem_id=latest.ratingsystem_id)
								group by serviceprovider_id) ratings
							on (matchhistory.serviceprovider_id=ratings.serviceprovider_id) where itconsumer_id =$1
							and search_id=$2 ORDER BY rank ASC LIMIT $3 OFFSET $4",array($consumer_id,$_SESSION['search_id'],$rowsPerPage,$offset));
$ids = pg_fetch_all($qry10);
$provider_idd=$ids[0]['serviceprovider_id'];
$provider_name=$_POST['providername'];

$qry11=pg_query_params("select primaryname, contactemailaddress from techmatcher.serviceprovider where serviceprovider_id = $1",array($provider_idd));
$names= pg_fetch_all($qry11);
$provider_name = $names[0]['primaryname'];
$contactemailaddress = $names[0]['contactemailaddress'];
?>

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
											<?php echo $address1[0]['phonenumber'];?>
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
