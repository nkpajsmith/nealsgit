<?php session_start();
include '../dao/dbcon.php';
include '../dao/address.php';

$id=$_GET['id'];

$address1=get_address_from_id($id);
$addresstype=$address1[0]['addresstype_id'];
$addressline1=$address1[0]['addressline1'];
$addressline2=$address1[0]['addressline2'];
$city=$address1[0]['city'];
$state=$address1[0]['state'];
$country=$address1[0]['country'];
$zipcode=$address1[0]['zipcode'];
$phoneno=$address1[0]['phonenumber'];

?>

<!--<div style="margin-top:20px;float:left;width:100%;">-->
<form name="edit_address" id="adding_address" method="post" onsubmit="return edit_consumer_address($(this));">
    <table width="90%" border="0" cellspacing="2" cellpadding="5" align="center">
        <tr>
            <td width="31%" align="right"><strong>Address type  <span style="color:#FF0000"> *</strong></td>
            <td width="69%"><select name = "address_types" >
                    <?php
                    $addressez = getaddresstypes();
                    foreach($addressez as $name) {
                        if($name['addresstype_id']==$address1[0]['addresstype_id']) {
                            echo "<option selected='selected' value='{$name['addresstype_id']}' >".$name['addresstype_name']."</option>";
                        }
                        else {
                            echo "<option value='{$name['addresstype_id']}' >".$name['addresstype_name']."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right"><strong>Address line 1 <span style="color:#FF0000"> *</span></strong></td>
            <td><input type="text" name="address_line1" id="address_line1" class="txtfildpopup" value="<?php echo $address1[0]['addressline1'];?>"/></td>
        </tr>
        <tr>
            <td align="right"><strong>Address line 2</strong></td>
            <td><input type="text" name="address_line2" id="address_line2" class="txtfildpopup" value="<?php echo $address1[0]['addressline2'];?>"/></td>
        </tr>
        <tr>
            <td align="right"><strong>City  <span style="color:#FF0000"> *</strong></td>
            <td><input type="text" name="city" id="city" class="txtfildpopup" value="<?php echo $address1[0]['city'];?>" /></td>
        </tr>
        <tr>
            <td align="right"><strong>State  <span style="color:#FF0000"> *</strong></td>
            <td><select name="state" size="1">
                    <option></option>
                    <option value="AK" <?php if($address1[0]['state'] == 'AK') echo 'selected'; ?>>AK</option>
                    <option value="AL" <?php if($address1[0]['state'] == 'AL') echo 'selected'; ?>>AL</option>
                    <option value="AR" <?php if($address1[0]['state'] == 'AR') echo 'selected'; ?>>AR</option>
                    <option value="AZ" <?php if($address1[0]['state'] == 'AZ') echo 'selected'; ?>>AZ</option>
                    <option value="CA" <?php if($address1[0]['state'] == 'CA') echo 'selected'; ?>>CA</option>
                    <option value="CO" <?php if($address1[0]['state'] == 'CO') echo 'selected'; ?>>CO</option>
                    <option value="CT" <?php if($address1[0]['state'] == 'CT') echo 'selected'; ?>>CT</option>
                    <option value="DC" <?php if($address1[0]['state'] == 'DC') echo 'selected'; ?>>DC</option>
                    <option value="DE" <?php if($address1[0]['state'] == 'DE') echo 'selected'; ?>>DE</option>
                    <option value="FL" <?php if($address1[0]['state'] == 'FL') echo 'selected'; ?>>FL</option>
                    <option value="GA" <?php if($address1[0]['state'] == 'GA') echo 'selected'; ?>>GA</option>
                    <option value="HI" <?php if($address1[0]['state'] == 'HI') echo 'selected'; ?>>HI</option>
                    <option value="IA" <?php if($address1[0]['state'] == 'IA') echo 'selected'; ?>>IA</option>
                    <option value="ID" <?php if($address1[0]['state'] == 'ID') echo 'selected'; ?>>ID</option>
                    <option value="IL" <?php if($address1[0]['state'] == 'IL') echo 'selected'; ?>>IL</option>
                    <option value="IN" <?php if($address1[0]['state'] == 'IN') echo 'selected'; ?>>IN</option>
                    <option value="KS" <?php if($address1[0]['state'] == 'KS') echo 'selected'; ?>>KS</option>
                    <option value="KY" <?php if($address1[0]['state'] == 'KY') echo 'selected'; ?>>KY</option>
                    <option value="LA" <?php if($address1[0]['state'] == 'LA') echo 'selected'; ?>>LA</option>
                    <option value="MA" <?php if($address1[0]['state'] == 'MA') echo 'selected'; ?>>MA</option>
                    <option value="MD" <?php if($address1[0]['state'] == 'MD') echo 'selected'; ?>>MD</option>
                    <option value="ME" <?php if($address1[0]['state'] == 'ME') echo 'selected'; ?>>ME</option>
                    <option value="MI" <?php if($address1[0]['state'] == 'MI') echo 'selected'; ?>>MI</option>
                    <option value="MN" <?php if($address1[0]['state'] == 'MN') echo 'selected'; ?>>MN</option>
                    <option value="MO" <?php if($address1[0]['state'] == 'MO') echo 'selected'; ?>>MO</option>
                    <option value="MS" <?php if($address1[0]['state'] == 'MS') echo 'selected'; ?>>MS</option>
                    <option value="MT" <?php if($address1[0]['state'] == 'MT') echo 'selected'; ?>>MT</option>
                    <option value="NC" <?php if($address1[0]['state'] == 'NC') echo 'selected'; ?>>NC</option>
                    <option value="ND" <?php if($address1[0]['state'] == 'ND') echo 'selected'; ?>>ND</option>
                    <option value="NE" <?php if($address1[0]['state'] == 'NE') echo 'selected'; ?>>NE</option>
                    <option value="NH" <?php if($address1[0]['state'] == 'NH') echo 'selected'; ?>>NH</option>
                    <option value="NJ" <?php if($address1[0]['state'] == 'NJ') echo 'selected'; ?>>NJ</option>
                    <option value="NM" <?php if($address1[0]['state'] == 'NM') echo 'selected'; ?>>NM</option>
                    <option value="NV" <?php if($address1[0]['state'] == 'NV') echo 'selected'; ?>>NV</option>
                    <option value="NY" <?php if($address1[0]['state'] == 'NY') echo 'selected'; ?>>NY</option>
                    <option value="OH" <?php if($address1[0]['state'] == 'OH') echo 'selected'; ?>>OH</option>
                    <option value="OK" <?php if($address1[0]['state'] == 'OK') echo 'selected'; ?>>OK</option>
                    <option value="OR" <?php if($address1[0]['state'] == 'OR') echo 'selected'; ?>>OR</option>
                    <option value="PA" <?php if($address1[0]['state'] == 'PA') echo 'selected'; ?>>PA</option>
                    <option value="RI" <?php if($address1[0]['state'] == 'RI') echo 'selected'; ?>>RI</option>
                    <option value="SC" <?php if($address1[0]['state'] == 'SC') echo 'selected'; ?>>SC</option>
                    <option value="SD" <?php if($address1[0]['state'] == 'SD') echo 'selected'; ?>>SD</option>
                    <option value="TN" <?php if($address1[0]['state'] == 'TN') echo 'selected'; ?>>TN</option>
                    <option value="TX" <?php if($address1[0]['state'] == 'TX') echo 'selected'; ?>>TX</option>
                    <option value="UT" <?php if($address1[0]['state'] == 'UT') echo 'selected'; ?>>UT</option>
                    <option value="VA" <?php if($address1[0]['state'] == 'VA') echo 'selected'; ?>>VA</option>
                    <option value="VT" <?php if($address1[0]['state'] == 'VT') echo 'selected'; ?>>VT</option>
                    <option value="WA" <?php if($address1[0]['state'] == 'WA') echo 'selected'; ?>>WA</option>
                    <option value="WI" <?php if($address1[0]['state'] == 'WI') echo 'selected'; ?>>WI</option>
                    <option value="WV" <?php if($address1[0]['state'] == 'WV') echo 'selected'; ?>>WV</option>
                    <option value="WY" <?php if($address1[0]['state'] == 'WY') echo 'selected'; ?>>WY</option>
                </select></td>
        </tr>
        <tr>
            <td align="right"><strong>Zip code <span style="color:#FF0000"> *</strong></td>
            <td><input type="text" name="zip_code" id="zip_code" class="txtfildpopup" value="<?php echo $address1[0]['zipcode'];?>"/></td>
        </tr>
<?php
        $phone1     = $address1[0]['phonenumber'];
        $phone_ini  = substr($phone1,0,3);
        $phone_mid  = substr($phone1,3,3);
        $phone_last = substr($phone1,6,4);
        ?>
        <tr>
            <td align="right"><strong> phone #  <span style="color:#FF0000"> *</strong></td>
            <td>(<input style="width:28px" type="text" name="phone_ini" id="phone_ini" class="txtfildpopup" maxlength="3" value="<?php echo $phone_ini ?>"/>)
                <input style="width:28px" type="text" name="phone_mid" id="phone_mid" class="txtfildpopup" maxlength="3" value="<?php echo $phone_mid ?>"/> -
                <input style="width:35px" type="text" name="phone_last" id="phone_last" class="txtfildpopup" maxlength="4" value="<?php echo $phone_last ?>"/>
            </td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>
                <input type="submit" value="SUBMIT" class="btn">
            </td>
        </tr>
    </table>
    <div id="div_register_errors_2" class="errordiv" style="margin:0px;"></div>
    <input type="hidden" id="add_iddd" name="address_idddd" value="<?php echo $address1[0]['address_id'];?>">
</form>
<!--</div>-->