<?php session_start();
include_once '../dao/feedback.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher&trade;</title>
        <?php include_once '../includes/scripts_provider.php';?>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="../js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

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

        <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">
                <?php include_once '../includes/header_provider.php';?>
                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                         
                            <!-- user-notify -->
                            <!-- page-container -->
                            <div class="page-container">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2>Techmatcher Feedback</h2>
                                    <h1>Tell Us, What's on Your Mind</h1>



                                    <!-- section-->
                                    <div class="fw-content-page w100"><div class="fw-content-page-inner w100">
                                            <img src="../images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />

                                            <h2>We value your feedback.</h2>

                                            <form id="feedback_form" method="POST" onsubmit="return feedback_provider($(this));">
                                                <div class="catgoryholder_coments">
                                                    <div class="label_coments">
                                                        <label>Category:</label>
                                                    </div>
                                                    <div class="text_area_coments">
                                                        <?php $fb_types = getFeedbackTypes();?>
                                                        <select id="feedback_type" name="feedback_type" style="width: 150px">
                                                            <option></option>
                                                            <?php foreach($fb_types as $names){
                                                                    echo "<option value='{$names['feedbacktype_id']}'>".$names['feedbacktype_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="catgoryholder_coments">
                                                    <div class="label_coments"><label>Comment:</label></div>
                                                    <div class="text_area_coments"><textarea cols="40" rows="8" id="feedback_comment" name="feedback_comment"></textarea></div>
                                                    <div style="float: left; width: 70%; margin-top: 20px;"><input type="submit" class="btn" id="feedback_submit" name="feedback_submit" value="SUBMIT"/></div>
                                                </div>
                                                <div id="feedback_msg" style="margin-left: 10px;"></div>
                                            </form>

                                        </div></div><!--/section-->



                                    <div class="clear"></div>

                            
                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                    </div></div><!-- /body -->

            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';?>
    </body>
</html>