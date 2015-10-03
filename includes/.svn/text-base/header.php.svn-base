<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />

<!-- head -->
<div id="hd"><div id="hd-inner" class="clearfix">

        <!-- logo -->
        <div class="logo">
            <a href="index.php">Techmatcher&trade;</a>
        </div><!-- /logo -->       
        <!-- nav -->
        <?php
        
         echo   '<div id="nav">';
                 
          if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'index.php') {
         echo   '<ul>';
         echo   '       <li><a href="#" onclick="open_login_consumer_dialog();"><span>User Login</span></a></li>';
         echo   '       <li><a href="index_sp.php"><span>For Service Providers</span></a></li>';
          echo   '      <li ><a href="about.php"><span>About Us</span></a></li>';
          echo   '          <!-- client login -->';
          echo   '</ul>';
          }     else
          if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,8) == 'index_sp')   {
         echo   '<ul>';  
         echo   '       <li><a href="index.php"><span>Need Tech Service?</span></a></li>';
         echo   '       <li><a href="#" onclick="return open_login_provider_dialog();"><span>User Login</span></a></li>';
          echo   '      <li ><a href="about.php"><span>About Us</span></a></li>';
          echo   '          <!-- client login -->';
          echo   '</ul>';
          }   else
          if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,8) == 'about.ph')   {
         echo   '<ul>';  
         echo   '       <li><a href="index.php"><span>Home</span></a></li>';
         echo   '       <li><a href="#" onclick="return open_login_provider_dialog();"><span>Service Provider Login</span></a></li>';
         echo    '      <li><a href="#" onclick="open_login_consumer_dialog();"><span>User Login</span></a></li>';
         echo   '          <!-- client login -->';
          echo   '</ul>';
          }   else   
          if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,8) == 'sp_about')   {
         echo   '<ul>';  
         echo   '       <li><a href="index_sp.php"><span>Home</span></a></li>';
         echo   '       <li><a href="#" onclick="return open_login_provider_dialog();"><span>Service Provider Login</span></a></li>';
          echo   '      <li ><a href="about.php"><span>Main About Page</span></a></li>';
          echo   '          <!-- client login -->';
          echo   '</ul>';
          }   else 
          if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,8) == 'user_abo')   {
         echo   '<ul>';  
         echo   '       <li><a href="index.php"><span>Home</span></a></li>';
         echo    '      <li><a href="#" onclick="open_login_consumer_dialog();"><span>User Login</span></a></li>';
          echo   '      <li ><a href="about.php"><span>Main About Page</span></a></li>';
          echo   '          <!-- client login -->';
          echo   '</ul>';
          }   else
          {
           echo   '<ul>';  
         echo   '       <li><a href="index.php"><span>Home</span></a></li>';
         echo   '       <li><a href="#" onclick="return open_login_provider_dialog();"><span>Service Provider Login</span></a></li>';
         echo    '      <li><a href="#" onclick="open_login_consumer_dialog();"><span>User Login</span></a></li>';
          echo   '      <li ><a href="about.php"><span>About</span></a></li>';
          echo   '          <!-- client login -->';
          echo   '</ul>';
          } 
          ?>
        </div><!-- /nav -->

    </div></div><!-- /head -->