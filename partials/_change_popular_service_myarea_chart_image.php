<?php session_start();
    $image_name ="";
    $counter1="";
    $provider_id = $_SESSION['provider']['serviceprovider_id'];
    if(isset($_SESSION['pop_service_counter'])){
        $counter1 = $_SESSION['pop_service_counter'];
        $image_name = "img_".$provider_id."_".$counter1.".png";
    }else{
        $counter1 = 0;
    }

    $source ="../provider/charts/tempimages/";
    $image_source = $source.$image_name;
?>

<div class="white_bottom_mid_part">
    <div id="image_div" style="text-align:center;width:100%;">
        <img id="pop_service_myarea_chart_img" style="text-align: center" src="<?php echo $image_source;?>"/>
    </div>
</div>