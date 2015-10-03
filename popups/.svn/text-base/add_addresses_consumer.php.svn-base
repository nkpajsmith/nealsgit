<!-- Add address popup -->
<!-- modal window -->
<div class="modal-wrap">
    <div id="modal-consumer-address" class="modalwindow"><div class="modalwindow-bkg">
            <!-- modal form -->
            <div class="modal-form">
                <form name="address" id="adding_address" method="post" onsubmit="return add_consumer_address($(this));">
                    <table width="90%" border="0" cellspacing="2" cellpadding="5" align="center">
                        <p style = "width=60%; font-size:110%"><strong>Please enter a location where you'd like service.</strong></p>
                        <tr>
                            <td width="31%" align="right"><strong>Address type  <span style="color:#FF0000"> *</strong></td>
                            <td width="69%"><select id="address_types" name = "address_types" >
                                    <option></option>
                                    <?php
                                    $addressez = getaddresstypes();
                                    foreach($addressez as $name) {
                                        echo "<option value='{$name['addresstype_id']}' >".$name['addresstype_name']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Address line 1 <span style="color:#FF0000"> *</span></strong></td>
                            <td><input type="text" name="address_line1" id="address_line1" /></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Address line 2</strong></td>
                            <td><input type="text" name="address_line2" id="address_line2" /></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>City  <span style="color:#FF0000"> *</strong></td>
                            <td><input type="text" name="city" id="city" /></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>State  <span style="color:#FF0000"> *</strong></td>
                            <td> <select name="state" id="state" size="1">
                                    <option></option>
                                    <option value="AK">AK</option>
                                    <option value="AL">AL</option>
                                    <option value="AR">AR</option>
                                    <option value="AZ">AZ</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DC">DC</option>
                                    <option value="DE">DE</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="IA">IA</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="MA">MA</option>
                                    <option value="MD">MD</option>
                                    <option value="ME">ME</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MO">MO</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="NC">NC</option>
                                    <option value="ND">ND</option>
                                    <option value="NE">NE</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NV">NV</option>
                                    <option value="NY">NY</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VA">VA</option>
                                    <option value="VT">VT</option>
                                    <option value="WA">WA</option>
                                    <option value="WI">WI</option>
                                    <option value="WV">WV</option>
                                    <option value="WY">WY</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Zip code <span style="color:#FF0000"/> *</strong></td>
                            <td><input type="text" name="zip_code" id="zip_code" /></td>
                        </tr>
                        <tr>
                            <td align="right"><strong> phone #  <span style="color:#FF0000"/> *</strong></td>
                            <td>(<input style="width:28px" type="text" name="phone_ini" id="phone_ini" maxlength="3" onkeyup="set_focus(this,this.value);"/>)
                                <input type="text" name="phone_mid" id="phone_mid"  maxlength="3" class="px22" onkeyup="set_focus1(this,this.value);"/> -
                                <input class="px35" type="text" name="phone_last" id="phone_last" maxlength="4"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">&nbsp;</td>
                            <td>
                                <input id="add_address_btn" type="submit" value="SUBMIT" class="btn">
                            </td>
                        </tr>
                    </table>
                    <div id="div_register_errors_2" style="margin:0px;"></div>
                </form>
            </div>
        </div><div class="modalwindow-btm"></div></div>
</div>
<!-- Modal popup.....Add Address Popup-->