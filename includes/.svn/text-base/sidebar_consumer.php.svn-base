<div class="side">
<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
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
									
									<?php 
									 $emailbody = "Content-type: text/html; charset=iso-8859-1; MIME-Version: 1.0Content-Transfer-Encoding: 8bit Content-Type: text/plain; charset='iso-8859-1'
                                                            <div style='margin:0 auto;width:950px;'>
															<div style = 'height:190px;background-repeat:no-repeat;float:left;width:950px;'><img src='http://images.techmatcher.com/email-header.gif' alt='Techmatcher' width='950' height='200' /></div>
															<div style='float:left;width:950px;'>
																<div style='color:#333333;float:left;font-family:Arial,Helvetica,sans-serif;font-size:28px;font-style:bold; line-height:66px;margin-top:50px;width:100%;padding:10px;'>
																	Thanks for joining Techmatcher!
																</div>
																
															</div>
															<div style='float:right;width:950px;'>
																<div style='color:#333333;float:left;font-family:Arial,Helvetica,sans-serif;font-size:13px;
																	 line-height:28px;text-align:left;width:100%;padding:10px;'>
												
																	<p>Thanks for joining Techmatcher. We're happy to report that your account has been created!</p>
																	<p> You can login to access your personal profile using your email address:</p>

																	<p>When you use your account on Techmatcher to build a personal profile, the number of matching
																		possibilities are greatly increased. You can match on services or specific skills you are interested
																		in. You can search outside your immediate geographic area. For more complex, questions you can
																		even limit your results based on Service Provider rating and more...</p>
																	<br/>
																	<div align='center' style='line-height:0px'><p><strong> Happy Matching,</strong></p>
																	<br/><br/>
																	<p><strong>Neal Smith</strong></p>
																	<p>CEO | Co-Founder</p>
																	<p>Techmatcher LLC</p>
																</div>
																	</div>
																	 <div style='float:left;width:950px;'>	<p><img src='http://images.techmatcher.com/email-footer.gif' width='950' height='200' /></p></div>
															</div>
														</div>";
									
					
									
									echo '<!-- side-social -->';
									echo '<div class="side-social">';
									echo '<ul>';
											echo '<li class="side-social-facebook"><a href="http://www.facebook.com/pages/Techmatcher-Fan-Page/121946271156566" target="_blank">Fan Us On Facebook</a></li>';
											echo '<li class="side-social-facebook"><a href="mailto:Enter a few email addresses here?from=outreach@techmatcher.com&subject=I think this site is what you need!&body='.$emailbody.'"> Refer a Friend! </a>'; 
											echo '<li class="side-social-twitter last"><a href="http://twitter.com/techmatcher" target="_blank">Follow Us On Twitter</a></li>';
                                                    
                                    echo '</ul>';
									echo '</div><!--/side-social-->';
									?>
								</div><!--/side-toolbox-->
								
							</div></div><!--/side-section-c-->
</div><!-- /side column -->