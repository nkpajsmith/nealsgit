<div class="modal-wrap">    
    <div id="modal_free_search" class="modalwindow">
    	<div class="modalwindow-bkg">
            
            <img style = "float:right; height:115px; width:112px " src="../images/about-howdy.png" alt="howdy"/>
            <div class=h1>Free Search!
            </div>
               
                <div class=p1><p style="font-size:125%">See what a Techmatcher match can do for you.</p> </div>
                <p> The free search will do an <b>actual match</b> based on the information you supply.  A free search will give you a count of Service Providers that match your selection. </p>
                <p><b>Learn more about searches for Subscribers...</b><b><a style="text-decoration:underline; color: #2c7524;" onclick="showhideadvancedsearch('hidensubsxt')">more</a></b></p>
                <div id='hidensubsxt' style='visibility:hidden; display:none;'>
                <p><i>If you subscribe you can use the power of your profile and the more capable searches to access find, contact and see profile details for service providers. Subscribers have the opportunity to use their profile or create complex queries with multiple criteria to focus the search right where it can be most useful.</i></p>   
                </div>
                <p>Techmatcher provides three different types of match information:</p>
                <ul>
                    <li> <b>Geography</b> simply finds providers based on a zipcode or county.  <b><a style="text-decoration:underline; color: #2c7524;" onclick="showhideadvancedsearch('hidengeotxt')">more</a></b> 
                     <div id='hidengeotxt'  style='visibility:hidden; display:none;'>
                    <i><p>This is the simpliest match and used as the base for the Free Seach.  Matching on geography is useful if you want the broadest representation of service providers. 
                    </p>
                    </i></div></li>
                    <li> <b>Services</b> describe a specifc offering by a Service Provider. <b><a style="text-decoration:underline;color: #2c7524;" onclick="showhideadvancedsearch('hidenservtxt')">more</a></b>
                    <div id='hidenservtxt' style='visibility:hidden; display:none;'>
                    <i><p>In the free search, you will see the count of services available in the geographic area you select.
                    </p>
                    </i></div></li>
                    <li><b>Skills</b> describe specific capability. <b><a style="text-decoration:underline;color: #2c7524;" onclick="showhideadvancedsearch('hidenskltxt')">more</a></b>
                    <div id='hidenskltxt' style='visibility:hidden; display:none;'>
                    <i><p>Skills are individual capabilities carried by the staff of a service provider (i.e. knowing how to progam in a specific language or fix a specific type of equipment). In the free search, you will see the count of skills available in the geographic area you select.
                    </p>
                    </i></div></li>
                  </ul>
                <div class="borderbottom">   </div>   
                
              <div class=w100><h2 style='color: #d9810e;'> Select the type of match you would like:</h2></div>
 
            <!-- modal form -->
            <div class="modal-form-free-search">
                <form id="consumer_free_searching" name="consumer_free_searching" method="post" onsubmit="return free_search($(this));">

                        <!-- holder 1 -->
                           <div class="w100" style='margin-bottom:20px;'>
                                <span ><b>Geographic Search </b></span>
                            </div>
                               <div class="row">
                                    <span style='margin-top:15px; margin-left:5px;'> <input  type=radio checked name="my_county" id="zipp_code" value="ZipCode"> </span>
                                    <span style='margin-left:5px; margin-top:15px;'>  Zip Code: <input style='margin-left:51px' size='9;' type=textbox name="text_value_zip" id="text_value_zip"> </span>
                               </div>
                               <div class="row">
                                    <span style= 'margin-left:5px;'> <input type=radio name="my_county" id="my_countyy" value="County"> </span>
                                    <span style='margin-left:5px;'> County & State: <input  style='margin-left:15px;' size='40;' type=textbox name="county_value" id="county_value">  <input  style='float:right;' size='2;' type=textbox name="state_value" id="state_value"> </span>
                            </div>
                            </div>
                            <!-- holder1 end --->
   			       
                    <div  style="text-align:left;">
                        <input id="input_style" type="submit" id="submit" value="SEARCH" class="btn">
                    </div>
                    <div id="div_register_errors_fsearch" style="margin-top:10px; color: red;"></div>
                </form>
            </div>
        </div>
        <div class="modalwindow-btm"></div>
</div>