<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>

  <title>Email Entry Form</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
 
  
  <meta name="Description" content="C- Clear Solutions Consulting: Education, Service, and Creativity">
 
  <meta name="Keywords" content="your,keywords,goes,here">
  <link rel="stylesheet" href="neal.css" type="text/css" media="screen,projection">
  <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5990775-1");
pageTracker._trackPageview();
</script>
</head>


<body>



<div id="container">
<div style="margin-left: 0px; display: inline; width: 969px; margin-top: 0px; height: 7px;" id="header"> <img alt="banner" src="images/FinalLogo1107.png" style="display: inline; width: 227px; height: 82px;" ><img style="margin-left: 425px; margin-bottom: 15px; width: 249px; height: 20px;" alt="IT Leadership that Creates Understanding" src="images/tagline.png"></div>



<div id="navigation">
</div>



<div id="gradient" style="height: 48px;">
</div>



<div id="content no gradient">
<h2 style="height: 56px;  margin-top: 20px">Request
for Email Package</h2>


<div class="splitcontentleftsmall" style="display: inline; height: 288px; width: 235px;">
<span style="font-weight: bold;"><br>



</span></div>



</div>



<form style="margin-top: 0px; height: 426px;" method="post" action="emailersubmit.php" name="Email Request Form"><br>



Enter your Name&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp; Email Address<br>



  <input tabindex="1" name="customername">&nbsp;
  <input tabindex="2" name="email_address"><br>



  <br>



Work Phone Number<br>



  <input tabindex="3" name="workphonenum"><br>



  <br>



  <br>



  <H2 style="color:rgb(70, 117, 213)">Select How We Should Follow Up</h2><br>



  Send me a <span style="font-weight: bold;">New Customer Package</span>
  <input name="subscriptions[]" type="checkbox" id="offerpackageIT" value="offerpackageIT" checked="CHECKED">
  <br>
  <label for="followup">
  <span style="font-weight: bold"> Contact me soon</span>to follow up.
    <input name="subscriptions[]" type="checkbox" id="followup" value="followup" checked="CHECKED">
  </label>
  <br>
  <label for="newsletter">
    Send <span style="font-weight: bold;">Quarterly Newsletter</span>
    <input name="subscriptions[]" id="newsletter" value="newsletter" type="checkbox">
  </label> <br>

  
  <div class="splitcontentleft">
<?php require_once('./lib/recaptchalib.php');
$publickey = "6Lcy5AMAAAAAAHYFAjCxtBPRi2-59IU7PxgNiNGO";
# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;
echo recaptcha_get_html($publickey, $error);
?> </div>
 
 <div class=splitcontentdiv style="border:none"> </div> 
 
 <div class=splitcontentleft style="margin-top:55px"> <input tabindex="7" name="Submit" value="submit" type="submit"> </div>
 
</form>


<div id="footer">
<p>&copy; 2008-2010 C&nbsp;Clear Solutions, LLC&nbsp;&nbsp;&nbsp;    <a href="privacypolicy.html">Privacy Policy</a></p>

</div>




</div>

</body>
</html>
