<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />
 <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/modals.js"></script>
<script type="text/javascript" src="js/cluetip/jquery.cluetip.js"></script>
<script type="text/javascript" src="js/tooltips.js"></script>
<?php include_once "login_logout_dao.php" ?>
<!-- head -->
<div id="hd"><div id="hd-inner" class="clearfix">

        <!-- logo -->
        <div class="logo">
        <?php
        
		if ($_SESSION['provider']['serviceprovider_id']=='') {
   				echo  '<a href="index.php">Techmatcher&trade;</a>'; 
            }else{
                echo   '<a href="javascript: void(0);" onclick="to_index();">Techmatcher&trade;</a>';
            }
          ?>  
        </div><!-- /logo -->

        <!-- nav -->
        <div id="nav">
            <ul >
                <li><a href="javascript: void(0);" class="selected1" onclick="return open_login_provider_dialog()"> <span class="selected">Service Provider</span></a></li>
                <li><a><span> &nbsp;</span></a></li>
                 <li><a><span> &nbsp;</span></a></li>
                  <li><a><span> &nbsp;</span></a></li>
                  <li><a class="tooltip" title="<?php echo get_bubble_text(108);?>"><span> &nbsp;  </span></a></li>
				  <li><a href=sp_about.php><span>About Us</span></a></li>
            </ul>
        </div><!-- /nav -->

    </div></div><!-- /head -->