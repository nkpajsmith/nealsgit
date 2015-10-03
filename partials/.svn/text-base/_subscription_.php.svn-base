<?php session_start();
include_once 'subscription.php';
include_once 'address.php';
include_once 'consumer.php';
include_once 'dbcon.php';

//for converting xml to string
function displayString($arrayText) {
    if (count($arrayText) > 0) {
        $string = '';
        foreach ($arrayText as $val) {
            $string .= $val;
        }
        return $string;
    } else {
        return false;
    }
}?>
<div id="status_change">
    <div class="modal-form">
        <?php
        //--------------------pre authentication ---------------------//
        require_once "../secure/firstdata/lphp.php";
        require_once '/var/www/tmconfig/dev/linkpoint_settings.php'; //linkpoint config file...
        $mylphp=new lphp;

        $check_home_billing = $_POST['hidden_check'];
        $orderId=getNextLogId();

        $myorder["oid"]         = $orderId[0];
        $myorder["ordertype"]   ="preauth";
        $myorder["result"]   ="live";

        # form data card info
        $myorder["cardnumber"]    = $_POST["cardnumber"];
        
        $myorder["cardexpmonth"]  = $_POST["cardexpmonth"];
        $myorder["cardexpyear"]   = $_POST["cardexpyear"];
        $myorder["chargetotal"]   = $_POST["chargetotal"];
        $myorder["cvmvalue"]      = $_POST["cvmvalue"];

        # BILLING INFO
        if (isset($_SESSION['consumer']['itconsumername'])) {$myorder["name"]= $_SESSION['consumer']['itconsumername'];} else
        																				     {$myorder["name"] = $_SESSION['provider']['primaryname'];} 
        // Remove Special Characters																					
       $phrase  = $myorder["name"];
       $spchars = array("$", "%", "&","@","*","!");
       $rmchars   = array("", "", "", "","","");

        $myorder["name"] = str_replace($spchars, $rmchars, $phrase); 																					
        																					
        																					
        $myorder["address1"] = $_POST["address1"];
        $myorder["address2"] = $_POST["address2"];
        $myorder["city"]     = $_POST["city"];
        $myorder["state"]    = $_POST["state"];
        $myorder["country"]  = "USA";
        // getting phone values and concatinating it
        $ph_ini              = $_POST["phone_ini"];
        $ph_mid              = $_POST["phone_mid"];
        $ph_last             = $_POST["phone_last"];
        $phone               = $ph_ini.$ph_mid.$ph_last;
        //-----------
        $myorder["phone"]    = $phone;
        if (isset ($_SESSION['consumer']['itconsumer_emailaddress'])) {$myorder["email"]    = $_SESSION['consumer']['itconsumer_emailaddress'];} else
        																									{$myorder["email"]    = $_SESSION['provider']['contactemailaddress'];}									
        $myorder["zip"]      = $_POST["zip"];
       
        $myorder["sstate"]    = "";

         if (isset($_SESSION['consumer']['itconsumer_id'])) {$consumer_id  =$_SESSION['consumer']['itconsumer_id'];} 
        											else {$consumer_id =$_SESSION['provider']['serviceprovider_id'];}
        											
        $packageTypeName        = getSubsTypeDetail($_POST["address_types"]);
        $subscriptiontype_id    = $packageTypeName[0];
        $subscribertype_id      = $packageTypeName[1];
        $subscriptiondesc       = $packageTypeName[2];
        $subDay                 = $packageTypeName[3];

        // building request xml
        $xml = $mylphp->buildXML($myorder);
        $requestXML=htmlspecialchars($xml); //requestxml
        
        // if debugging enabled
        if (isset($_POST["debugging"]))
            $myorder["debugging"]="true";
        //
        //  # Send transaction. Use one of two possible methods  #
        //  $result = $mylphp->process($myorder);       # use shared library model
        $result = $mylphp->curl_process($myorder);  # use curl methods
        //responsexml
        $returnString = displayString($result);
        // extracting AVS code from result XML
        $avs_code= substr($result["r_avs"],0,3); // extracted AVS code from the response string
        
        if ($result["r_approved"] != "APPROVED")    // transaction failed, print the reason
        {
            print "Your Transaction has been :  $result[r_approved]<br>\n";
            print "The Transaction was declined because of:  $result[r_error]<br><br>\n";
            // log enteries
            setRequestInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $requestXML,'preauth');
            setResponseInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $returnString,'preauth-Response');
        }
        else	// success
        {
            if($avs_code == 'YYY' || $avs_code == 'YYA' || $avs_code == 'NYZ'||$avs_code =='YNA') {
               // print "Congratulations your Transaction has been: $result[r_approved]<br>\n";
               // print "Transaction Code: $result[r_code]<br><br>\n";
                // subscription completed card validated
                echo '<ol>';
                echo "<li><h3>We've confirmed your card, that's great!</h3></li>";
                

                setRequestInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $requestXML,'preauth');
                setResponseInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $returnString,'preauth-Response');

                // if card id validated...do post auth for money deduction from card
                $myorder["ordertype"]   ="postauth";

                $xml_post = $mylphp->buildXML($myorder);
                $requestXML_post=htmlspecialchars($xml);

                $result_post = $mylphp->curl_process($myorder);  # use curl methods
                //responsexml
                $responseStr_post = displayString($result_post);

                if ($result_post["r_approved"] != "APPROVED")    // transaction failed, print the reason
                {
                    echo '<li> <h3> Oh, no, there has been and error.  Can you try again?</h3> </li>';
                    echo ' If you need help, contact support@techmatcher.com ';
                
                    //print "Status:  $result[r_approved]<br>\n";
                    //print "Error:  $result[r_error]<br><br>\n";
                    setRequestInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $requestXML_post,'postauth');
                    setResponseInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $responseStr_post,'postauth-Response');
                }
                else	// success money deducted
                {
 //                    $record = getSubscriptionRecordView($consumer_id);
//                     //setting value in subscription history table
//                     if(isset($subscriptiondesc) && $subscriptiondesc != '' && $record == false) {
                        setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id);
//                    }
                    //           send email
                      if (isset($_SESSION['consumer']['itconsumername'])) {
                           include_once '../emails/subscription_email.php';
                    }else{ include_once '../emails/provider_subscription_email.php';}
                    
                    //print "Status: $result[r_approved]<br>\n";
                    //print "Transaction Code: $result[r_code]<br><br>\n";
                    setRequestInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $requestXML_post,'postauth');
                    setResponseInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $responseStr_post,'postauth-Response');
                     echo '<li> <h3>All set.  Check your email for a reciept from us.  Now you can use all of Techmatcher!</h3> </li>'; 
                }
            }else { // else of card validation
                echo "Oops, your credit card was not approved.  This is because the address you entered doesn't match the Credit Card issuer's records.  </br>Please try again or contact our customer support team for assistance. <br><br>";
                // log enteries
                setRequestInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $requestXML,'preauth');
                setResponseInLog($orderId[0],$consumer_id, $subscriptiontype_id, $subscribertype_id, $returnString,'preauth-Response');
            }
            // checking id address exits
         if (isset($_SESSION['consumer']['itconsumername'])) {
            $consumer_subscription_id = getSubscriptionId($_SESSION['consumer']['itconsumer_id']);
            // adding addresses...
            if(isset($check_home_billing)&& $check_home_billing == 1){
                updateHomeAddress($_SESSION['consumer']['itconsumer_id'],$_POST["address1"],$_POST["address2"],$_POST["city"],$_POST["state"],$_POST["zip"],$phone);
            }else{
                $billingAddress1 = get_consumer_billing_address($_SESSION['consumer']['itconsumer_id']);
                if(empty($billingAddress1) || !isset($billingAddress1)) {// if not set the address in DB
                    setBillingAddress($_SESSION['consumer']['itconsumer_id'],$_POST["address1"],$_POST["address2"],$_POST["city"],$_POST["state"],$_POST["zip"],$phone);
                }else {// else update the previous record
                    updateBillingAddress($_SESSION['consumer']['itconsumer_id'],$_POST["address1"],$_POST["address2"],$_POST["city"],$_POST["state"],$_POST["zip"],$phone);
                }
            }
            }
        }
         
        # if verbose output has been checked,
        # print complete server response to a table
        if (isset($_POST["verbose"])) {
            echo "<table border=1>";

            while (list($key, $value) = each($result)) {
                # print the returned hash
                echo "<tr>";
                echo "<td>" . htmlspecialchars($key) . "</td>";
                echo "<td><b>" . htmlspecialchars($value) . "</b></td>";
                echo "</tr>";
            }
            echo "</TABLE><br>\n";
        }
        ?>
    </div></div>

