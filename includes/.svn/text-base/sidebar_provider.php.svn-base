<?php session_start(); ?>
<div class="side">
       <!-- css -->
        <link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
		<script src="js/cluetip/jquery.cluetip.js" type="text/javascript"> </script>
		<script src="js/tooltips.js" type="text/javascript"></script>
<!--PrettyPhoto Block
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>  -->
         <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
         <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

    <?php  require_once 'login_logout_dao.php';
                 require_once 'signup.php';
                 require_once 'login_provider.php';
                 require_once 'consumer.php';
                 require_once 'forgot_password.php';
                 require_once 'subscription.php';
     ?>
             

    <!-- side-find-a-match -->
    <div class="side-find-a-match">
    <?php 
            $subsRecord= getSubscriptionRecordView($_SESSION['provider']['serviceprovider_id']); 
            if ($_SESSION['provider']['serviceprovider_id']=='') {
             echo '<a href="/code.php">Unlock Your Account!</a>';
            }
            else 
            {$subsRecord= getSubscriptionRecordView($_SESSION['provider']['serviceprovider_id']); 
               if($subsRecord !=""){
                   echo '<a href="analytics.php">Analyze Your Market!</a>';
                 }else{ 
                 if  (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'provider_products.php') {
                  echo '<a href="javascript: void(0);" onclick="show_provider_subscription_msg();">Analyze Your Market!</a>';
                  } else { echo ' <a href="javascript: void(0);" onclick="return provider_subscription();">Subscribe Now!</a>'; }
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
									  <ul>  <?php
										     $bb105=get_bubble_text(105);
										     $bb106=get_bubble_text(106);
										     $bb107=get_bubble_text(107);
										     $bb109=get_bubble_text(109);
										     $bb110=get_bubble_text(110);
										     $bb103=get_bubble_text(103);
										     $bb104=get_bubble_text(104);    
										     $bb114=get_bubble_text(114);    
										     $bb115=get_bubble_text(115);    
										     $bb116=get_bubble_text(116);    
									
									        if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'provider_tour.php') {
											echo '<li><a class="toolbox-callout-button toolbox-callout-free-analytics"   href="view_free_charts.php">Free Analytics</a> <span class="toolbox-callout-help">  <a class="tooltip" title="'.$bb103.'"></a></span></li>';
											} else {
											echo '<li><a class="toolbox-callout-button toolbox-callout-free-analytics"   href="../view_free_charts.php">Free Analytics</a> <span class="toolbox-callout-help"> <a class="tooltip" title="'.$bb103.'"></a></span></li>';
										    }
											
											echo '<li><a class="toolbox-callout-button toolbox-callout-login-now" href="javascript: void(0);" onclick="return open_login_provider_dialog()">Login now!</a><span class="toolbox-callout-help"><a class="tooltip" title="'.$bb110.'">Help</a></span></li>';
                                            echo '<li><a class="toolbox-callout-button toolbox-callout-watch-video" href="http://www.youtube.com/watch?v=EMv3cJU9ktg&loop=3" rel="prettyPhoto">Watch Our Video</a> <span class="toolbox-callout-help"> <a class="tooltip" title="'.$bb116.'"></a></span></li>'; 
			

											if ($_SESSION['provider']['serviceprovider_id']=='') 	{								 
											 echo '<li><a class="toolbox-callout-button toolbox-callout-manage-account-d" disabled = true onclick="return false" href="provider/provider_profile.php">Manage Profile</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb105.'"></a></span></li>';
											 echo '<li><a class="toolbox-callout-button toolbox-callout-subscriptions-d" disabled = true onclick="return false" href="provider/provider_products.php">Subscriptions</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'"></a></span></li>';
										   	 echo '<li><a class="toolbox-callout-button toolbox-callout-analytic-tools-d" disabled = true onclick="return false" href="provider/analytics.php">Analysis Tools</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb109.'"></a></span></li>';
										     echo '<li><a class="toolbox-callout-button toolbox-callout-go-sp-home-d" disabled = true onclick="return false" href="provider/provider_home.php">Go to Provider Home</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb107.'"></a></span></li>';
											 echo '<li><a class="toolbox-callout-button toolbox-callout-give-feedback-d" disabled = true onclick="return false" href="provider/provider_feedback.php">Share a Thought</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb115.'">Help</a></span></li>';
												} else {
										      if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'provider_profile.php') {
										         if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'provider_tour.php') { 
										             echo '<li><a class="toolbox-callout-button toolbox-callout-manage-account" href="provider_profile.php">Manage Profile</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb105.'"></a></span></li>';
	                                               } else {echo '<li><a class="toolbox-callout-button toolbox-callout-manage-account" href="provider/provider_profile.php">Manage Profile</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb105.'"></a></span></li>';									   
											     }
											   }
											   
											   if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) !== 'provider_tour.php') { 
											   echo '<li><a class="toolbox-callout-button toolbox-callout-subscriptions"  href="../provider/provider_products.php">Subscriptions</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'"></a></span></li>';
										        } else {
										        echo '<li><a class="toolbox-callout-button toolbox-callout-subscriptions"  href="provider/provider_products.php">Subscriptions</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'"></a></span></li>';
										        echo '<li><a class="toolbox-callout-button toolbox-callout-give-feedback" href="provider/provider_feedback.php">Share a thought</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb114.'">Help</a></span></li>';
												}
										    
										    if($subsRecord ==""){
										    echo '<li><a class="toolbox-callout-button toolbox-callout-analytic-tools-d" disabled = true onclick="return false" href="provider/analytics.php">Analysis Tools</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb109.'"></a></span></li>';
										     } else {if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'provider_tour.php') {
										      echo '<li><a class="toolbox-callout-button toolbox-callout-analytic-tools" href="provider/analytics.php">Analysis Tools</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb109.'"></a></span></li>';
										        } else {echo '<li><a class="toolbox-callout-button toolbox-callout-analytic-tools" href="analytics.php">Analysis Tools</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb109.'"></a></span></li>';
										     }
										     }
										     if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'provider_tour.php') {
										     echo '<li><a class="toolbox-callout-button toolbox-callout-go-sp-home" href="provider/provider_home.php">Go to Provider Home</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb107.'"></a></span></li>';
                                              } else {
                                            echo '<li><a class="toolbox-callout-button toolbox-callout-go-sp-home" href="provider_home.php">Go to Provider Home</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb107.'"></a></span></li>';
											echo '<li><a class="toolbox-callout-button toolbox-callout-give-feedback" href="../provider/provider_feedback.php">Share a thought</a> <span class="toolbox-callout-help"><a class="tooltip" title="'.$bb106.'">Help</a></span></li>';
                                              }

                                               }
                                               ?>
								   									     
										</ul>
									</div>
									  <script type="text/javascript" charset="utf-8">
										$(document).ready(function(){
										$("a[rel^='prettyPhoto']").prettyPhoto({
											default_width: 840,
	                                        default_height: 580
										});
										});
									</script>
									<!-- side-social -->
									<div class="side-social">
										<ul>
											<li class="side-social-facebook"><a href="http://www.facebook.com/pages/Techmatcher-Fan-Page/121946271156566" target="_blank">Fan Us On Facebook</a></li>
											<li class="side-social-twitter last"><a href="http://twitter.com/techmatcher" target="_blank">Follow Us On Twitter</a></li>
										</ul>
									</div><!--/side-social-->
									
								</div><!--/side-toolbox-->
								
							</div></div><!--/side-section-c-->
</div><!-- /side column -->