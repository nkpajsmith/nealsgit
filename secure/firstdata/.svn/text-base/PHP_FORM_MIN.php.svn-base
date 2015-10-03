<?php //ob_start();
session_start();

include_once '../../scripts1.php';
include_once '../../header.php';
include_once '../../dao/subscription.php';
include_once '../../dao/dbcon.php';

?>
<html>

    <head><title>Status Page </title><?php include '../../scripts1.php';?></head>
    <body>
        <br>

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

        <div class="flt w100">
        <?php
        /*
        <!---------------------------------------------------------------------------------
        * PHP_FORM_MIN.php - A form processing example showing the minimum
        * number of possible fields for a credit card SALE transaction.
        *
        * This script processes form data passed in from PHP_FORM_MIN.html
        *
        *
        * Copyright 2003 LinkPoint International, Inc. All Rights Reserved.
        *
        * This software is the proprietary information of LinkPoint International, Inc.
        * Use is subject to license terms.
        *

                This program is based on the sample SALE_MININFO.php

                Depending on your server setup, this script may need to
                be placed in the cgi-bin directory, and the path in the
                calling file PHP_FORM_MIN.html may need to be adjusted
                accordingly.

                NOTE: older versions of PHP and in cases where the PHP.INI
                entry is NOT "register_globals = Off", form data can be
                accessed simply by using the form-field name as a varaible
                name, eg. $myorder["host"] = $host, instead of using the
                global $_POST[] array as we do here. Passing form fields
                as demonstrated here provides a higher level of security.

        ------------------------------------------------------------------------------------>
        */
        include"lphp.php";
        $mylphp=new lphp;

        # constants
        $myorder["host"]       = "staging.linkpt.net";
        $myorder["port"]       = "1129";
        $myorder["keyfile"]    = "C:/1909350049.pem"; # Change this to the name and location of your certificate file
        $myorder["configfile"] = "1909350049";        # Change this to your store number
        
        # form data
       // $service_provider_id=$_SESSION['provider']['serviceprovider_id'];
        //$service_type    =$_POST['address_types'];
        $myorder["cardnumber"]    = $_POST["cardnumber"];
        $myorder["cardexpmonth"]  = $_POST["cardexpmonth"];
        $myorder["cardexpyear"]   = $_POST["cardexpyear"];
        $myorder["chargetotal"]   = $_POST["chargetotal"];

       // $myorder["ordertype"]     = $_POST["ordertype"];
        //$myorder["result"] = "LIVE";
        //$myorder["result"] = "GOOD";

        print_r("value".$_POST["address_types"]); // 1 day $1    3 months $39.99 12 months 69.99

        $consumer_id=$_SESSION['consumer']['itconsumer_id'];
        $packageTypeName = getSubsTypeDetail($_POST["address_types"]);
        $subscriptiontype_id = $packageTypeName[0];
        $subscribertype_id = $packageTypeName[1];
        $subscriptiondesc = $packageTypeName[2];
        $subDay = $packageTypeName[3];
//        echo($subscriptiontype_id."<br>");
//        echo($subscribertype_id."<br>");
//       echo($subscriptiondesc."<br>");
//       echo($subDay."<br>");

        if (isset($_POST["debugging"]))
        $myorder["debugging"]="true";       
//
//        # Send transaction. Use one of two possible methods  #
//        $result = $mylphp->process($myorder);       # use shared library model
//        print_r($myorder);
        $result = $mylphp->curl_process($myorder);  # use curl methods
//        print_r($result);
        
//        die("AAAAAAAAAAa");
//        var_dump($result);
//         var_dump($myorder);
//        echo($result."<br>");
//        var_dump($result["r_approved"]);
//        var_dump($result["r_error"]);
       // die;
//
        if ($result["r_approved"] != "APPROVED")    // transaction failed, print the reason
        {
            print "Your Transcaction has been :  $result[r_approved]<br>\n";
            print "The Transaction was declined because of:  $result[r_error]<br><br>\n";
        }
        else	// success
        {
            print "Congratulations your result has been: $result[r_approved]<br>\n";
            print "<style>Transaction Code: $result[r_code]<br><br>\n";

        if($subscriptiondesc == '1 Day Trial' || $subscriptiondesc =='3 Month Subscription'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == '3 Month Subscription'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == '12 Month Subscription'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Base Package 6 Months'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Plus Package 12 Months incl 911'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Pro Package w Market Analysis'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Business 1 Day Trial'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Business Standard Package 6 Months'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }else if($subscriptiondesc == 'Business Pro Package 12 Months and Analytics'){
           setSubscriptionRecord($consumer_id,$subscriptiontype_id,$subscribertype_id,$subDay);
        }
        }
//
//        # if verbose output has been checked,
//        # print complete server response to a table
        if (isset($_POST["verbose"]))
        {
            echo "<table border=1>";

            while (list($key, $value) = each($result))
            {
                # print the returned hash
                echo "<tr>";
                echo "<td>" . htmlspecialchars($key) . "</td>";
                echo "<td><b>" . htmlspecialchars($value) . "</b></td>";
                echo "</tr>";
            }

            echo "</TABLE><br>\n";
        }
        ?>
</div>
</body></html>
