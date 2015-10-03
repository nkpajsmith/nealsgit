<?php 
include_once 'serviceskills.php'; include_once 'search.php';
?>
<div class="modal-wrap">    
    <div id="modal_advance_search" class="modalwindow"><div class="modalwindow-bkg">
            <h2>Run a Search Based on Your Profile<br />
                Select the type of search you would like:</h2>
            <!-- modal form -->
            <div class="modal-form-advance-search">
                <form id="consumer_searching" name="consumer_searching" method="post" onsubmit="return advance_search($(this));">
                    <!--<div> -->
                    <div>
                        <!-- holder 1 -->
                        <span class="holder1"> <b>Selection</b>
                            <div class="w100">
                                <span> <input type=checkbox name="reportselected[]" value=1 id=services onclick="show_services_dropdown(this)"/> </span>
                                <span> &nbsp; Services </span>
                            </div>

                            <div class="w100" style="margin-left: 10px;">
                                <div id="service_categories" style="display:none">
                                    <span>
                                        <select style="width:250px;" id="services_category_typ" name="services_category_typ" onclick="show_specific_services(this)">
                                            <option>
                                                Services For My Profile
                                            </option>
                                            <option>
                                                Search For A Specific Service
                                            </option>
                                        </select>
                                    </span>
                                </div>

                                <div id ="service_subcategories" style="display:none">
                                    <span>
                                        <select style="width:250px;" id="specific_services" name="specific_services" >
                                            <?php $service_categories = getAllServiceCategories();
                                            foreach($service_categories as $s_categories) {
                                                echo "<option value='{$s_categories['servicecategory_id']}'>".$s_categories['servicecategoryname']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="w100">
                                <span> <input type=checkbox name="reportselected[]" value=2 id=skill_set onclick="show_skillbox(this)"> </span>
                                <span> &nbsp; Skill Set </span>
                            </div>

                            <div class="w100" style="margin-left: 10px;">
                                <div id="skills_sett" style="display:none">
                                    <span>
                                        <select style="width:250px;" name="skill_type" id="skill_type" onchange="show_skill_additional_box(this)">
                                            <option>
                                                Skills For My Profile
                                            </option>
                                            <option>
                                                Search For A Specific Skill
                                            </option>
                                        </select>
                                    </span>
                                </div>

                                <div id="show_more_skills2" style="display:none">
                                    <input type="text" id="more_skills" name="more_skills" value="" maxlength="21"/>
                                </div>
                                
                            </div>

                            <div class="w100">
                                <span> <input type=checkbox name="reportselected[]" value=3 id=geographic_search onclick="show_textbox1(this)"> </span>
                                <span> &nbsp; Geographic Search </span>
                            </div>
                            <div class="w100" style="margin-left: 10px;">
                                <div id="geographic_details" style="display:none">
                                    <select name="geographic_type" id="geographic_type" onchange="show_newbox(this)">
                                        <option> MyCounty </option>
                                        <option> MyZipcode </option>
                                        <option> OtherValue </option>
                                    </select>
                                </div>

                                <div id ="show_county_zipcode" style="display:none;">
                                    <span> <input type=radio name="my_county" id="zipp_code" value="ZipCode"> </span>
                                    <span> &nbsp; Zip Code </span>

                                    <span> <input type=radio name="my_county" id="my_countyy" value="County"> </span>
                                    <span> &nbsp; County </span>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <span> <input type=textbox name="text_value" id="text_value"> </span>
                                    <span> <input type=textbox name="text_value_state" id="text_value_state"> </span>
                                </div>
                            </div>
                            <div class="borderbottom">
                                
                            </div>
                            <!-- search providers -->
                            <div class="w100">
                                <span> <input type=checkbox name="provider_rating" value=1 id=provider_rating> </span>
                                <span> &nbsp; Search Providers who have been rated </span>
                            </div>


                        </span>
                        <!-- holder1 end --->

                        <!-- exclude -->

                        <span class="holder2"> <b>Exclude</b>
                            <span class="w100" > <input id="skill_inc_exc" type="checkbox" name="incexc[]" value="1" onclick ='var status= (checked != true) ? "include" : "exclude"; alert ("The results will " + status + " Providers selected services.");'/> </span>
                            <span class="w100" style="margin-top:3px;"> <input id="skill_inc_exc" type="checkbox" name="incexc[]" value="2" onclick ='var status= (checked != true) ? "include" : "exclude"; alert ("The results will " + status + " Providers selected skills.");'/></span>
                            <span class="w100" style="margin-top:3px;"> <input id="skill_inc_exc" type="checkbox" name="incexc[]" value="3" onclick ='var status= (checked != true) ? "include" : "exclude"; alert ("The results will " + status + " Providers in the selected geographic area.");'/></span>
                            <span class="w100" style="margin-top:19px;"> <input id="skill_inc_exc" type="checkbox" name="incexc[]" value="4" onclick ='var status= (checked != true) ? "include" : "exclude"; alert ("The results will " + status + " Providers with Ratings .");'/></span>
                        </span>
                        <!-- end exclude -->
                    </div>
                   
                    <div  style="text-align:left;">
                        <input id="input_style" type="submit" id="submit" value="SEARCH" class="btn">
                    </div>

                    <div id="div_register_errors_as" style="margin-top:10px; color: red;"></div>
                </form>
            </div>
        </div><div class="modalwindow-btm"></div></div></div>