<?php session_start();
if(isset($_SESSION['provider'])){
 


?>
<script>
    function change_value(elm)
    {
        var a =  document.getElementById('amount');
        b = elm.options[elm.selectedIndex].value;
        if(b=="-1")
            a.value=""
        else
            a.value= document.getElementById(b).innerHTML;
    }
</script>
<?php
/* PHP_FORM_MIN.html - A form processing example showing the minimum
* number of possible fields for a credit card SALE transaction.
*
* This page passes form data passed to the script PHP_FORM_MIN.php.
*
*   Copyright 2003 LinkPoint International, Inc. All Rights Reserved.
*
*   This software is the proprietary information of LinkPoint International, Inc.
* Use is subject to license terms.
*/



?>
<html><head><title>Subscription Page</title><?php include '../../scripts1.php';?></head>
    <body>
        <?php include '../../header.php';
        include '../../dao/subscription.php';
        ?>
        <div class="pagesubheader flt w100">
            <div class="repeatbackground  flt w100">
                <div class="flt mainheading">

                    welcome <br />
                    <span style="font-size:14px;color:black;"><b>
                            Subscription Area
                    </b></span>
                </div>



            </div>
            <div class="bottom  flt w100">
                <img id="yatta" src="../../images/yatta_small.png" width="107" height="174">
            </div>
            <div class="progress">
                <div class="top">
                    &nbsp;
                </div>
            </div>
        </div>
<div class="flt mlt15 w100" >
                        <span class="fnt_headingaddresses">
                        <b>Company Details</b>
                        </span>
                    </div>

       <div class=" flt dmographicx_tableholder">
        <table style="font-size:12px">
<tr>
                <td align="right" valign="middle">Company Legal name:</td>
      <td><b><?php if(!empty($_SESSION['provider'])){ ?> <?php echo $_SESSION['provider']['primaryname']; ?><?php } ?></b></td>
            </tr>

            <tr>

              <td align="right" valign="middle"> <input  type=checkbox name="dba_name"  value="" onclick="show_textbox(this)"></td>
             <td> Have a DBA Business Name</td>
            </tr>
            <tr id="nauman" style="display:none">
                <td align="right" valign="middle">Alternative/DBA name:</td>
              <td> <input  class="txtbox" type=text name="dbaname" <?php if(!empty($_SESSION['provider'])){ ?> value="<?php echo $_SESSION['provider']['dbaname']; ?>"><?php } ?></td>
            </tr>

            <tr>
                <td align="right" valign="middle">Contact Email:(must be real person. why?)</td>
              <td><b><?php if(!empty($_SESSION['provider'])){ ?><?php echo $_SESSION['provider']['contactemailaddress']; ?><?php } ?></b></td>
            </tr>
        </table>
        </div>
<div class="flt w100">
<div class="flt mlt15" >
                        <span class="fnt_headingaddresses">
                        <b>Transaction Details</b>
                        </span>
                    </div>

        
            <form name="form1" method="post" action="PHP_FORM_MIN.php">

<?php $addressez = getsubscriptionsforprovider();
//var_dump($_SESSION['provider']);
//die;
?>

                <br><br>
                <table>
                    <tr>
                        <td align="right">Package Type</td>
                        <td><select name = "address_types" onchange='change_value(this)'>
                                <option value="-1">--Select Package Type--</option>
                                <?php
                                $addressez = getsubscriptionsforprovider();

                                foreach($addressez as $name){

                                    echo "<option value='{$name['subscriptiontype_id']}' >".$name['subscriptiondesc']."  </option>";

                                }
                                ?>

                        </select></td>
                        <td>
                            <select style="display:none">
                                <?php
                                foreach($addressez as $name){

                                    echo "<option id='{$name['subscriptiontype_id']}' value='{$name['subcriptionrate']}' >".$name['subcriptionrate']."  </option>";

                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Amount</td>
                        <td><input type=text name="chargetotal" id="amount"></td>
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
                        <td align="right">Card Number</td>
                        <td><input type=text name="cardnumber"></td>
                    </tr>
                    <tr>
                        <td align="right">Card Expiry Month</td>
                        <td><input type=text name="cardexpmonth"></td>
                    </tr>
                    <tr>
                        <td align="right">Card Expiry Year</td>
                        <td><input type=text name="cardexpyear"></td>
                    </tr>
                    <tr>
                        <td align="right"> Debugging</td>
                        <td><input  type=checkbox name="debugging"></td>
                    </tr>
                    <tr>
                        <td align="right"> Verbose Output</td>
                        <td><input type=checkbox name="verbose"></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td> <input type="submit" value="Submit Order"></td>
                    </tr>
                </table>
            </form>
        </div>

</body></html>
<?php }
else
{
 header('Location: tech/login.php');
}
?>