<?php session_start();

if(!isset($_COOKIE['user_visit'])) { //user visit cookie
    setcookie("user_visit", "index");
}

include_once 'dao/login_logout_dao.php';

if(isset($_SESSION)) {
    session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="Pragma" content="no-cache" />

        <!-- title -->
        <title>Techmatcher | Welcome - Your Help Is Here</title>
        <META NAME="Description" CONTENT="Techmatcher is an online service which connects computer users with qualified local technology service providers through in-depth profiles.">
        <?php include_once 'scripts.php';?>

        <!-- css -->
        <link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
        <link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
        <link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />

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
        <div id="container" class="container-home"><div id="container-inner">
                <img id="load" src="images/loader.gif" border="0" style="z-index:1001; position:absolute; top: 404px; left: 516px; display: none; "/>
                <div id="main" style=" background-color:gray; position:absolute; width: 100%; height: 984px; z-index:1000; display: none;"> </div>

                <?php include_once 'header.php';?>

                <!-- body -->
                <div id="bd" class="bd-home"><div id="bd-inner">

                        <!-- intro -->
                        <div class="intro clearfix">

                            <!-- intro-main -->
                            <div class="intro-main">
                                <h1>The Help You Need!</h1> 
                                <p><b>Techmatcher</b> is a new online service that connects tech users, like you, with highly qualified tech service providers.  Using <i>in-depth profiles</I>, we match users' specific needs to providers equipped to meet those needs.   In just a few clicks, you can describe your situation (e.g.  home user, office user with no IT staff)  and get connected.   <b><i>The service provider to meet your needs is found on Techmatcher.</i></b></p>
</div><!-- /intro-main -->
                            <!-- modal window -->
                            <div class="modal-wrap">
                                <div id="modaltest_1" class="modalwindow"><div class="modalwindow-bkg">
                                        <!-- modal form -->
                                        <div class="modal-form-login-zip">
                                            <form id='frm_login_zip' name="frm_login_zip" method="post">

                                                <input type="hidden" id="keyword_hidden" name="keyword_hidden" value=""/>
                                                <!-- row -->
                                                <div class="row">
                                                    <label>Email Address</label>
                                                    <input id="email" name="email" type="text" class="txt" onblur="emailVerification(this.value);" />
                                                </div>
                                                <div id="passdiv" class="row" style="display:none;">
                                                    <label>Password</label>
                                                    <input id="pwd" name="pwd" type="password" class="txt"/>
                                                </div>
                                                <!-- row -->
                                                <div class="row">
                                                    <label>Captcha</label>
                                                    <img id="captcha" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                                                </div>
                                                <div class="row">
                                                    <label>Enter the code above</label>
                                                    <input id="c1" class="txt" type="text" name="captcha_code" size="10" maxlength="6" />
                                                    <img border="0" align="bottom" onclick="document.getElementById('captcha').src = 'secureimage/securimage_show.php?' + Math.random(); return false" alt="Refresh Image" src="images/refresh.gif"/>
                                                </div>

                                                <div id="error_desc"  style="color:red;font-weight:bold;"></div>
                                                <!-- submit row -->
                                                <div class="submit-row">
                                                    <input type="button" value="SUBMIT" class="btn" onclick="captcha_verification(document.getElementById('c1').value);"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div><div class="modalwindow-btm"></div></div>
                            </div>
                            <!-- intro-side -->
                            <div class="intro-side">
                                <h2>Let&rsquo;s Get Started!</h2>
                                <!-- intro-side-content -->
                                <div class="intro-side-content">
                                    <div class="home-start-buttons">
                                    	<a href="techuser_tour.php">Start Matching Here!</a>
                                    </div>

                                    <!-- account-login -->
                                    <div class="account-login clearfix">

                                        <p>Already have an account?</p>
                                        <span class="action-btn"><a href="javascript:void(0)" class="home-login-link" onclick="opn_login_new();"><span>Login</span></a></span>

                                        <!-- client login -->
                                        <div id="login_div" class="home-login">
                                            <form id='frm_login_popup' name="frm_login_popup" method="post" onsubmit="return verify_login($(this));">
                                                <input id="email" name="email" type="text" class="txt" value="Username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                                                <input id="pwd" name="pwd" type="password" class="txt" value="Password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                                                <div class="login-submit">
                                                    <input type="submit" value="LOGIN" class="btn" />
                                                    <a href="javascript:void(0)" onclick="$('#modal_forgot_pass').dialog('open');"><span>Forgot Password</span></a>
                                                </div>
                                                <div id="div_register_errors_1" style="margin:0px; color: red;"></div>
                                            </form>
                                            <br/>
                                        </div><!-- /login -->

                                    </div><!-- /account-login -->

                                </div><!-- /intro-side-content -->
                                <!-- intro-side-bottom --><div class="intro-side-bottom"></div>
                            </div><!-- /intro-side -->
                        </div><!-- /intro -->
                        <!-- how-it-works -->
                        <?php include_once 'dashboard.php';?>

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php include_once 'footer.php';
        include_once 'login_both.php';
        include_once 'login_consumer.php';
        include_once 'login_provider.php';
        include_once 'signup.php';
        include_once 'forgot_password.php';
        ?>
    </body>
</html>