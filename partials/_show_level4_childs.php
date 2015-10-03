<?php  session_start();
include_once '../dao/serviceskills.php';

$parent_skill_id = $_GET['skillid'];
$_SESSION['parent_id']=$_GET['skillid'];?>

<?php
$names =array();
$list_record = get_childs($parent_skill_id);
if($list_record > 0) {?>
<div class="scroll-pane skill-selector">    
        <?php
        $list_count = count($list_record);
        $i=0;
        while($list_count > $i) {?>
    <a id="level4_<?php echo $i; ?>" name="level4" href="javascript:void(0);" onclick="select_level4_value(this,<?php echo $list_record[$i]['serviceskill_id']; ?>);"><?php echo $list_record[$i]['serviceskillname']; ?></a>
            <?php $i++;
        }
        ?>
</div>
    <?php } ?>
