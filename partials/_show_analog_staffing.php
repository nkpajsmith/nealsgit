<?php session_start();
include_once '../dao/dbcon.php';

$arr = array();
$errors = "";
$prompt_1 = $_GET['p1'];
$prompt_2 = $_GET['p2'];

if(isset($prompt_2) && !empty($prompt_2)) {
    $query = pg_query_params("SELECT  distinct orgdetailcategory_sdesc, orgdetailname, orgdetail_id,sectionheadertxt
                FROM techmatcher.itconsumer_profile_selections where profileselectionorder=2 and subscribertype_id=$1",array($prompt_1));
    while($result = pg_fetch_array($query)) {
        array_push($arr, $result);
    } ?>
<div class="fw-section-inner" style="width: 487px;">
    <h3><?php echo $arr[0][3];?></h3>
    <!-- radio-container -->
    <div class="radio-container clearfix">
        <!-- choice-one-three -->
            <?php   foreach($arr as $key => $value) { ?>
        <div class="choice-one-three">
            <input name="choice2" type="radio" id="<?php echo $arr[$key][1];?>" onclick="show_analogs('<?php echo $arr[$key][2]; ?>','<?php echo $prompt_2; ?>','<?php echo $prompt_1; ?>');"/>
            <label for="<?php echo $arr[$key][1];?>"><?php echo $arr[$key][1]; ?></label>
        </div><!--/choice-one-three-->
                <?php } ?>
    </div><!--/radio-container-->
</div>
    <?php }else {
    echo "OK";
} ?>
