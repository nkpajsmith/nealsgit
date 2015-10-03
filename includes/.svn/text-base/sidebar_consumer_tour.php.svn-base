<div class="side">
<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
<script src="js/cluetip/jquery.cluetip.js" type="text/javascript"> </script>
<script src="js/tooltips.js" type="text/javascript"></script>
    <?php  require_once 'login_logout_dao.php';
                 require_once 'consumer.php';
                 require_once 'signup.php';
                 require_once 'login_consumer.php';
                 require_once 'forgot_password.php';
                 require_once 'free_search.php';
                 require_once 'advance_search_progress_bar.php';
                 require_once 'advance_search.php';
                 ?>
    <!-- side-find-a-match -->
    <div class="side-find-a-match">
       <?php
            if ($_SESSION['consumer']['itconsumer_id']=='') 
            {
             echo '<a href="javascript: void(0);" onclick="return open_signup_dialog(2);">Sign Up Now!</a>';
            } else {
                      $subsRecord= getSubscriptionRecordView($_SESSION['consumer']['itconsumer_id']); //subscription record from history
                     if($subsRecord !=""){  //<!-- there is a consumer_id and a subscription -->
                      echo '<a href="javascript: void(0);" onclick="open_advance_search_dialog();">Get a Match Now!</a>';
                      }
                       else { //no subscriber record
                                if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'consumer_products.php') // already on product page
                               { echo '<a href="javascript: void(0);" onclick="return consumer_subscription();">Subscribe Now!</a>';}
                                  else if (is_file('consumer_products.php') ) //is the product page in the same directory? 
                                {  echo  '<a href="consumer_products.php">Get a Match Now!</a>';}
                                else { echo  '<a href="consumer/consumer_products.php">Get a Match Now!</a>';}
  			          } 
  			        }
            ?>
            
   
    </div><!--/side-find-a-match-->

   <!-- side-section-c -->
							<div class="side-section-c"><div class="side-section-c-inner">
								
								<!-- side-toolbox -->
								<div class="side-toolbox">
									<h3>Toolbox</h3>
								
									<!-- toolbox callout buttons -->
									<div class="toolbox-callout-buttons">
										<ul><?php
										
											 $bb104=get_bubble_text(104);
											 $bb106=get_bubble_text(106);
										     $bb109=get_bubble_text(109);
										     $bb112=get_bubble_text(112);
										     $bb111=get_bubble_text(111);
										     $bb113=get_bubble_text(113);
										     $bb114=get_bubble_text(114);
										     $bb115=get_bubble_text(115);
										
											echo '<li><a class="toolbox-callout-button toolbox-callout-free-match" href="javascript: void(0);" onclick="open_free_search_dialog();">Try a Search Free</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb113.'">Help</a></span></li>';
										     
											if ($_SESSION['consumer']['itconsumer_id']=='') {
											echo '<li><a class="toolbox-callout-button toolbox-callout-login-now" href="javascript: void(0);" onclick="	return open_login_consumer_dialog()">Login now!</a><span class="toolbox-callout-help"><a class="tooltip" title="'.$bb112.'">Help</a></span></li>';
											}
											if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'techuser_tour.php') {
											echo '<li><a class="toolbox-callout-button toolbox-callout-take-tour" href="../techuser_tour.php">Take the Tour</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb104.'">Help</a></span></li>';
										    }
										     
											if ($_SESSION['consumer']['itconsumer_id']=='') 	{		
											echo '<li><a class="toolbox-callout-button toolbox-callout-manage-account-d" disabled = true onclick="return false" href="../consumer/profile.php">Manage Profile</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb111.'">Help</a></span></li>';
											echo '<li><a class="toolbox-callout-button toolbox-callout-subscriptions-d" disabled = true onclick="return false" href="../consumer/consumer_products.php">Subscriptions</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'">Help</a></span></li>';
											echo '<li><a class="toolbox-callout-button toolbox-callout-give-feedback-d" disabled = true onclick="return false" href="../consumer/feedback.php">Share a Thought</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb115.'">Help</a></span></li>';
											} else {
											if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'profile.php' &&
											    substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'locations.php' &&
											    substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'referrals.php' &&
											    substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'organization_details.php' ) {
										    echo' <li><a class="toolbox-callout-button toolbox-callout-manage-account" href="../consumer/profile.php">Manage Your Profile</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb111.'">Help</a></span></li>';
											}
											echo '<li><a class="toolbox-callout-button toolbox-callout-subscriptions" href="../consumer/consumer_products.php">Subscriptions</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'">Help</a></span></li>';
										    echo '<li><a class="toolbox-callout-button toolbox-callout-give-feedback" href="../consumer/feedback.php">Share a thought</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb114.'">Help</a></span></li>';
										    }
                                               ?>
									 </ul>
									</div>
									
									<!-- side-social -->
									<div class="side-social">
										<ul><?php
											echo '<li class="side-social-facebook"><a href="http://www.facebook.com/pages/Techmatcher-Fan-Page/121946271156566" target="_blank">Fan Us On Facebook</a></li>';
											echo '<li class="side-social-facebook"><a href="mailto:"Enter a few email addresses here".?from=outreach@techmatcher.com&reply-to='.$_Session[consumer][itconsumer_emailaddress].'&subject=I think this site is what you need!&body=Techmatcher is a new service for technology users and service providers.  Techmatcher matches people and organizations with technical needs with firms that can meet those needs.  It is free to get started and I think you would benefit by checking it out! Sincerely %0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A"> Refer a Friend! </a>'; 
											echo '<li class="side-social-twitter last"><a href="http://twitter.com/techmatcher" target="_blank">Follow Us On Twitter</a></li>';
                                                    ?>
										</ul>
									</div><!--/side-social-->
									
								</div><!--/side-toolbox-->
								
							</div></div><!--/side-section-c-->
</div><!-- /side column -->