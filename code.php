<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Account Activation</title>
        <?php include_once "scripts.php";?>

        <!-- css -->
        <link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

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
                <?php include_once "header_provider_tour.php";?>
                <!-- body -->
                <div id="bd" class="bd-page layout-b"><div id="bd-inner">

                        <!-- page-content -->
                        <div class="page-content">

                            <!-- user-notify -->
                            <!-- page-container -->
                            <div class="page-container">
                                <!-- page-container-top --><div class="page-container-top"></div><div class="page-container-inner clearfix">

                                    <h2>Welcome to Techmatcher</a></h2>
                                    <h1>Let's get started</h1>

                                    <!-- tab-panel -->
                                    <div class="tab-panel tab-panel-sections">
                                        <ul class="clearfix">
                                            <li class="active"><a href="code.php"><span>Redeem Code</span></a></li>
                                        </ul>
                                    </div><!-- /tab-panel -->

                                    <!-- section-->
                                    <div class="fw-content-page"><div class="fw-content-page-inner">
                                            <img src="images/about-howdy.png" alt="Howdy!" width="213" height="175" class="about-howdy" />

                                            <h2>Glad you got our postcard*. <br/>Enter your code below and we'll get going.</h2>
                                            <p> <i>*Need the access code for your account? Email us <a href="mailto:support@techmatcher.com?subject=Service Provider Access Code Request&body=Provide your Company Name, Address and Phone number and your role at the company.  Also attach a proof of status (scanned letterhead, business card or business license).  We'll send you a code as quickly as we can.  Thank you.">here</a> and we'll send it right away.</i>
                                            <div id="postcard">
                                                <img src="images/landingpage.gif" />
                                            </div>
                                            <br/>
                                            <br/>

                                            <p><strong style="float:left;font-size:18px;margin-bottom:2px;width:100%;">Enter your Activation Code</strong></p>
                                            <p style="font-size: 12px; color: #666666;">See the example above to identify where on the postcard your code is displayed</p>
                                            <div class="refer-provider-form" style="padding:24px 0 0 0;">
                                                <form method="POST" action="" onsubmit="return unlock_provider($(this));">

                                                    <div class="rpf-standard">
                                                        <label for="c_username">Activation Code (10-digits)</label>
                                                        <div id="_code">
                                                            <input type="text" class="txt1" id="1" name="a_code1" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="2" name="a_code2" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="3" name="a_code3" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="4" name="a_code4" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="5" name="a_code5" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <b style="font-size: 28px;">-</b>
                                                            <input type="text" class="txt1" id="6" name="a_code6" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="7" name="a_code7" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="8" name="a_code8" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="9" name="a_code9" maxlength="1" onkeyup="change_focus(this);"/>
                                                            <input type="text" class="txt1" id="10" name="a_code10" maxlength="1"/>
                                                        </div>
                                                    </div>

                                                    <div class="rpf-standard">
                                                        <label for="c_username">Enter Contact Email Address (This will be your username)</label>
                                                        <input type="text" class="txt" id="c_username" name="c_username" />
                                                    </div>

                                                    <div class="rpf-standard">
                                                        <label for="c_password">Create a Password</label>
                                                        <input type="password" class="txt" id="c_password" name="c_password" />
                                                    </div>

                                                    <div class="rpf-standard">
                                                        <label for="v_password">Verify Password</label>
                                                        <input type="password" class="txt" id="v_password" name="v_password" />
                                                    </div>
                                                    <div>
                                                        <input type="submit" class="btn" value="CONTINUE" />
                                                    </div>
                                                    <div style="margin-top: 10px; color: red; font-weight: bold;"id="unlock_err_msg"></div>

                                                </form>
                                            </div>

                                        </div></div><!--/section-->

                                    <div class="clear"></div>
                                    <br />

                                </div><!-- page-container-bottom --><div class="page-container-bottom"></div></div><!-- /page-container -->
                        </div><!-- /page-content -->
                        <?php include_once "dashboard.php";?>
                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once "footer.php";
        include_once "login.php";
        include_once "login_both.php";
        include_once "login_provider.php";
        ?>
    </body>
</html>