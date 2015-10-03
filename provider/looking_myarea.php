<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Advanced Search</title>
        <?php require_once 'scripts_provider.php';?>

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
        <?php require_once "search.php";?>
        <?php require_once "_change_area_chart.php";?>
        
          <!-- container -->
        <div id="container" class="container-page"><div id="container-inner">

                <?php include_once 'header_provider.php';?>

                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <div class="user-notify"><!-- user-notify-top --><div class="user-notify-top"></div>
                                <?php include_once "header_login.php";?>
                                <!-- user-notify-bottom --><div class="user-notify-bottom"></div></div><!-- /user-notify -->

                            <!-- page-container -->
                            <div class="page-container provider-profile">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2><a href="provider_home.php">My Account Home</a></h2>
                                    <h1>Profiles of Customers Searching in My Area</h1>

                                    <!-- fw-section -->

                                    <div id="main_div" class="white_header flt">
                                        <div class="white_bottom_mid_part">
                                        <div>
                                                <?php $def_image_name = "bar".$_SESSION['provider']['serviceprovider_id'].'_customersinarea.png';
                                                      $source ="../provider/charts/defaultimages/";
                                                      $image_source = $source.$def_image_name;?>
                                                      <img id="list_by_type_chart_img"  src="<?php echo $image_source;?>"/>
                                     </div>
                                     </div>
                                    </div>


                                    <div class="flt margintop50">

                                        <div class="my_tabs my_tabs-sections flt">
                                            <ul style="padding-left:20px;">
                                                <li class="active"><a href="#"><span><b>Chart Settings</b></span></a></li>
                                            </ul>
                                        </div>

                                        <div class="white_header flt">
                                            <div class="white_bottom_mid_part">
                                                <div class="chartsettings">
                                                    <div class="left_part">
                                                        <form id="chart_data_form" method="POST" onsubmit="return change_area_chart($(this));">
                                                            <div class="holder">
                                                                <div class="right_holder">
                                                                    <div class="date_holder">
                                                                        <div class="field">
                                                                            <label style="font-weight: bold;">Timeframe</label>
                                                                            <select id="date_range" name="date_range">
                                                                                <option value="lastweek">Last Week</option>
                                                                                <option value="currentweek">Current Week</option>
                                                                                <option selected value="currentmonth">Current Month</option>
                                                                                <option value="lastmonth">Last Month</option>
                                                                                <option value="currentquarter">Current Quarter</option>
                                                                                <option value="lastquarter">Last Quarter</option>
                                                                                <option value="currentyear">Current Year</option>
                                                                                <option value="lastyear">Last Year</option>
                                                                           </select>
                                                                       <div class="field1">
                                                                            <label style="font-weight: bold; width:180px;">My Geographic Area</label>
                                                                            <select id="geo_area" name="geo_area" style="width:100px;">
                                                                                <option value="custadd.zipcode = provadd.zipcode">My Zip Code</option>
                                                                                <option value="custadd.cityname = provadd.cityname">My City</option>
                                                                                <option selected value="custadd.countyname = provadd.countyname">My County</option>
                                                                                <option value="custadd.statecode = provadd.statecode">My State</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="field1">
                                                                            <label style="font-weight: bold; width:180px;">Customer Organization Category</label>
                                                                            <select id="org_type" name="org_type" style="width:100px;">
                                                                                <option selected value="Any">All Customers</option>
                                                                                <option value="Organization Size">Organization Size</option>
                                                                                <option value="Support Style">Support Style</option>
                                                                                <option value="Technical Capability">Technical Capability</option>
                                                                            </select>
																      </div>
                                                                   </div>
                                                                </div>
                                                            </div>

                                                            <div class="holder">
                                                                <input type="submit" value="SUBMIT" class="btn"/>
                                                               <input style="float: right;" type="button" value="BACK" class="btn" onclick="backtoanalytics();"/>
                                                            </div>                                                            
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                     <div style="float: right;">
                                          <p><i>Would you like to save the data from this chart? <br />  Download a copy here...</i></p>
                                        <input type="button" value="DOWNLOAD CSV" class="btn" onclick="downloadcsv();"/>
                                	
                                    <div class="clear"></div>


                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->

                        </div><!-- /page-content -->


                    </div></div><!-- /body -->

            </div></div><!-- /container -->

        <?php include_once 'footer1.php';?>

    </body>
</html>