<?php session_start();
include '../dao/dbcon.php';

$arr = array();
$errors = "";
$prompt_1 = $_GET['p1'];

    $query = pg_query_params("SELECT  distinct analog_staffing as staffstyle
            FROM techmatcher.subscribertypelookup, techmatcher.itconsumeranalog
            where subscribertypelookup.subscribertype_id=itconsumeranalog.subscribertype_id
            and subscibertypename=$1",array($prompt_1));
    while($result = pg_fetch_array($query)) {
        array_push($arr, $result);
    }
    if($arr[0][0] != NULL){?>
<div class="fw-section-inner">
    <h3>Which of the following best describes your current IT support resources?</h3>
    <!-- radio-container -->
    <div class="radio-container clearfix">
        <!-- choice-one-three -->
        <?php   foreach($arr as $key => $value) { ?>
        <div class="choice-one-three">
            <input name="choice2" type="radio" id="<?php echo $arr[$key][0];?>" onclick="return show_analogs1('<?php echo $arr[$key][0]; ?>','<?php echo $prompt_1; ?>');"/>
            <label for="<?php echo $arr[$key][0];?>"><?php echo $arr[$key][0]; ?></label>
        </div><!--/choice-one-three-->
        <?php } ?>
    </div><!--/radio-container-->
 </div>
<?php }else{
        echo "OK";
      } ?>