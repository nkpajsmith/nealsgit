<?php session_start();
    $image_name ="";
    $provider_id = $_SESSION['provider']['serviceprovider_id'];
    $image_name = "provider_".$_SESSION['provider']['serviceprovider_id']."_glob_statistics_default.png";
    $source ="../provider/charts/tempimages/";
    $image_source_temp = $source.$image_name;
    $_time=time();
    rename($image_source_temp, $image_source_temp.$_time);
    $image_source=$image_source_temp.$_time;
?>
<div class="white_bottom_mid_part">
    <div id="image_div" >
        <img id="line_chart_img" src="<?php echo $image_source;?>"/>
    </div>
</div>
