<?php session_start();
include_once '../dao/serviceskills.php';
include_once '../dao/staff.php';

$id= get_staffid_from_staffname($_GET['name']);
$_SESSION['staff_id']=$id['spstaff_id'];
?>
<div id="skill_options">
    <h2>Select skills for <?php echo $_GET['name']; ?></h2>   
    <!-- select-skills-columns -->
    <div class="select-skills-columns">
        <table>
            <tr>
                <td>
                    <!-- skill-column -->
                    <div class="skill-column">
                        <div class="scroll-pane skill-selector">
                            <?php
                            $ids=array();
                            $top_level=get_level1_skills();
                            $namecount=count($top_level);
                            $flagzz=0;
                            while($namecount>$flagzz) {
                                $notallow=0;
                                foreach($ids as $nids) {
                                    if($nids==$top_level[$flagzz]['serviceskill_id']) {
                                        $notallow=1;
                                    }
                                }
                                if($notallow==0) {?>
                            <a id="level1_<?php echo $flagzz; ?>" name="level1" href="javascript:void(0);" onclick="select_level1_value(this,<?php echo $top_level[$flagzz]['serviceskill_id']; ?>);"><?php echo $top_level[$flagzz]['serviceskillname']; ?></a>
                            <?php }
                                $flagzz++;                                
                            }?>                                                                               
                        </div>
                    </div><!-- skill-column -->
                </td>
                <!-- level 2 -->
                <td>
                    <!-- skill-column -->
                    <div id ="skills_level2" class="skill-column">
                        
                    </div><!-- skill-column -->
                </td>
                <!-- level 3 -->
                <td>
                    <!-- skill-column -->
                    <div id ="skills_level3" class="skill-column">
                        
                    </div><!-- skill-column -->
                </td>

                <!-- level 4 -->
                <td>
                    <!-- skill-column -->
                    <div id ="skills_level4" class="skill-column">
                        
                    </div><!-- skill-column -->
                </td>                
            </tr></table>

    </div><!-- select-skills-columns -->

    <!-- add-skill-container -->
    <div class="add-skill-container"><div class="add-skill-container-inner clearfix">
            <fieldset>
                <form id="form_experience" method="POST" onsubmit="return add_staff_skills($(this));">
                <label for="yearsExperience">Enter years of experience</label>
                <input type="text" class="txt" id="yearsExperience" name="yearsExperience" value="" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
                <input type="submit" class="btn" value="ADD THIS SKILL"/>
                </form>
            </fieldset>
        </div></div><!-- add-skill-container -->
</div>