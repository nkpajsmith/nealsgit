<?php session_start();?>
<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />

<!-- user-notify-content -->
<div class="user-notify-content clearfix">
    <?php  if(isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="") {?>
    <p>Hey there, <a href="../consumer/profile.php"><?php echo (isset($_SESSION['consumer']['itconsumername']) && $_SESSION['consumer']['itconsumername']!="")?$_SESSION['consumer']['itconsumername']:redirect_too('../index.php');?></a></p>
    <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
        <?php }else { ?>
    <p>Hey there, <a href="../provider/provider_profile.php"><?php echo (isset($_SESSION['provider']['primaryname']) && $_SESSION['provider']['primaryname']!="")?$_SESSION['provider']['primaryname']:redirect_too('../index.php');?></a></p>
    <span class="action-log"><a href="javascript:void(0);" onclick="logout();"><span>Logout</span></a></span>
        <?php } ?>
</div><!-- /user-notify-content -->