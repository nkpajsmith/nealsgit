<?php session_start();
include_once '../dao/dbcon.php';

$arr = array();
$errors = "";
$user_id = $_GET['value'];//id of the field selected///

?>
<?php  $query = pg_query_params("SELECT distinct orgdetailcategory_sdesc, orgdetailname, orgdetail_id,sectionheadertxt
              FROM techmatcher.itconsumer_profile_selections where profileselectionorder=1
              and subscribertype_id=$1order by orgdetail_id",array($user_id));

while($result = pg_fetch_array($query)) {
    array_push($arr, $result);
}        
if($arr[0][0] != NULL) {?>
<div class="fw-section-inner" style="width: 487px;">
    <h3><?php echo $arr[0][3];?></h3>
    <!-- radio-container -->    

    <div class="radio-container clearfix">
        <!-- choice-one-three -->
            <?php   foreach($arr as $key => $value) { ?>
        <div class="choice-one-three">
            <input name="choice1" type="radio" id="<?php echo $arr[$key][1];?>" onclick="get_analog_staffing('<?php echo $arr[0][2]; ?>','<?php echo $user_id; ?>');"/>
            <label for="<?php echo $arr[$key][1];?>"><?php echo $arr[$key][1]; ?></label>
        </div><!--/choice-one-three-->
                <?php } ?>
    </div><!--/radio-container-->
</div>
    <?php }else {
    echo "OK";
} ?>