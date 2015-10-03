<?php session_start();

if(!isset($_COOKIE['user_visit'])) { //user visit cookie
    setcookie("user_visit", "index");
}

require_once 'dao/login_logout_dao.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Connecting computer users & tech firms.</title>
        <META NAME="Description" CONTENT="Techmatcher is an online service which connects computer users with qualified local technology service providers through in-depth profiles.">
        <?php require_once 'scripts.php';?>

        <!-- css -->
        <link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
         <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    </head>
      <body>
     <?php  require_once "dao/search.php"; 
                 require_once 'consumer.php';?>

        <!-- container -->
        <div id="container" class="container-page">
        <div id="container-inner">
                <?php require_once 'header_consumer_nl.php';?>
                              <!-- body -->
                <div id="bd" class="bd-page">
                <div id="bd-inner">
                        <!-- page-content -->
                        <div class="page-content">
                       
                          <!-- user-notify --> 
                          <?php 
                         if ($_SESSION['consumer']['itconsumer_id']!='') {
                         echo   '<div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>';
						 echo     '<!-- user-notify-content -->';
						 require_once ("common_functions.php");
                         require_once("header_login.php");
						 echo    '<!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->';
                         }
                         ?>
                        
                        
                        
                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top -->
                                <div class="page-container-top"></div>
                                <div class="page-container-inner clearfix">
						 <h2>Techmatcher U. Presents:</h2>
						<h1>The Tour!</h1>

                                    <!-- main column -->
                                    <div class="main">
                                    <div class="main-inner">
                                <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix">
                                                   <h3> Learn What You Need to Succeed With Techmatcher!</h3>
                                  <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 130%">
                                       CEO Neal Smith explains in this short video how to access and use all the features of Techmatcher.   Knowledge is Power! 
                                            </p>  
                                 <div> <h4> </h4> </div>     
                                <a href="http://www.youtube.com/watch?v=u5hLbwdbOq8&loop=3" rel="prettyPhoto"><img src="images/techtourvideo.png" alt="Video Tour of Techmatcher" width="500" /></a> 
                                 <div> <h4> </h4> </div>     
                                      
                               <h3>Follow These Simple Steps</h3>      
                                <a href="javascript: void(0);" onclick="return open_signup_dialog(2);"> <h5>1. Get Started by Creating an Account! </h5></a>
                                         <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
                                                 Sign up.  It is free and secure.   </p>             
                                           <p> </p> 		                     
                                          <h5>2. Create Your Profile to Find Matches!</h5>
 
                                            		 <p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
                                                In the profile area, fill out each of the tabs to build a rich picture of you and your needs.
                                                  </p>       
                                      <p> </p> 	
                                     <h5>3. Get Your Matches!</h5>

                                            		<p style="color: #000000; padding-left:5px;padding-right:5px; margin-top:10px; margin-bottom:0px; margin-left:5px; margin-right:5px; font-weight:normal;font-size: 110%">
                                                     Start by matching to your profile. In most cases that is all you need.   Use the advanced matching functions to drill into the data particular key information.        </p>    
                                          		         <p> </p> 	
                               
							                </div><!-- /tab-panel -->  

                                  </div> <!--main-inner-->

                   </div><!-- /main column -->

                         <?php    require_once 'sidebar_consumer.php'; ?> 
                       <div class="clear"></div>
    </div><!--page-container-inner clearfix -->

   <div class="page-container-bottom"></div>     

			</div><!-- /page-container provider-profile -->
		
	</div><!-- /page-content -->
		
<?php require_once 'dashboard.php';?>
	
</div> <!--bd-inner -->

</div> <!--bd-page -->
		
</div> <!--container-inner -->
		
       </div><!-- /container page -->
		
       <?php require_once 'footer.php';
        require_once 'login_both.php';
        require_once 'login_consumer.php';
        require_once 'login_provider.php';
        require_once 'signup.php';
        require_once 'forgot_password.php';
        ?>
    <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
	default_width: 840,
	default_height: 580
	});
  });
</script>     
   </body><!-- /body -->
</html>
