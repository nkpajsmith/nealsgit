<?php session_start();
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
        <?php include_once '../includes/scripts_consumer.php';?>

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

                                <!-- user-notify-content -->
                                <?php include_once("../includes/header_login.php"); ?>

                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="profile.php">My Account Home</a></h2>
                                    <h1>Referrals</a></h1>

                                    <!-- main column -->
                                    <div class="main"><div class="main-inner">

                                            <!-- tab-panel -->
                                            <div class="tab-panel-b clearfix tp-progress">
                                                <ul class="clearfix">
                                                    <li class="completed"><a href="profile.php"><span>At a Glance</span></a></li>
                                                    <li class="completed"><a href="locations.php"><span>Locations</span></a></li>
                                                    <li class="completed"><a href="organization_details.php"><span>Your Details</span></a></li>
                                                    <li class="active last"><a href="referrals.php"><span>Referrals</span></a></li>
                                                </ul>
                                            </div><!-- /tab-panel -->

                                            <!-- section -->
                                            <div class="refer-provider-form">

                                                <h3>Refer a Provider</h3>
                                                <p>If you have a great Service Provider let us know.  We'll let them know they can use Techmatcher to find other customers.</p>


                                                <form method="POST" action="" onsubmit="return submit_referrals($(this));">

                                                    <div class="rpf-standard">
                                                        <label for="companyName">Company Name</label>
                                                        <input type="text" class="txt" id="compname" name="compname" />
                                                    </div><!--/rpf-company-name-->

                                                    <!-- rpf-standard -->
                                                    <div class="rpf-standard">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="txt" id="address" name="address" />
                                                    </div><!--/rpf-address-->

                                                    <!-- rpf-location -->
                                                    <div class="rpf-location clearfix">

                                                        <!-- rpf-city -->
                                                        <div class="rpf-city">
                                                            <label for="city">City</label>
                                                            <input type="text" class="txt" id="city" name="city" />
                                                        </div><!--/rpf-city-->

                                                        <div class="rpf-state">
                                                            <label for="state">State</label>
                                                            <select id="state" name="state">
                                                                <option></option>
                                                                <option value="AK">AK</option>
                                                                <option value="AL">AL</option>
                                                                <option value="AR">AR</option>
                                                                <option value="AZ">AZ</option>
                                                                <option value="CA">CA</option>
                                                                <option value="CO">CO</option>
                                                                <option value="CT">CT</option>
                                                                <option value="DC">DC</option>
                                                                <option value="DE">DE</option>
                                                                <option value="FL">FL</option>
                                                                <option value="GA">GA</option>
                                                                <option value="HI">HI</option>
                                                                <option value="IA">IA</option>
                                                                <option value="ID">ID</option>
                                                                <option value="IL">IL</option>
                                                                <option value="IN">IN</option>
                                                                <option value="KS">KS</option>
                                                                <option value="KY">KY</option>
                                                                <option value="LA">LA</option>
                                                                <option value="MA">MA</option>
                                                                <option value="MD">MD</option>
                                                                <option value="ME">ME</option>
                                                                <option value="MI">MI</option>
                                                                <option value="MN">MN</option>
                                                                <option value="MO">MO</option>
                                                                <option value="MS">MS</option>
                                                                <option value="MT">MT</option>
                                                                <option value="NC">NC</option>
                                                                <option value="ND">ND</option>
                                                                <option value="NE">NE</option>
                                                                <option value="NH">NH</option>
                                                                <option value="NJ">NJ</option>
                                                                <option value="NM">NM</option>
                                                                <option value="NV">NV</option>
                                                                <option value="NY">NY</option>
                                                                <option value="OH">OH</option>
                                                                <option value="OK">OK</option>
                                                                <option value="OR">OR</option>
                                                                <option value="PA">PA</option>
                                                                <option value="RI">RI</option>
                                                                <option value="SC">SC</option>
                                                                <option value="SD">SD</option>
                                                                <option value="TN">TN</option>
                                                                <option value="TX">TX</option>
                                                                <option value="UT">UT</option>
                                                                <option value="VA">VA</option>
                                                                <option value="WA">WA</option>
                                                                <option value="WI">WI</option>
                                                                <option value="WV">WV</option>
                                                                <option value="WY">WY</option>
                                                            </select>
                                                        </div><!--/rpf-state-->

                                                        <!-- rpf-zip -->
                                                        <div class="rpf-zip">
                                                            <label for="zip">Zip</label>
                                                            <input type="text" class="txt" id="zip" name="zip" />
                                                        </div><!--/rpf-zip-->
                                                    </div>

                                                    <div class="rpf-standard">
                                                        <label for="address">Email</label>
                                                        <input type="text" class="txt" id="email" name="email" />
                                                    </div><!--/rpf-address-->

                                                    <div class="rpf-standard">
                                                        <label for="address">Phone (Optional)</label>
                                                        <input type="text" class="txt" id="phone" name="phone" />
                                                    </div><!--/rpf-address-->

                                                    <div class="rpf-standard">
                                                        <label for="address">Contact Name (Optional)</label>
                                                        <input type="text" class="txt" id="cont_name" name="cont_name" />
                                                    </div><!--/rpf-address-->

                                                    <div>
                                                        <input type="submit" class="btn" value="CONTINUE" />
                                                    </div>

                                                    <div id="div_register_errors_ref" style="margin-top:10px; color: red;"></div>
                                                </form>
                                                <br/>
                                            <div id="summary">
                                                <h4><span>Summary</span></h4>
                                                <p> This is a list of the providers you have referred or who have listed you as a reference.  To report an error <a href="mailto:tm_support@techmatcher.com"> email support. </a></p>
                                                <?php $qry = pg_query_params("select distinct(serviceprovider_id) from techmatcher.serviceprovidercustomerlinkhistory where itconsumer_id = $1 ORDER BY serviceprovider_id DESC", array($_SESSION['consumer']['itconsumer_id']));
                                                while($result = pg_fetch_array($qry)) {
                                                    $qry4=pg_query_params("select primaryname from techmatcher.serviceprovider where serviceprovider_id = $1",array($result['serviceprovider_id']));
                                                    $result4= pg_fetch_all($qry4);
                                                    ?>
                                                <p> <?php echo $result4[0]['primaryname']; ?></p>
                                                    <?php } ?>
                                            </div>
                                            </div><!-- /section -->

                                        </div></div><!-- /main column -->

                                    <?php include_once 'sidebar_consumer_tour.php';?>

                                    <div class="clear"></div>
                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once '../includes/footer1.php';
        include_once '../popups/login_consumer.php';
        include_once '../popups/login_header.php';
        include_once '../popups/login_both.php';
        include_once '../popups/consumer_subscription.php';
        include_once '../popups/status_subscription.php';
        include_once '../popups/advance_search.php';
        include_once '../includes/advance_search_progress_bar.php';?>
    </body>
</html>