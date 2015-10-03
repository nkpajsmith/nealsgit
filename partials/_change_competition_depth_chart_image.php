<?php session_start();
 $image_name ="";
 $provider_id = $_SESSION['provider']['serviceprovider_id'];
 $image_name= "bar".$_SESSION['provider']['serviceprovider_id'].'_competition_depth.png';
 $source ="../provider/charts/tempimages/";
 $image_source_temp = $source.$image_name;
 $_time=time();
 rename($image_source_temp, $image_source_temp.$_time);
 $image_source=$image_source_temp.$_time;
?>

<div class="white_bottom_mid_part">
    <div id="image_div" style="text-align:center;width:100%;">
        <img id="competition_depth_chart_img" style="text-align: center" src="<?php echo $image_source;?>"/>
    </div>
</div>