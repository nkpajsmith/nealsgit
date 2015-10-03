<?php session_start();
include_once '../dao/dbcon.php';
include_once '../dao/subscription.php';
include_once("../dao/search.php");
include_once '../dao/subscription.php';
include_once '../dao/consumer.php';

$consumerId = "";
$addressez = getsubscriptionforconsumer($_SESSION['consumer']['itconsumer_id']);

$billingAddress = get_consumer_billing_address($_SESSION['consumer']['itconsumer_id']);
if(isset($billingAddress) && $billingAddress!='' && $billingAddress[0]["phonenumber"]!='') {
    $phone = $billingAddress[0]["phonenumber"];
    $phone_ini=substr($phone,0,3);
    $phone_mid = substr($phone,3,3);
    $phone_last = substr($phone,6,4);
}
?>

<table id="package">
    <tr>
        <td align="right">Package Type <?php $consumerId = $_SESSION['consumer']['itconsumer_id'];?></td>
        <td>
            <select name = "address_types" onchange="change_value(this.value);">
                <option value="-1">--Select Package Type--</option>
                <?php

                $addressez = getsubscriptionforconsumer($_SESSION['consumer']['itconsumer_id']);
                foreach($addressez as $name) {
                    echo "<option value='{$name['subcriptionrate']}' >".$name['subscriptiondesc']."  </option>";
                }
                ?>

            </select></td>
        <td>
            <select style="display:none">
                <?php
                foreach($addressez as $name) {

                    echo "<option id='{$name['subscriptiontype_id']}' value='{$name['subcriptionrate']}' >".$name['subcriptionrate']."  </option>";

                }
                ?>

            </select>
        </td>
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
                <?PHP for($i=date("y"); $i<=date("y")+8; $i++)
                    if($year == $i)
                        echo "<option value='$i' selected>$i</option>";
                    else
                        echo "<option value='$i'>$i</option>";
                ?>
            </select></td>
    </tr>

    <tr> <th colspan=2>Billing Info.</th></tr>
    <tr>
        <td align="right">Address1 <span style="color:#FF0000"> *</span></td>
        <td><input id ="address" name="address1"
            <?php
            if($billingAddress!='' && $billingAddress[0]["addressline1"]!='') {
                $addressline1=$billingAddress[0]["addressline1"];

                ?>
                   value="<?php echo $addressline1 ?>"
                       <?php }else { ?> value="" <?php }?>
                   ></td>
    </tr>
    <tr>
        <td align="right">Address2</td>
        <td><input id ="address 2" name="address2"
            <?php
            if($billingAddress!='' && $billingAddress[0]["addressline2"]!='') {
                $addressline2=$billingAddress[0]["addressline2"];

                ?>
                   value="<?php echo $addressline2 ?>"
                       <?php }else { ?> value="" <?php }?>
                   ></td>
    </tr>
    <tr>
        <td align="right">City <span style="color:#FF0000"> *</span></td>
        <td><input id="city" name="city"
            <?php
            if($billingAddress!='' && $billingAddress[0]["city"]!='') {
                $city=$billingAddress[0]["city"];
                ?>
                   value="<?php echo $city ?>"
                       <?php }else { ?> value="" <?php }?>
                   ></td>
    </tr>
    <tr>
        <td align="right">State</td>
        <td>
            <select id="state" name="state" size="1">
                <option></option>
                <option value="AK" <?php if($billingAddress[0]["state"] == 'AK') echo 'selected'; ?>>AK</option>
                <option value="AL" <?php if($billingAddress[0]["state"] == 'AL') echo 'selected'; ?>>AL</option>
                <option value="AR" <?php if($billingAddress[0]["state"] == 'AR') echo 'selected'; ?>>AR</option>
                <option value="AZ" <?php if($billingAddress[0]["state"] == 'AZ') echo 'selected'; ?>>AZ</option>
                <option value="CA" <?php if($billingAddress[0]["state"] == 'CA') echo 'selected'; ?>>CA</option>
                <option value="CO" <?php if($billingAddress[0]["state"] == 'CO') echo 'selected'; ?>>CO</option>
                <option value="CT" <?php if($billingAddress[0]["state"] == 'CT') echo 'selected'; ?>>CT</option>
                <option value="DC" <?php if($billingAddress[0]["state"] == 'DC') echo 'selected'; ?>>DC</option>
                <option value="DE" <?php if($billingAddress[0]["state"] == 'DE') echo 'selected'; ?>>DE</option>
                <option value="FL" <?php if($billingAddress[0]["state"] == 'FL') echo 'selected'; ?>>FL</option>
                <option value="GA" <?php if($billingAddress[0]["state"] == 'GA') echo 'selected'; ?>>GA</option>
                <option value="HI" <?php if($billingAddress[0]["state"] == 'HI') echo 'selected'; ?>>HI</option>
                <option value="IA" <?php if($billingAddress[0]["state"] == 'IA') echo 'selected'; ?>>IA</option>
                <option value="ID" <?php if($billingAddress[0]["state"] == 'ID') echo 'selected'; ?>>ID</option>
                <option value="IL" <?php if($billingAddress[0]["state"] == 'IL') echo 'selected'; ?>>IL</option>
                <option value="IN" <?php if($billingAddress[0]["state"] == 'IN') echo 'selected'; ?>>IN</option>
                <option value="KS" <?php if($billingAddress[0]["state"] == 'KS') echo 'selected'; ?>>KS</option>
                <option value="KY" <?php if($billingAddress[0]["state"] == 'KY') echo 'selected'; ?>>KY</option>
                <option value="LA" <?php if($billingAddress[0]["state"] == 'LA') echo 'selected'; ?>>LA</option>
                <option value="MA" <?php if($billingAddress[0]["state"] == 'MA') echo 'selected'; ?>>MA</option>
                <option value="MD" <?php if($billingAddress[0]["state"] == 'MD') echo 'selected'; ?>>MD</option>
                <option value="ME" <?php if($billingAddress[0]["state"] == 'ME') echo 'selected'; ?>>ME</option>
                <option value="MI" <?php if($billingAddress[0]["state"] == 'MI') echo 'selected'; ?>>MI</option>
                <option value="MN" <?php if($billingAddress[0]["state"] == 'MN') echo 'selected'; ?>>MN</option>
                <option value="MO" <?php if($billingAddress[0]["state"] == 'MO') echo 'selected'; ?>>MO</option>
                <option value="MS" <?php if($billingAddress[0]["state"] == 'MS') echo 'selected'; ?>>MS</option>
                <option value="MT" <?php if($billingAddress[0]["state"] == 'MT') echo 'selected'; ?>>MT</option>
                <option value="NC" <?php if($billingAddress[0]["state"] == 'NC') echo 'selected'; ?>>NC</option>
                <option value="ND" <?php if($billingAddress[0]["state"] == 'ND') echo 'selected'; ?>>ND</option>
                <option value="NE" <?php if($billingAddress[0]["state"] == 'NE') echo 'selected'; ?>>NE</option>
                <option value="NH" <?php if($billingAddress[0]["state"] == 'NH') echo 'selected'; ?>>NH</option>
                <option value="NJ" <?php if($billingAddress[0]["state"] == 'NJ') echo 'selected'; ?>>NJ</option>
                <option value="NM" <?php if($billingAddress[0]["state"] == 'NM') echo 'selected'; ?>>NM</option>
                <option value="NV" <?php if($billingAddress[0]["state"] == 'NV') echo 'selected'; ?>>NV</option>
                <option value="NY" <?php if($billingAddress[0]["state"] == 'NY') echo 'selected'; ?>>NY</option>
                <option value="OH" <?php if($billingAddress[0]["state"] == 'OH') echo 'selected'; ?>>OH</option>
                <option value="OK" <?php if($billingAddress[0]["state"] == 'OK') echo 'selected'; ?>>OK</option>
                <option value="OR" <?php if($billingAddress[0]["state"] == 'OR') echo 'selected'; ?>>OR</option>
                <option value="PA" <?php if($billingAddress[0]["state"] == 'PA') echo 'selected'; ?>>PA</option>
                <option value="RI" <?php if($billingAddress[0]["state"] == 'RI') echo 'selected'; ?>>RI</option>
                <option value="SC" <?php if($billingAddress[0]["state"] == 'SC') echo 'selected'; ?>>SC</option>
                <option value="SD" <?php if($billingAddress[0]["state"] == 'SD') echo 'selected'; ?>>SD</option>
                <option value="TN" <?php if($billingAddress[0]["state"] == 'TN') echo 'selected'; ?>>TN</option>
                <option value="TX" <?php if($billingAddress[0]["state"] == 'TX') echo 'selected'; ?>>TX</option>
                <option value="UT" <?php if($billingAddress[0]["state"] == 'UT') echo 'selected'; ?>>UT</option>
                <option value="VA" <?php if($billingAddress[0]["state"] == 'VA') echo 'selected'; ?>>VA</option>
                <option value="VT" <?php if($billingAddress[0]["state"] == 'VT') echo 'selected'; ?>>VT</option>
                <option value="WA" <?php if($billingAddress[0]["state"] == 'WA') echo 'selected'; ?>>WA</option>
                <option value="WI" <?php if($billingAddress[0]["state"] == 'WI') echo 'selected'; ?>>WI</option>
                <option value="WV" <?php if($billingAddress[0]["state"] == 'WV') echo 'selected'; ?>>WV</option>
                <option value="WY" <?php if($billingAddress[0]["state"] == 'WY') echo 'selected'; ?>>WY</option>
            </select> </td>
    </tr>
    <tr>
        <td align="right">Country</td>
        <td>USA</td>
    </tr>
    <tr>
        <td align="right">Phone <span style="color:#FF0000"> *</span></td>
        <td>(<input style="width:28px" id="phone_ini" name="phone_ini" maxlength="3"                                         <?php
            if(isset($phone_ini) && $phone_ini!='') {?>
                    value="<?php echo $phone_ini ?>"
                        <?php }else { ?> value="" <?php }?> >)
            <input style="width:28px" id="phone_mid" name="phone_mid" maxlength="3"
            <?php if(isset($phone_mid) && $phone_mid!='') {?>
                   value="<?php echo $phone_mid ?>"
                       <?php }else { ?> value="" <?php }?> > -
            <input style="width:35px" id="phone_last" name="phone_last" maxlength="4"
            <?php if(isset($phone_last) && $phone_last!='') {?>
                   value="<?php echo $phone_last ?>"
                       <?php }else { ?> value="" <?php }?>
                   ></td>
        <td>(123) 456-7890 </td>
    </tr>
    <tr>
        <td align="right">Zip <span style="color:#FF0000"> *</span></td>
        <td><input id="zip" name="zip"
            <?php
            if($billingAddress!='' && $billingAddress[0]["zipcode"]!='') {
                $zipcode=$billingAddress[0]["zipcode"];
                ?>
                   value="<?php echo $zipcode ?>"
                       <?php }else { ?> value="" <?php }?>
                   ></td>
    </tr>

                  <!--      <tr>
                            <td align="right"> Debugging</td>
                            <td><input  type=checkbox name="debugging"></td>
                        </tr>
                        <tr>
                            <td align="right"> Verbose Output</td>
                            <td><input type=checkbox name="verbose"></td>
                        </tr> -->

    <tr>
        <td> </td>
        <td> <input class="btn" type="submit" value="Submit Order" ></td>
    </tr>
</table>