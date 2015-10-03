<?php //session_start();

$consumer_email = $_SESSION['consumer']['itconsumer_emailaddress'];
$consumer_name  = $_SESSION['consumer']['itconsumername'];

include_once '../includes/class.phpmailer.php';
include_once '../includes/class.smtp.php';
include_once '../dao/email.php';

if(stristr(PHP_OS, 'WIN')) {
    include_once "c:/config/emailsettings.php"; //email settings file
}else{
    include_once "/var/www/tmconfig/test/emailsettings.php";
}

$emailDate = date('Y-m-d');
$to_name   = $_SESSION['to_name'];
$to_email  = $_SESSION['to_email'];
$to_password = $_SESSION['to_password'];

$headers  = "MIME-Version: 1.0;\n";
$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
$mail->AddCustomHeader($headers);

$mail->FromName	= "Sign Up - Techmatcher!"; // name of the username ...like Subscription etc
$mail->AddAddress($consumer_email,$consumer_name);// To address

$mail->Subject  = "Thankyou for Joining Techmatcher";
$body = "<div style='margin:0 auto;width:950px;'>
			<div style = 'height:190px;background-repeat:no-repeat;float:left;width:950px;'><img src='http://images.techmatcher.com/email-header.gif' alt='Techmatcher' width='950' height='200' /></div>
            <div style='float:left;width:950px;'>
                <div style='color:#333333;float:left;font-family:Arial,Helvetica,sans-serif;font-size:28px;font-style:bold;
                     line-height:66px;margin-top:50px;width:100%;padding:10px;'>
                    Thanks for joining Techmatcher!
                </div>
                
            </div>
            <div style='float:right;width:950px;'>
                <div style='color:#333333;float:left;font-family:Arial,Helvetica,sans-serif;font-size:13px;
                     line-height:28px;text-align:left;width:100%;padding:10px;'>

                    <p>Thanks for joining Techmatcher. We're happy to report that your account has been created!</p>
                    <p> You can login to access your personal profile using your email address:</p>
        $to_email <br/>
                    Your password is currently: $to_password
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
$mail->Body     = $body;
$mail->WordWrap = 50;

if(!$mail->Send()) {
    echo 'Email message was not sent.';
    echo 'Mailer error:'.$mail->ErrorInfo;
}?>