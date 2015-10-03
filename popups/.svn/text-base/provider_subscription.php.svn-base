<!-- modal window -->
<div class="modal-wrap">

    <div id="subscription_modal" class="modalwindow">
            <div class="modalwindow-bkg" id="abc">
                <script>
                    function change_value(elm){
                        var nval=elm.substring(1,elm.length);
                        document.getElementById('amount').value=nval;
                    }
                </script>
                <script src="../js/default.js" type="text/javascript"></script>
                <!-- modal form -->
                <?php
               require_once "search.php";
               require_once "subscription.php";
               require_once "provider.php";

               $billingAddress = get_provider_billing_address($_SESSION['provider']['serviceprovider_id']);
                 if(isset($billingAddress) && $billingAddress!='' && $billingAddress[0]["phonenumber"]!='') {
                        $phone = $billingAddress[0]["phonenumber"];
                        $phone_ini=substr($phone,0,3);
                        $phone_mid = substr($phone,3,3);
                        $phone_last = substr($phone,6,4);
                    }else{
				   $serviceaddress = getproviderHomeAddress($_SESSION['provider']['serviceprovider_id']);
                  if($serviceaddress!=''&& $serviceaddress[0]["phonenumber"]!='') {
                        $phone = $serviceaddress[0]["phonenumber"];
                        $phone_ini=substr($phone,0,3);
                        $phone_mid = substr($phone,3,3);
                        $phone_last = substr($phone,6,4);
                    }
                }
            ?>

                <div class="modal-form">
                    <img id="load" src="../images/loader.gif" border="0" style="left:262px;position:absolute;top:322px;z-index:1001; display: none;"/>
                    <div id="main" style="background-color:gray;height:984px;margin-left:-60px;margin-top:-10px;opacity:0.6;position:absolute;width:602px;z-index:1000; display: none;"> </div>
                    <div class="trust_lft"><img src="../images/trust.gif"/></div>
                    <form name="frm_Subscription" method="post" onsubmit="return verify_transaction($(this));">
                        <br><br>
                        <table id="package">
                            <tr>
                                <td align="right">Package Type <?php $providerId = $_SESSION['provider']['serviceprovider_id'];?></td>
                                <td>
                                    <select name = "address_types" onchange="change_value(this.value);">
                                        <option value="-1">--Select Package Type--</option>
                                        <?php
                                        $addressez = getsubscriptionforprovider($_SESSION['provider']['serviceprovider_id']);
                                        foreach($addressez as $name) {
                                            echo "<option value='{$name['subcriptionrate']}' >".$name['subscriptiondesc']."  </option>";
                                        }
                                        ?>
                                    </select></td>                                
                            </tr>
                            <tr>
                                <td align="right">Amount</td>
                                <td><input type=text name="chargetotal" id="amount" readonly></td>
                            </tr>
                            <tr>
                                <td align="right"> Card Type</td>
                                <td align="left"><select name="cctype" id="cctype">
                                        <option value="americanexpress">American Express</option>
                                        <option value="mastercard">Master Card</option>
                                        <option value="visa" selected="selected">Visa</option>
                                    </select>                            </td>
                            </tr>
                            <tr>
                                <td align="right">Card Number <span style="color:#FF0000"> *</span></td>
                                <td><input id="cardnumber" type=text name="cardnumber"></td>
                            </tr>
                            <tr>
                                <td align="right">CCV <span style="color:#FF0000"> *</span></td>
                                <td><input id="cvmvalue" type=text name="cvmvalue" maxlength="4"></td>
                            </tr>
                            <tr>
                                <td align="right">Card Expiry Month <span style="color:#FF0000"> *</span></td>
                                <td><select id="cardexpmonth" name="cardexpmonth">
                                        <option></option>
                                        <option value = "01">01</option>
                                        <option value = "02">02</option>
                                        <option value = "03">03</option>
                                        <option value = "04">04</option>
                                        <option value = "05">05</option>
                                        <option value = "06">06</option>
                                        <option value = "07">07</option>
                                        <option value = "08">08</option>
                                        <option value = "09">09</option>
                                        <option value = "10">10</option>
                                        <option value = "11">11</option>
                                        <option value = "12">12</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td align="right">Card Expiry Year <span style="color:#FF0000"> *</span></td>
                                <td align="left">
                                    <select id="cardexpyear" name="cardexpyear">
                                        <option></option>
                                        <?PHP 
                                           $year=2009;
                                           for($i=date("y"); $i<=date("y")+10; $i++)
                                            if($year == $i)
                                                echo "<option value='$i' selected>$i</option>";
                                            else
                                                echo "<option value='$i'>$i</option>";
                                        ?>
                                    </select></td>
                            </tr>

							<?php if($serviceaddress!=''){?>
							<input id="hidden_check" name="hidden_check" type="hidden" value="1"/>
							<tr>
							<td align="right"><input id="bill_cb" name ="bill_cb" type="checkbox" onclick="show_billing_panel(this);" /> Enter a separate billing address </td>
							</tr>
							<?php }else{?>
							<input id="hidden_check" name="hidden_check" type="hidden" value="0"/>
                            <?php }?>             
                            
                            <tr> <th colspan=2>Billing Info.</th></tr>
                            <tr>
                                <td align="right">Address1 <span style="color:#FF0000"> *</span></td>
                                <td><input id ="address" name="address1"
                                    <?php
                                    if($serviceaddress!='' && $serviceaddress[0]["addressline1"]!='') {
                                        $addressline1=$serviceaddress[0]["addressline1"];
                                    ?> value="<?php echo $addressline1 ?>"
                                    <?php }else if($billingAddress!='' && $billingAddress[0]["addressline1"]!=''){
                                       $addressline1=$billingAddress[0]["addressline1"];
                                    ?> value="<?php echo $addressline1 ?>"
                                    <?php }else { ?> value="" <?php }?>></td>
                            </tr>
                            <tr>
                                <td align="right">Address2</td>
                                <td><input id ="address2" name="address2"
                                    <?php
                                    if($serviceaddress!='' && $serviceaddress[0]["addressline2"]!='') {
                                        $addressline2=$serviceaddress[0]["addressline2"];
                                    ?>value="<?php echo $addressline2 ?>"
                                    <?php }else if($billingAddress!='' && $billingAddress[0]["addressline2"]!=''){
                                       $addressline2=$billingAddress[0]["addressline2"];
                                    ?> value="<?php echo $addressline1 ?>"
                                    <?php }else { ?> value="" <?php }?>
                                    ></td>
                            </tr>
                            <tr>
                                <td align="right">City <span style="color:#FF0000"> *</span></td>
                                <td><input id="city" name="city"
                                    <?php
                                    if($serviceaddress!='' && $serviceaddress[0]["city"]!='') {
                                        $city=$serviceaddress[0]["city"];
                                    ?> value="<?php echo $city ?>"
                                    <?php }else if($billingAddress!='' && $billingAddress[0]["city"]!=''){
                                       $city=$billingAddress[0]["city"];
                                    ?> value="<?php echo $city ?>"
                                    <?php }else { ?> value="" <?php }?>></td>
                            </tr>
                            <tr>
                                <td align="right">State</td>
                                <td>
                                    <select id="state" name="state" size="1">
                                        <option></option>
                                        <option value="AK" <?php if($serviceaddress[0]["state"] == 'AK'){echo 'selected';}else if($billingAddress[0]["state"] == 'AK'){echo 'selected';} ?>>AK</option>
                                        <option value="AL" <?php if($serviceaddress[0]["state"] == 'AL'){echo 'selected';}else if($billingAddress[0]["state"] == 'AL'){echo 'selected';} ?>>AL</option>
                                        <option value="AR" <?php if($serviceaddress[0]["state"] == 'AR'){echo 'selected';}else if($billingAddress[0]["state"] == 'AR'){echo 'selected';} ?>>AR</option>
                                        <option value="AZ" <?php if($serviceaddress[0]["state"] == 'AZ'){echo 'selected';}else if($billingAddress[0]["state"] == 'AZ'){echo 'selected';} ?>>AZ</option>
                                        <option value="CA" <?php if($serviceaddress[0]["state"] == 'CA'){echo 'selected';}else if($billingAddress[0]["state"] == 'CA'){echo 'selected';} ?>>CA</option>
                                        <option value="CO" <?php if($serviceaddress[0]["state"] == 'CO'){echo 'selected';}else if($billingAddress[0]["state"] == 'CO'){echo 'selected';} ?>>CO</option>
                                        <option value="CT" <?php if($serviceaddress[0]["state"] == 'CT'){echo 'selected';}else if($billingAddress[0]["state"] == 'CT'){echo 'selected';} ?>>CT</option>
                                        <option value="DC" <?php if($serviceaddress[0]["state"] == 'DC'){echo 'selected';}else if($billingAddress[0]["state"] == 'DC'){echo 'selected';} ?>>DC</option>
                                        <option value="DE" <?php if($serviceaddress[0]["state"] == 'DE'){echo 'selected';}else if($billingAddress[0]["state"] == 'DE'){echo 'selected';} ?>>DE</option>
                                        <option value="FL" <?php if($serviceaddress[0]["state"] == 'FL'){echo 'selected';}else if($billingAddress[0]["state"] == 'FL'){echo 'selected';} ?>>FL</option>
                                        <option value="GA" <?php if($serviceaddress[0]["state"] == 'GA'){echo 'selected';}else if($billingAddress[0]["state"] == 'GA'){echo 'selected';} ?>>GA</option>
                                        <option value="HI" <?php if($serviceaddress[0]["state"] == 'HI'){echo 'selected';}else if($billingAddress[0]["state"] == 'HI'){echo 'selected';} ?>>HI</option>
                                        <option value="IA" <?php if($serviceaddress[0]["state"] == 'IA'){echo 'selected';}else if($billingAddress[0]["state"] == 'IA'){echo 'selected';} ?>>IA</option>
                                        <option value="ID" <?php if($serviceaddress[0]["state"] == 'ID'){echo 'selected';}else if($billingAddress[0]["state"] == 'ID'){echo 'selected';} ?>>ID</option>
                                        <option value="IL" <?php if($serviceaddress[0]["state"] == 'IL'){echo 'selected';}else if($billingAddress[0]["state"] == 'IL'){echo 'selected';} ?>>IL</option>
                                        <option value="IN" <?php if($serviceaddress[0]["state"] == 'IN'){echo 'selected';}else if($billingAddress[0]["state"] == 'IN'){echo 'selected';} ?>>IN</option>
                                        <option value="KS" <?php if($serviceaddress[0]["state"] == 'KS'){echo 'selected';}else if($billingAddress[0]["state"] == 'KS'){echo 'selected';} ?>>KS</option>
                                        <option value="KY" <?php if($serviceaddress[0]["state"] == 'KY'){echo 'selected';}else if($billingAddress[0]["state"] == 'KY'){echo 'selected';} ?>>KY</option>
                                        <option value="LA" <?php if($serviceaddress[0]["state"] == 'LA'){echo 'selected';}else if($billingAddress[0]["state"] == 'LA'){echo 'selected';} ?>>LA</option>
                                        <option value="MA" <?php if($serviceaddress[0]["state"] == 'MA'){echo 'selected';}else if($billingAddress[0]["state"] == 'MA'){echo 'selected';} ?>>MA</option>
                                        <option value="MD" <?php if($serviceaddress[0]["state"] == 'MD'){echo 'selected';}else if($billingAddress[0]["state"] == 'MD'){echo 'selected';} ?>>MD</option>
                                        <option value="ME" <?php if($serviceaddress[0]["state"] == 'ME'){echo 'selected';}else if($billingAddress[0]["state"] == 'ME'){echo 'selected';} ?>>ME</option>
                                        <option value="MI" <?php if($serviceaddress[0]["state"] == 'MI'){echo 'selected';}else if($billingAddress[0]["state"] == 'MI'){echo 'selected';} ?>>MI</option>
                                        <option value="MN" <?php if($serviceaddress[0]["state"] == 'MN'){echo 'selected';}else if($billingAddress[0]["state"] == 'MN'){echo 'selected';} ?>>MN</option>
                                        <option value="MO" <?php if($serviceaddress[0]["state"] == 'MO'){echo 'selected';}else if($billingAddress[0]["state"] == 'MO'){echo 'selected';} ?>>MO</option>
                                        <option value="MS" <?php if($serviceaddress[0]["state"] == 'MS'){echo 'selected';}else if($billingAddress[0]["state"] == 'MS'){echo 'selected';} ?>>MS</option>
                                        <option value="MT" <?php if($serviceaddress[0]["state"] == 'MT'){echo 'selected';}else if($billingAddress[0]["state"] == 'MT'){echo 'selected';} ?>>MT</option>
                                        <option value="NC" <?php if($serviceaddress[0]["state"] == 'NC'){echo 'selected';}else if($billingAddress[0]["state"] == 'NC'){echo 'selected';} ?>>NC</option>
                                        <option value="ND" <?php if($serviceaddress[0]["state"] == 'ND'){echo 'selected';}else if($billingAddress[0]["state"] == 'ND'){echo 'selected';} ?>>ND</option>
                                        <option value="NE" <?php if($serviceaddress[0]["state"] == 'NE'){echo 'selected';}else if($billingAddress[0]["state"] == 'NE'){echo 'selected';} ?>>NE</option>
                                        <option value="NH" <?php if($serviceaddress[0]["state"] == 'NH'){echo 'selected';}else if($billingAddress[0]["state"] == 'NH'){echo 'selected';} ?>>NH</option>
                                        <option value="NJ" <?php if($serviceaddress[0]["state"] == 'NJ'){echo 'selected';}else if($billingAddress[0]["state"] == 'NJ'){echo 'selected';} ?>>NJ</option>
                                        <option value="NM" <?php if($serviceaddress[0]["state"] == 'NM'){echo 'selected';}else if($billingAddress[0]["state"] == 'NM'){echo 'selected';} ?>>NM</option>
                                        <option value="NV" <?php if($serviceaddress[0]["state"] == 'NV'){echo 'selected';}else if($billingAddress[0]["state"] == 'NV'){echo 'selected';} ?>>NV</option>
                                        <option value="NY" <?php if($serviceaddress[0]["state"] == 'NY'){echo 'selected';}else if($billingAddress[0]["state"] == 'NY'){echo 'selected';} ?>>NY</option>
                                        <option value="OH" <?php if($serviceaddress[0]["state"] == 'OH'){echo 'selected';}else if($billingAddress[0]["state"] == 'OH'){echo 'selected';} ?>>OH</option>
                                        <option value="OK" <?php if($serviceaddress[0]["state"] == 'OK'){echo 'selected';}else if($billingAddress[0]["state"] == 'OK'){echo 'selected';} ?>>OK</option>
                                        <option value="OR" <?php if($serviceaddress[0]["state"] == 'OR'){echo 'selected';}else if($billingAddress[0]["state"] == 'OR'){echo 'selected';} ?>>OR</option>
                                        <option value="PA" <?php if($serviceaddress[0]["state"] == 'PA'){echo 'selected';}else if($billingAddress[0]["state"] == 'PA'){echo 'selected';} ?>>PA</option>
                                        <option value="RI" <?php if($serviceaddress[0]["state"] == 'RI'){echo 'selected';}else if($billingAddress[0]["state"] == 'RI'){echo 'selected';} ?>>RI</option>
                                        <option value="SC" <?php if($serviceaddress[0]["state"] == 'SC'){echo 'selected';}else if($billingAddress[0]["state"] == 'SC'){echo 'selected';} ?>>SC</option>
                                        <option value="SD" <?php if($serviceaddress[0]["state"] == 'SD'){echo 'selected';}else if($billingAddress[0]["state"] == 'SD'){echo 'selected';} ?>>SD</option>
                                        <option value="TN" <?php if($serviceaddress[0]["state"] == 'TN'){echo 'selected';}else if($billingAddress[0]["state"] == 'TN'){echo 'selected';} ?>>TN</option>
                                        <option value="TX" <?php if($serviceaddress[0]["state"] == 'TX'){echo 'selected';}else if($billingAddress[0]["state"] == 'TX'){echo 'selected';} ?>>TX</option>
                                        <option value="UT" <?php if($serviceaddress[0]["state"] == 'UT'){echo 'selected';}else if($billingAddress[0]["state"] == 'UT'){echo 'selected';} ?>>UT</option>
                                        <option value="VA" <?php if($serviceaddress[0]["state"] == 'VA'){echo 'selected';}else if($billingAddress[0]["state"] == 'VA'){echo 'selected';} ?>>VA</option>
                                        <option value="VT" <?php if($serviceaddress[0]["state"] == 'VT'){echo 'selected';}else if($billingAddress[0]["state"] == 'VT'){echo 'selected';} ?>>VT</option>
                                        <option value="WA" <?php if($serviceaddress[0]["state"] == 'WA'){echo 'selected';}else if($billingAddress[0]["state"] == 'WA'){echo 'selected';} ?>>WA</option>
                                        <option value="WI" <?php if($serviceaddress[0]["state"] == 'WI'){echo 'selected';}else if($billingAddress[0]["state"] == 'WI'){echo 'selected';} ?>>WI</option>
                                        <option value="WV" <?php if($serviceaddress[0]["state"] == 'WV'){echo 'selected';}else if($billingAddress[0]["state"] == 'WV'){echo 'selected';} ?>>WV</option>
                                        <option value="WY" <?php if($serviceaddress[0]["state"] == 'WY'){echo 'selected';}else if($billingAddress[0]["state"] == 'WY'){echo 'selected';} ?>>WY</option>
                                    </select> </td>
                            </tr>
                            <tr>
                                <td align="right">Country</td>
                                <td>USA</td>
                            </tr>
                            <tr>
                                <td align="right">Phone <span style="color:#FF0000"> *</span></td>
                                <td>(<input style="width:28px" id="phone_ini" name="phone_ini" maxlength="3" onkeyup="set_focus(this,this.value);"
                                    <?php if(isset($phone_ini) && $phone_ini!='') {?>
                                            value="<?php echo $phone_ini ?>"
                                                <?php }else { ?> value="" <?php }?> >)
                                    <input class="px22" id="phone_mid" name="phone_mid" maxlength="3" onkeyup="set_focus1(this,this.value);"
                                    <?php if(isset($phone_mid) && $phone_mid!='') {?>
                                           value="<?php echo $phone_mid ?>"
                                               <?php }else { ?> value="" <?php }?> > -
                                    <input class="px35" id="phone_last" name="phone_last" maxlength="4"
                                    <?php if(isset($phone_last) && $phone_last!='') {?>
                                           value="<?php echo $phone_last ?>"
                                               <?php }else { ?> value="" <?php }?>
                                           ></td>
                                <td>(123) 456-7890</td>
                            </tr>
                            <tr>
                                <td align="right">Zip <span style="color:#FF0000"> *</span></td>
                                <td><input id="zip" name="zip"
                                     <?php
                                    if($serviceaddress!='' && $billingAddress != '') {
                                       $zipcode=$billingAddress[0]["zipcode"];
                                    ?>value="<?php echo $zipcode ?>"
                                    <?php }else if($billingAddress!='' && $serviceaddress ==''){
                                       $zipcode=$billingAddress[0]["zipcode"];
                                    ?> value="<?php echo $zipcode ?>"
                                    <?php }else if($billingAddress=='' && $serviceaddress !=''){
                                        $zipcode=$serviceaddress[0]["zipcode"];
                                        ?> value="<?php echo $zipcode ?>"
                                        <?php }else{?>
                                           value =""
                                        <?php }?>
                                ></td>
                            </tr>
                            
                          
                                
                            
     <tr>
                      <!--      <td align="right"> Debugging</td>
                            <td><input  type=checkbox name="debugging"></td>
                        </tr>
                        <tr>
                            <td align="right"> Verbose Output</td>
                            <td><input type=checkbox name="verbose"></td>
                        </tr> -->
                            <tr>
                                    <td align="right"><input id="tm_cbk" type="checkbox" onclick="enable_button(this);"/></td>
                                    <td> Accept <a href="../terms_of_service.php" target="_blank">Terms and Conditions </a></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> <input id="con_sub_submit" class="btn_disabled" type="submit" value="SUBMIT ORDER" disabled="true"></td>
                            </tr>
                        </table>
                        <div id="div_register_errors_7" style="margin:0px; color: red;"></div>
                    </form>
                </div>

            </div><div class="modalwindow-btm"></div></div>

    <!-- modal closed -->
</div>