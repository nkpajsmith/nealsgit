<?php session_start();
include_once '../dao/dbcon.php';
$qry_service_providers = pg_query_params("select primaryname,aliasname,contactfirstname,contactlastname,contacttitle,companyfounded_dt from techmatcher.serviceprovider where serviceprovider_id = $1", array($_SESSION['provider']['serviceprovider_id']));
$service_providers = pg_fetch_all($qry_service_providers);
?>

<form id="save_record" method="POST" onsubmit="return save_provider_contact($(this));">
    <div class="w100">
        <div class="greybtnwraper">
            <label>Salutation</label>
            <select style="width:73%" id="contacttitle" name="contacttitle">
                <option></option>
                <option value="Mr." <?php if($service_providers[0]['contacttitle'] == 'Mr.') {
                    echo 'selected';
                        }?>>Mr.</option>
                <option value="Mrs." <?php if($service_providers[0]['contacttitle'] == 'Mrs.') {
                    echo 'selected';
                        }?>>Mrs.</option>
                <option value="Ms." <?php if($service_providers[0]['contacttitle'] == 'Ms.') {
                    echo 'selected';
                        }?>>Ms.</option>
                <option value="Dr." <?php if($service_providers[0]['contacttitle'] == 'Dr.') {
                    echo 'selected';
                        }?>>Dr.</option>
            </select>
        </div>
        <div class="greybtnwraper">
            <label>Contact First Name</label>
            <input id="contactfirstname" name="contactfirstname" value="<?php echo $service_providers[0]['contactfirstname'];?>"/>
        </div>
    </div>
    <div class="w100">
        <div class="greybtnwraper">
            <label>Contact Last Name</label>
            <input id="contactlastname" name="contactlastname" value="<?php echo $service_providers[0]['contactlastname'];?>"/>
        </div>

        <div class="greybtnwraper">
            <label>Business Nickname</label>
            <input id="aliasname" name="aliasname" value="<?php echo $service_providers[0]['aliasname'];?>"/>
        </div>
    </div>
    <div class="w100">
        <div class="greybtnwraper">
            <label>Registered or Licensed Business Name</label>
            <input id="legalname" name="legalname" value="<?php echo $service_providers[0]['primaryname'];?>"/>
        </div>
        <div class="greybtnwraper">
            <label>Company Founded Date</label>
            <input id="compfound_dt" name="compfound_dt" value="<?php echo $service_providers[0]['companyfounded_dt'];?>"/>
        </div>
    </div>
    <div class="b_btn">
        <div class="left"></div>
        <div class="mid"><input id="changecompanycode" type="button" value="CHANGE PASSWORD" onclick="$('#modal_change_password').dialog('open');"/></div>
        <div class="right"></div>
    </div>

    <div class="b_btn">
        <div class="left"></div>
        <div class="mid"><input type="submit" id="submit_contact" value="SAVE"/></div>
        <div class="right"></div>
    </div>

    <div id="error_provider_contact" style="color:red;font-weight:bold;"></div>
</form>
