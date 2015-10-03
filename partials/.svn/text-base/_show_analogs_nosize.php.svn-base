<?php session_start();
include '../dao/dbcon.php';

$arr = array();
$errors = "";
$prompt_1 = $_GET['p1'];
$prompt_2 = $_GET['p2'];
//$prompt_3 = $_GET['p3'];


    $query = pg_query_params("SELECT   analogtext FROM techmatcher.subscribertypelookup, techmatcher.itconsumeranalog
            where subscribertypelookup.subscribertype_id=itconsumeranalog.subscribertype_id
and subscibertypename=$1 and analog_staffing=$2" ,array($prompt_1,$prompt_2));
    while($result = pg_fetch_array($query)) {
        array_push($arr, $result);
    } ?>
<div class="fw-section-inner">
    <h3>Here&rsquo;s the picture we&rsquo;re getting&hellip;</h3>
    <h2><?php echo $prompt_1;?>/no size with <?php echo $prompt_2;?> IT support resources</h2>
        <?php   foreach($arr as $key => $value) {?>
    <p><?php echo $arr[$key][0]; ?></p>
            <?php }?>
</div>
    
<!-- call-out-choice -->
<div class="call-out-choice"><div class="call-out-choice-inner clearfix">

        <!-- choice-one-two -->
        <div class="choice-one-two">
            <input name ="choice2" type="radio" id="yep-thats-me" />
            <label for="yep-thats-me">Yep, that&rsquo;s me</label>
        </div><!--/choice-one-two-->

        <!-- choice-two-two -->
        <div class="choice-two-two">
            <input name ="choice2" type="radio" id="see-more-options" />
            <label for="see-more-options">See more options</label>
        </div><!--/choice-two-three-->

    </div></div><!--/call-out-choice-->

