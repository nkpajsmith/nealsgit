<?php session_start();

if(!isset($_COOKIE['user_visit'])) { //user visit cookie
    setcookie("user_visit", "index");
}

require_once 'dao/login_logout_dao.php';

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
        <title>Techmatcher | Connecting computer users & tech firms.</title>
        <META NAME="Description" CONTENT="Techmatcher is an online service which connects computer users with qualified local technology service providers through in-depth profiles.">
        <?php require_once 'scripts.php';?>

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

                <?php require_once 'header.php';?>

                <!-- body -->
                <div id="bd" class="bd-home"><div id="bd-inner">

                        <!-- intro -->
                        <div class="intro clearfix">

                            <!-- intro-main -->
                            <div class="intro-main">
                                <h1>Techmatcher for Service Providers!</h1> 
                                <p><b>Techmatcher</b> enables you to find and better serve new customers.  Using in-depth profiles, we match your service offerings with users' specific needs.</p>
                                <p>Techmatcher's business tools help providers manage their firms with <b>rich business analysis</b> keying you to the needs of the market.  With new insight and efficiency your firm can grow by doing what you do well.</p>
                            </div><!-- /intro-main -->
                          
                            <!-- intro-side -->
                            <div class="intro-side">
                                <h2>Let&rsquo;s Get Started!</h2>
                                <!-- intro-side-content -->
                                <div class="intro-side-content">
                                    <div class="home-start-buttons">
                                    	<a href="code.php">Sign Up Now &raquo;</a>
                                    	<a href="provider_tour.php">Take the Tour &raquo;</a>
                                    </div>

                                    <!-- account-login -->
                                    <div class="account-login clearfix">

                                        <p>Already have an account?</p>
                                        <span class="action-btn"><a href="#" onclick="return open_login_provider_dialog();"><span>Login</span></a></span>

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
                        <?php require_once 'dashboard.php';?>

                    </div></div><!-- /body -->
            </div></div><!-- /container -->
        <?php require_once 'footer.php';
        require_once 'login_both.php';
        require_once 'login_consumer.php';
        require_once 'login_provider.php';
        require_once 'signup.php';
        require_once 'forgot_password.php';
        ?>
    </body>
</html>