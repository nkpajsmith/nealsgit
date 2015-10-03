<?php session_start();

include '../dao/dbcon.php';
include '../dao/consumer.php';
require_once("login_logout_dao.php");

$consumer_id=$_SESSION['consumer']['itconsumer_id'];
$subsRecord= getSubscriptionRecordView($consumer_id); //subscription record from history
$search_id=$_SESSION['$search_id'];

//------------------------------------- Paging -------------------------------------------
$rowsPerPage = 5;
$pageNum = 1;

if(isset($_GET['page'])){
    $pageNum = $_GET['page'];
}
$offset = ($pageNum - 1) * $rowsPerPage;

$qry5= pg_query_params("select distinct matchhistory.serviceprovider_id, rank,
												   case when ntile(100) over (order by totalscore desc) between 1 and 3 then 'Top 3 in Match' end as top3
													from techmatcher.matchhistory left join
												(select serviceprovider_id,sum(ratingscore)as totalscore, rank() over(order by sum(ratingscore) DESC), 
													case when (rank() over (order by sum(ratingscore) DESC) 
													between 1 and 5) and sum(ratingscore) > 4 then 'Top Rated Provider!' end as toprated
													 from techmatcher.ratingevents join 
													 (select ratingsystem_id, max(ratingeventdate) ratingeventdate from techmatcher.ratingevents group by ratingsystem_id) latest 
													 on (ratingevents.ratingeventdate=latest.ratingeventdate and ratingevents.ratingsystem_id=latest.ratingsystem_id)
													group by serviceprovider_id) ratings
												on (matchhistory.serviceprovider_id=ratings.serviceprovider_id) where itconsumer_id =$1
												and search_id=$2 ORDER BY top3, rank ASC ",array($consumer_id,$_SESSION['search_id']));
$row     = pg_num_rows($qry5);
$numrows = $row;
$maxPage = ceil($numrows/$rowsPerPage);
$self = $_SERVER['PHP_SELF'];

if ($pageNum > 1)
{
    $page = $pageNum - 1;
    $prev = " <a onclick='advance_search_records($page);' href='javascript: void(0);'>Previous</a> ";
    $first = " <a onclick='advance_search_records(1);' href='javascript: void(0);'>First</a> ";
}
else
{
    $prev  = ' Previous ';       // we're on page one, don't enable 'previous' link
    $first = ' First '; // nor 'first page' link
}

if ($pageNum < $maxPage)
{
    $page = $pageNum + 1;
    $next = " <a onclick='advance_search_records($page);' href='javascript: void(0);'> Next </a> ";
    $last = " <a onclick='advance_search_records($maxPage);' href='javascript: void(0);'> Last </a> ";
}
else
{
    $next = ' Next ';      // we're on the last page, don't enable 'next' link
    $last = ' Last '; // nor 'last page' link
}
//-------------------------------------------------------------------------------
?>
               
                   <div id="pageno" class="main search-result-main">
                        <?php
                              $qry3= pg_query_params("select spmatch.serviceprovider_id from (select distinct serviceprovider_id from techmatcher.matchhistory where search_id=$1) spmatch /* all providers in match */
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
			on (spmatch.serviceprovider_id=ratings.serviceprovider_id)  ORDER BY top3, ratings.rank ASC LIMIT $2 OFFSET $3", array($_SESSION['search_id'],$rowsPerPage,$offset));
                                                        while($result3 = pg_fetch_array($qry3)) {
                                                            $qry4=pg_query_params("select distinct serviceprovider.serviceprovider_id,primaryname, contactemailaddress,toprated, top3, ntile, totalscore, rank    from techmatcher.serviceprovider right join (
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
		on (serviceprovider.serviceprovider_id=provs_ranked.serviceprovider_id) 		where serviceprovider.serviceprovider_id=$2
		 order by toprated, top3",array($_SESSION['search_id'],$result3['serviceprovider_id']));
                                     $result4= pg_fetch_all($qry4);
                                //for getting address of each provider
                                $qry6 = pg_query_params("select * from techmatcher.address as add, techmatcher.serviceprovidertoaddress 
	                                                       as ser where add.address_id = ser.address_id and ser.serviceprovider_id  = $1
	                                                       and address_deleted ='f'
                                                       and addresstype_id in (1,2)", array($result3['serviceprovider_id']));
                                $result_add = pg_fetch_all($qry6);                                
                                $add_city = $result_add[0]['city'].", ".$result_add[0]['state']." ".$result_add[0]['zipcode'];
                        ?>
                      
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
                                <span><b><a href="javascript: void(0);" onclick="document.getElementById(<?php echo $result3['serviceprovider_id'] ?>).submit()">Read Full Profile</a></b></span>
                            </div>
                               <?php
								 if ($result4[0]['contactemailaddress']!=''){
								 echo '<div style="margin-left:3;float:left;line-height:25px"><p class="add-new-btn"><a href="mailto:'.$result4[0]['contactemailaddress'].'?from=outreach@techmatcher.com&reply-to=testcuster@techmatcher.com&subject=Service Inquiry Request -- Courtesy of Techmatcher (www.techmatcher.com)&body=Write a short note of inquiry specifying what you need and when you need it.  %0D%0A%0D%0AFor example: %0D%0A%0D%0AI am writing to inquire about hiring your firm I have specific needs in the following areas: Networking, Server support and email.  %0D%0A%0D%0A%0D%0AMake sure you list any questions you have:%0D%0A%0D%0AOnly firms with proven experince will be consided so please include a statement of your qualifications and a summary of at least on recent engagement where you provided these servcies.  %0D%0A%0D%0A%0D%0AGive them some idea of your timeframe for response (1-3 days would be extra fast, 4-6 would be fast and 7 or more would be normal):%0D%0A%0D%0AI am eager to move on this please respond to this email with your information with in 7 business days.%0D%0A%0D%0A%0D%0ASincerely %0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A Thank you%0D%0A%0D%0A  P. S.  I found your firm on Techmatcher."><img src="../images/email.gif" alt="Contact by Email Now!"> Contact by Email Now! </a></p></div>'; 
								} ?>
                       </form>
                   </div></div><!-- /search results -->
                      
                            <?php
                                }?>
                    <div>
                    <?php
                    if($subsRecord != "") {
                            echo "<b>".$first . $prev ."</b>". " ( $pageNum / $maxPage ) " . "<b>".$next . $last."</b>";
                    }
                        ?>
                    </div>
                </div>
               