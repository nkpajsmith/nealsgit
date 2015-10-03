<title>Dashboard</title>

<link rel="stylesheet" href="css/reset-fonts.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="css/base-min.css" type="text/css" media="screen, projection, print" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="js/cluetip/jquery.cluetip.css" type="text/css" media="screen, projection" />

<?php  include_once 'search.php';
       include_once 'login_logout_dao.php';
$search_name = getDashboardNames();
?>
<!-- dashboard -->
<div class="dashboard">
    <!-- dashboard-top --><div class="dashboard-top"></div>
    <!-- dashboard-content -->
    <div class="dashboard-content clearfix">
        <div class="dashboard-icon"></div>
        <h3>Dashboard</h3>
        <!-- completed-searches -->
        <div class="completed-searches clearfix">
            <div class="count-box">
                <h4 title="<?php echo get_bubble_text(102);?>"><?php echo $search_name[0];?></h4>
                <?php $noOfSearches = getAllSearhes();
                $searches_with_commas = preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $noOfSearches);?>
                <span><?php echo $searches_with_commas ?></span></div>
        </div><!-- /completed-searches -->

        <!-- number-of-providers -->
        <div class="number-of-providers clearfix">
            <div class="count-box">
                <h4><?php echo $search_name[1];?></h4>
                <?php $noOfProviders = getAllProviders();
                $providers_with_commas = preg_replace('/(?<=\d)(?=(\d\d\d)+$)/', ',', $noOfProviders);?>
                <span><?php echo $providers_with_commas ?></span></div>
        </div><!-- /number-of-providers -->

    </div><!-- /dashboard-content -->

    <!-- dashboard-bottom --><div class="dashboard-bottom"></div>
</div><!-- /dashboard -->