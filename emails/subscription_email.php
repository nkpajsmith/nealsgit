<?php //session_start();

$consumer_email = $_SESSION['consumer']['itconsumer_emailaddress'];
$consumer_name  = $_SESSION['consumer']['itconsumername'];
$total = $_POST["chargetotal"];

require_once "../includes/class.phpmailer.php";
require_once "../includes/class.smtp.php";
include_once "../dao/email.php";

if(stristr(PHP_OS, 'WIN')) {
    include_once "c:/config/emailsettings.php"; //windows
}else{
    include_once "/var/www/tmconfig/test/emailsettings.php"; // linux
}

$eventDate=getStartEndDate($_SESSION['consumer']['itconsumer_id']);

$headers  = "MIME-Version: 1.0;\n";
$headers .= "Content-type: text/html; charset=iso-8859-1;\n";
$mail->AddCustomHeader($headers);

$mail->FromName	= "Subscription"; // name of the username ...like Subscription etc
$mail->AddAddress($_SESSION['consumer']['itconsumer_emailaddress'], $_SESSION['consumer']['itconsumername']);// To address
$mail->Subject  = "Your Subscription Receipt";
$body = "<div style='margin:0 auto;width:950px;'>
	<div style = 'height:190px;background-repeat:no-repeat;float:left;width:950px;'><img src='http://images.techmatcher.com/email-header.gif' alt='Techmatcher' width='950' height='200' /></div>
        <div style='float:left;width:950px;margin-bottom:72px;'>
<div style='float:right; width:900px; padding: 10px;'>
	</div>
	
	<div style='float:left;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#969292;marker-top:25px;width:100%;'>
	<p style='color: #000000;font-size: 30px;'><span><span style='font-size: 36px;'>Welcome to Techmatcher!</span><br />
	      <span style ='font-size: 18px;'>We're glad to have you.</span></span></p>
	  	</div>
	<div style='float:left;margin-top:51px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:15px;color:#333;margin-bottom:41px;'>
        <table width='900' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tr>
        <td width='370' height='28' bgcolor='#54934d'>
        <div style='float:left;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#fff;text-align:center;line-height:28px;width:100%;'>DESCRIPTION</div></td>
        <td width='2' bgcolor='#e0e0e0'></td>
        <td width='112' bgcolor='#54934d'>
        <div style='float:left;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#fff;text-align:center;line-height:28px;width:100%;'>START DATE</div></td>
        <td width='2' bgcolor='#e0e0e0'></td>
        <td width='107' bgcolor='#54934d'><div style='float:left;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#fff;text-align:center;line-height:28px;width:100%;'>RENEWAL DATE</div></td>
        <td width='2' bgcolor='#e0e0e0'></td>
        <td width='109' colspan='2' bgcolor='#54934d'><div style='float:left;font-family:Arial, Helvetica, sans-serif;font-weight:bold;font-size:12px;color:#fff;text-align:center;line-height:28px;width:100%;'>COST</div></td>
        </tr>
        <tr>
        <td height='2' colspan='8' bgcolor='#E0E0E0'></td>
        </tr>
        <tr>
        <td height='31'><span>Subscription Description</span></td>
        <td height='31' bgcolor='#929292'></td>
        <td height='31' align='center'><span>$eventDate[0]</span></td>
        <td height='31' bgcolor='#929292'></td>
        <td height='31' align='center'><span>$eventDate[1]</span></td>
        <td height='31' bgcolor='#929292'></td>
        <td height='31'>&nbsp;$</td>
        <td align='right'>$total &nbsp;</td>
        </tr>
        <tr>
        <td height='7' colspan='8' bgcolor='#929292'></td>
        </tr>
        <tr>
        <td height='28' bgcolor='#92c6e3'>&nbsp;</td>
        <td height='28' bgcolor='#92c6e3'></td>
        <td height='28' bgcolor='#92c6e3'>TOTAL</td>
    <td height='28' bgcolor='#92c6e3'></td>
    <td height='28' bgcolor='#92c6e3'>&nbsp;</td>
    <td height='28' bgcolor='#92c6e3'></td>
    <td height='28' bgcolor='#92c6e3'>&nbsp;$</td>
    <td height='28' align='right' bgcolor='#92c6e3'>$total &nbsp;</td>
  </tr>
</table>
</div>
<div style='float:left;font-family:Arial, Helvetica, sans-serif;font-size:15px;color:#333;text-align:left;line-height:28px;width:100%;'>
<p style='font-size: 18px;'>On behalf of the Techmatcher team, I want to say thank you for your subscription. As a reminder, your subscription gives you the ability to run as many searches as you'd like and get full details of service providers in your area. Take advantage, too, of our built-in reports to get deeper insights on specific service providers and how they may meet your needs.</p>
<p style='font-size: 18px;'>We are constantly working to make the service better and more valuable but we'd love to hear from you. Drop us feedback anytime simply the clicking the Feedback link in the Tools sidebar or by emailing us at ideabox@techmatcher.com</p>
	<br />
	<p align='center' style='font-size: 18px; font-weight: bold;'>Now, let's get matching!</p>
		<div align='center'><span style='font-size: 16px;color: #669cba;'>Neal Smith</span><br />
CEO | Co-Founder</div>
	</div>
		</div>
<div style='float:left;width:950px;'>	<p><img src='http://images.techmatcher.com/email-footer.gif' width='950' height='200' /></p>
	</div>
        ";
$mail->Body     = $body;
$mail->WordWrap = 50;

if(!$mail->Send()) {
    echo '<li><h3>Rats, There was an email error. Message was not sent.</h3></li>';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo '<li><h3>Whoosh! Email receipt message has been sent. <br></h3></li>';
}?>