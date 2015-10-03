<?php
/**************************AJAX CALLED THIS FILE ********************************/
$skill_level = $_REQUEST['currentvalue'];
$skill_id = $_REQUEST['currentskill'];
include_once '../dao/serviceskills.php';
?>
<input type="hidden" name="skill_level2" id="skill_level2" value="<?php echo $skill_level ?>">
<input type="hidden" id="skill_name2" name="skill_name2">
<?php
$skill_typez = getsubskilltypes($skill_level,$skill_id);
?>
<select style="width:250px;" name = "skill_types" id="skill_types" onchange="document.getElementById('skill_name2').value=this.value">
    <option value=""></option> <?php
    $index=1;
    $flag = 0;
    foreach($skill_typez as $name) {
        if($index==1) {
            if($name['serviceskillname']=="root") {
                $parentskill = $name['serviceskill_id'];
                $flag =1;
            }
            else {
                echo "<option value='{$name['serviceskill_id']}' >".$name['serviceskillname']."</option>";
                if($flag==0)
                    $parentskill = $name['serviceskill_id'];
                $index++;
            }

        }
        else if($name['parent_serviceskill_id']==0) {
            echo "<option value='{$name['serviceskill_id']}' >".$name['serviceskillname']."</option>";
        }
        else
            echo "<option value='{$name['serviceskill_id']}' >"."--".$name['serviceskillname']."</option>";
    }?>
</select>
   <?php //print "</select>";
    $minlevel = getminlevel($parentskill);
    if($minlevel) {
        ?>
    <input type=button name='more_skill_button' id='More' value='Show More Skills' onclick="return add_skill_value(1,document.getElementById('skill_name2').value)">
        <?php
        $skill_level++;
    }
    else if(!$minlevel) {?>
    <input type=button name='more_skill_button' id='More' value='Show More Skills' onclick="return add_skill_value(1,document.getElementById('skill_name2').value)">
    <input type=button name='less_skill_button' id='Less' value='Show Less Skills' onclick="return add_skill_value(0,<?php echo $parentskill ?>)">
   <?php }
    else { ?>
    <input type=button name='more_skill_button' id='More' value='Show More Skills' onclick="return add_skill_value(1,document.getElementById('skill_name2').value)">
    <input type=button name='less_skill_button' id='Less' value='Show Less Skills' onclick="return add_skill_value(0,document.getElementById('skill_name2').value)">
    <?php } ?>