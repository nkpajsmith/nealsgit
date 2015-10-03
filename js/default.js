function add_staff(){
    $("#hire_date").val("");
    $("#employee_name").val("");
    $("#div_staff_errors").html("");
    $("#modal_staff").dialog('open');
}

function change_servicez(addr_id){
    var address_id = "?value="+addr_id;
    $.ajax({
        type: "GET",
        url:  "../partials/_service_change_check.php" + address_id,

        success: function(html){            
            if(html == "OK"){                
                alert("All right, Your service has been deleted successfully!");
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_add_services.php",
                    success: function(result){
                        $('#tab_content').html(result);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $("#div_register_errors_2").html("");
        }
    });
    return false;
}

/******************Add Skills***********************/
function add_skill_value(frm,skillname){
    if(skillname=="" && frm == 1)
    {
        alert ("Please select a field");
        return false;
    }
    var querystring = "?currentvalue=" + frm + "&currentskill=" + skillname;
    $.ajax({
        type: "GET",
        url:  "../partials/_check_skill_adding.php" + querystring,
        success: function(html){
            document.getElementById('Skill_Set').innerHTML=html;
        }
    });
    return false;
}

function change_consumer_address(id_value){
    var value = "?value="+id_value;
    $.ajax({
        type: "GET",
        url:  "../partials/_consumer_address_change.php" +value,        

        success: function(html){
            if(html == "OK"){
                alert("OK , Your address has been deleted successfully!");
                $.ajax({
                    type: "POST",
                    url:  "../partials/_locations_reload.php",
                    success: function(result){
                        $('#tab-content').html(result);
                    }
                });
            }
        },
        error: function(){        
        },
        beforeSend: function(){
            $('#div_register_errors1').html("");        
        }
    });
    return false;
}

function add_consumer_address(frm)
{
    $.ajax({
        type: "GET",
        url:  "../partials/_add_consumer_address.php",
        data: frm.serialize(),      

        success: function(html){
            if(html == "OK")
            {
                $('#modal-consumer-address').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_locations_reload.php",
                    success: function(result){
                        $('#tab-content').html(result);
                    }
                });
            }
            else
            {
                $('#div_register_errors_2').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_2').html("");
        }
    });
    return false;
}

function add_provider_address(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_add_provider_address.php",
        data: frm.serialize(),

        success: function(html){            
            if(html == "OK"){
                $('#modal_add_address_sp').dialog('close');
                alert('Good Work! The new address has been added.');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_provider_locations.php",
                    success: function(result){
                        $('#locations_content').html(result);
                    }
                });
                show_spinner();
                setTimeout("Func1()",3000);
                location.reload(true);
            }else{
                $('#div_register_errors_sp1').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_sp1').html("");
        }
    });
    return false;
}
// for editing the consumer address
function edit_consumer_address(frm)
{
    $.ajax({
        type: "GET",
        url:  "../partials/_edit_consumer_address.php",
        data: frm.serialize(),
        
        success: function(html){            
            if(html == "OK"){
                $('#modal_edit').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_locations_reload.php",
                    success: function(result){
                        $('#tab-content').html(result);
                    }
                });
            }
            else
            {
                $('#div_register_errors_2').html(html);
            }
        }
    });
    return false;
}

// for editing the provider address
function edit_provider_address(frm)
{
    $.ajax({
        type: "POST",
        url:  "../partials/_edit_provider_address.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "OK"){
                $('#modal_provider_edit').dialog('close');
                alert('Terrific! Now your information is up to date.');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_provider_locations.php",
                    success: function(result){
                        $('#locations_content').html(result);
                    }
                });
            } else{
                $('#div_register_errors_sp2').html(html);
            }
        }
    });
    return false;
}

function services(frm)
{
    $.ajax({
        type: "GET",
        url:  "../partials/_check_add_services.php",
        data: frm.serialize(),
       
        success: function(html){
            if(html == "OK"){
                alert('Good Work!  The new service has been added');
                $('#modal_services').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_add_services.php",
                    success: function(result){
                        $('#tab_content').html(result);
                    }
                });
                show_spinner();
                setTimeout("Func1()",6000);
                location.reload(true);
            }else{
                $('#div_service_errorss').html(html);                
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_service_errorss').html("");
        }
    });
    return false;
}

function Func1()
{
return true;
}

function stafff(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_check_add_staff.php",
        data: frm.serialize(),
        
        success: function(html){            
            if(html == "OK"){
                $("#modal_staff").dialog("close");
                alert("Super!  The new staff has been added");
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_staff_skills.php",
                    success: function(result){
                        $("#skill_content").html(result);
                    }
                });
            }else{
                $('#div_staff_errors').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $("#div_staff_errors").html("");
        }
    });
    return false;
}
function referencee(frm)
{
    $.ajax({
        type: "POST",
        url:  "../partials/_check_add_reference.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "OK"){
                $('#modal_reference').dialog('close');
                alert('Thanks for the reference!')
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_provider_references.php",
                    success: function(result){
                        $('#tab_content').html(result);
                    }
                });
            }else{
                $('#div_reference_errors').html(html);            
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_reference_errors').html("");
        }
    });
    return false;
}

function changeCollapseImage(val)
{   
    if(document.getElementById(val).innerHTML == "CLICK TO CLOSE")
    {
        document.getElementById(val).innerHTML = "SHOW";
    }
    else
    {
        document.getElementById(val).innerHTML = "CLICK TO CLOSE";
    }
}

function confirmation(id_value) {
    var answer = confirm("Are you sure you want to Delete?");
    if (answer)
    {
        change_consumer_address(id_value);
    }
    else{}
}

function delete_provider_staff(staff_id){
    var querystring = "?staff_id=" + staff_id;
    $.ajax({
        type: "POST",
        url:  "../partials/_delete_staff.php" + querystring,

        success: function(html){
            document.getElementById('skill_content').innerHTML=html;
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;
}

function delete_provider_staff_confirmation(staff_id){
    var answer = confirm("Are you sure you want to Delete?");
    if (answer){
        delete_provider_staff(staff_id);
    }
}

function delete_provider_address(addr_id){
    var address_id = "?val="+addr_id;
    $.ajax({
        type: "GET",
        url:  "../partials/_delete_provider_address.php" + address_id,
       
        success: function(html){
            if(html == "OK"){
                alert("Got it! Your address has been deleted successfully!");
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_provider_locations.php",
                    success: function(result){
                        $('#locations_content').html(result);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_sp_loc1').html("");
        }
    });
    return false;
}

function delete_confirmation(add_id)
{
    var answer = confirm("Are you sure you want to Delete?");
    if (answer){
        delete_provider_address(add_id);
    }
}
function confirmation_new_service(value)
{
    var answer = confirm("Are you sure you want to Delete?");
    if (answer)
    {
        change_servicez(value);
    }    
}

function show_textbox1(param)
{
    if(param.checked){
        $('#geographic_details').show();
    }
    else{
        $('#geographic_details').hide();
        $('#show_county_zipcode').hide();

    }
}
function show_skillbox(param)
{
    if(param.checked){
        $('#skill_type').val("Skills For My Profile");
        $('#skills_sett').show();
    }
    else{
        $('#skills_sett').hide();
        $('#show_more_skills').hide();

    }
}

function show_services_dropdown(param)
{
    if(param.checked){
        $('#services_category_typ').val("Services For My Profile");
        $('#service_categories').show();
    }
    else{
        $('#service_categories').hide();
        $('#service_subcategories').hide();
    }
}

function show_skill_additional_box(param1)
{
    if(param1.value=="Search For A Specific Skill"){
        $('#show_more_skills2').show();
    }
    else{

        $('#show_more_skills').hide();
    }
}

function show_specific_services(param1)
{

    if(param1.value=="Search For A Specific Service"){
        $('#service_subcategories').show();
    }
    else{

        $('#service_subcategories').hide();
    }

}

function update_skill_level_box(param1)
{
    if(param1.value=="Search For A Specific Skill"){
        $('#show_more_skills').show();
    }
    else{

        $('#show_more_skills').hide();
    }

}

function show_newbox(param1)
{
    
    if(param1.value=="OtherValue"){
        $('#show_county_zipcode').show();
    }
    else{

        $('#show_county_zipcode').hide();
    }
    
}

function emailVerification(email){
    var querystring ="?email=" + email;
    $.ajax({
        type: "POST",
        url:  "partials/_check_email.php" + querystring,
        success: function(html){
            if(html == 'ok'){
                document.getElementById('passdiv').style.display = '';
            }else{
                document.getElementById('passdiv').style.display = 'none';
            }
        }
    });
    return false;
}

function edit_consumeraddress(id){
    //open popup
    $('#modal_edit').dialog('open');
    var query ="?id=" + id;
    $.ajax({
        type: "POST",
        url:  "../partials/_edit_consumer_address1.php" + query,
        success: function(html){           
            document.getElementById('afterajax').innerHTML=html;
        }
    });    
}
//for opening the edit dialogue of provider.
function open_edit_provider_address(id){
    $('#modal_provider_edit').dialog('open');
    var query ="?id=" + id;
    $.ajax({
        type: "POST",
        url:  "../partials/_edit_provider_address1.php" + query,
        success: function(html){           
            document.getElementById('afterloading').innerHTML=html;
        }
    });
}

function advance_search_records(page){
    var query ="?page=" + page;
    $.ajax({
        type: "POST",
        url:  "../partials/_advance_search_paging.php" + query,
        success: function(html){        
            document.getElementById('pageno').innerHTML=html;
        }        
    });
}

function all_provider_result(page){
    var query ="?page=" + page;
    $.ajax({
        type: "POST",
        url:  "../partials/_all_provider_results.php" + query,
        success: function(html){
            document.getElementById('pageno').innerHTML=html;
        }
    });
}


function open_login_dialog(){    
    //open popup
    $('#modal_login').dialog('open');
}
function open_video_dialog(){    
    //open popup
    $('#modal_video').dialog('open');
}
function open_login_provider_dialog(){
    //open popup
    $('#modal_login_provider').dialog('open');
}

function open_login_consumer_dialog(){
    //open popup   
    $('#modal_login_consumer').dialog('open');
}

function opn_login_new(){    
    $('.home-login').toggle("slow");
    return false;
}

function verify_consumer_login(frm)
{
    $.ajax({
        type: "GET",
        url:  "partials/_login_consumer.php",
        data: frm.serialize(),
        success: function(html){
            if(html == "OK1"){
                location.href="consumer/profile.php";//changed here
            }else{
                $('#div_register_errors_2').html(html);
            }
        },
        error: function(){            
        },
        beforeSend: function(){
            $('#div_register_errors_2').html("");
        }
    });
    return false;
}

function verify_provider_login(frm)
{
    $.ajax({
        type: "GET",
        url:  "partials/_login_provider.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "provider_home.php"){
                location.href="provider/provider_home.php";
            }else{
                $('#div_register_errors_3').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_3').html("");
        }
    });
    return false;
}

function show_spinner(){
    document.getElementById('main').style.filter ='alpha(opacity=60)';
    document.getElementById('main').style.opacity =.60;
    document.getElementById('load').style.display='';
    document.getElementById('main').style.display='';
}

function verify_login(frm)
{    
    $.ajax({
        type: "POST",
        url:  "partials/_login.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "both"){                
                $('#modal_both').dialog('open');               
            }else if(html == "subscribed"){
                show_spinner();
                location.href = "consumer/profile.php";//changed here
            }else if (html=="provider"){
                show_spinner();
                location.href= "provider/provider_home.php";                
            }else{
                $('#div_register_errors_1').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_1').html("");
        }
    });
    return false;
}

function verify_login_about(frm){
    $.ajax({
        type: "POST",
        url:  "partials/_login.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "both"){
                $('#modal_both').dialog('open');
            }else if(html == "subscribed"){
                location.href = "consumer/profile.php";//changed here
            }else if(html == "provider_profile.php"){
                location.href= "provider/provider_profile.php";
            }else if(html == "provider_home.php" || html == "provider"){
                location.href= "provider/provider_home.php";
            }else{
                $('#div_register_errors_1').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_1').html("");
        }
    });
    return false;
}

function verify_login_inner(frm){
    var con=confirm("This will log you out from current user and login as a new user. Do you want to continue?");
    if(con == true){
        $.ajax({
            type: "POST",
            url:  "../partials/_login.php",
            data: frm.serialize(),

            success: function(html){
                if(html == "both"){
                    $('#modal_both').dialog('open');
                }else if(html == "subscribed"){
                    location.href = "../consumer/profile.php";//changed here
                }else if(html == "provider_profile.php"){
                    location.href= "../provider/provider_profile.php";
                }else if(html == "provider_home.php" || html == "provider"){
                    location.href= "../provider/provider_home.php";
                }else{
                    $('#div_register_errors_1').html(html);
                }
            },
            error: function(){
            },
            beforeSend: function(){
                $('#div_register_errors_1').html("");
            }
        });
    }else{
        $('#modal_login').dialog('close');
    }
    return false;
}

function verify_login_zip(frm)
{
    $.ajax({
        type: "POST",
        url:  "partials/_login_zip.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "home"){
                location.href = "index.php";
            }else if(html == "search"){
                $.ajax({
                    type: "POST",
                    url:  "partials/_quick_search.php",
                    success: function(html1){
                        if(html1 == 'OK'){
                            location.href= "consumer/advance_search_results_5.php";
                        }else{
                            location.href = "consumer/error_reporting2.php";
                        }
                    }
                });
            }else{
                $('#div_register_errors_5').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_5').html("");
        }
    });
    return false;
}

function captcha_verification(code)
{
    var querystring ="?code=" + code;
    $.ajax({
        type: "POST",
        url:  "partials/_captcha_verification.php" + querystring,

        success: function(html){
            if(html == "OK"){
                var value1= document.getElementById('keyword').value;
                document.getElementById('keyword_hidden').value = value1;
                verify_login_zip($("#frm_login_zip"));
            }else{
                $('#error_desc').html(html);
            }
        },
        beforeSend: function(){
            $('#error_desc').html("");
        }
    });
    return false;
}

function open_signup_dialog(value){
    if(value == 1){
        var con=confirm("You have to signup before subscription. Do you want to signup?");
        if(con == true){
            $('#modal_signup').dialog('open');
        }
    }else if(value ==2){
        var value1 ="?value=" + value;
        $.ajax({
            type: "POST",
            url:  "../partials/_check_link_clicked.php" + value1,
            
            success: function(html){
                $('#modal_signup').dialog('open');
            }
        });
    }
}



function opn_signup_dialog(){
    $('#modal_signup').dialog('open');
}

function signup(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_signup.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "Email address is not valid!" || html == "Email already exist!"){
                $('#div_register_errors_6').html(html);
            }else{                
                 show_spinner();  
                 location.href = "../consumer/profile.php"; //changed here
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_6').html("");
        }
    });
    return false;
}

function redirect_user(frm)
{
    $.ajax({
        type: "GET",
        url:  "partials/_login_both.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "subscribed"){
                location.href = "consumer/profile.php"; // changed here
            }else if(html == "provider_home.php"){
                location.href = "provider/provider_home.php";
            }else if(html == "provider_profile.php"){
                location.href= "provider/provider_profile.php";
            }else{
                $('#div_register_errors_4').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_4').html("");
        }
    });
    return false;
}

//if no size then staff has only 1 paramere that is type of user
function get_analog_staffing1(p_1){
    var val_selected ="?p1=" + p_1;

    $.ajax({
        type: "GET",
        url:  "../partials/_show_analog_staffing_nosize.php" +val_selected,

        success: function(html){
            if(html == "OK"){
            }else{
                document.getElementById('basic-info-3').innerHTML= html;
            }
        },
        error: function(){
        },
        beforeSend: function(){
        //   $('#div_register_errors_3').html("");
        }
    });
    return false;
}

function show_analog_size(value){
    var val_selected ="?value=" + value;    
    $.ajax({
        type: "GET",
        url:  "../partials/_show_staffing.php" +val_selected,
       
        success: function(html){
            if(html == "OK"){
                get_analog_staffing1(value);
            }else{
                document.getElementById('basic-info-2').innerHTML= html;
            }
        },
        error: function(){
        },
        beforeSend: function(){
         
        }
    });
    return false;
}

function get_analog_staffing(p_2,p_1){
    var val_selected = "?p2=" + p_2 +"&p1="+p_1;    
    $.ajax({
        type: "GET",
        url:  "../partials/_show_analog_staffing.php" +val_selected,        

        success: function(html){
            if(html == "OK"){
                show_analogs(p_2,p_1);
            }else{
                document.getElementById('basic-info-3').innerHTML= html;
            }
        },
        error: function(){
        },
        beforeSend: function(){
        //   $('#div_register_errors_3').html("");
        }
    });
    return false;
}

function show_analogs1(p_2,p_1){
    var val_selected = "?p2=" + p_2 +"&p1="+p_1;    
    $.ajax({
        type: "GET",
        url:  "../partials/_show_analogs_nosize.php" +val_selected,

        success: function(html){
            document.getElementById('basic-info-4').innerHTML= html;
        },
        error: function(){
        },
        beforeSend: function(){
        //   $('#div_register_errors_3').html("");
        }
    });
    return false;
}
// when prompt 2 is empty
function show_analogs2(p_2,p_1){
    var val_selected = "?p2=" + p_2 +"&p1="+p_1;    
    $.ajax({
        type: "GET",
        url:  "../partials/_show_analogs_noresource.php" +val_selected,

        success: function(html){
            document.getElementById('basic-info-4').innerHTML= html;
        },
        error: function(){
        },
        beforeSend: function(){
        //   $('#div_register_errors_3').html("");
        }
    });
    return false;
}

function show_analogs(p_3,p_2,p_1){
    var val_selected = "?p3=" + p_3 +"&p2="+p_2+"&p1="+p_1;    
    $.ajax({
        type: "GET",
        url:  "../partials/_show_analogs.php" +val_selected,

        success: function(html){
            document.getElementById('basic-info-4').innerHTML= html;
        },
        error: function(){
        },
        beforeSend: function(){
        //   $('#div_register_errors_3').html("");
        }
    });
    return false;
}

function select_analogs(){
    a_id = document.getElementById('analog_id').value;
    a_date = document.getElementById('analog_date').value;
    orgdetail_selected1 = document.getElementById('orgdetail_selected1').value;
    orgdetail_selected2 = document.getElementById('orgdetail_selected2').value;
   
    var val_selected = "?a_id=" + a_id+"&a_date=" +a_date+"&orgdetail_selected1="+orgdetail_selected1+"&orgdetail_selected2="+orgdetail_selected2;
    $.ajax({
        type: "GET",
        url:  "../partials/_select_analogs.php" +val_selected,

        success: function(html){
            if(html == 'OK'){
                alert("Way to go!  Your profile is really shaping up!");
                document.getElementById('bck').style.display = 'block';
                document.getElementById('back_btn').style.display = 'block';
            }else{
        }
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;
}

function analog_paging(page){
    var query ="?page=" + page;
    $.ajax({
        type: "POST",
        url:  "../partials/_analog_paging.php" + query,
        success: function(html){            
            document.getElementById('change').innerHTML=html;
        }

    });
}

function consumer_subscription(){
    $('#address_types').val('');
    $('#amount').val('');
    $('#cctype').val('Visa');
    $('#cardnumber').val('');
    $('#cvmvalue').val('');
    $('#cardexpmonth').val('');
    $('#cardexpyear').val('');
    
    $('#subscription_modal').dialog('open');

}

function provider_subscription(){
    $('#address_types').val('');
    $('#amount').val('');
    $('#cctype').val('Visa');
    $('#cardnumber').val('');
    $('#cvmvalue').val('');
    $('#cardexpmonth').val('');
    $('#cardexpyear').val('');
    
    $('#subscription_modal').dialog('open');
}

function open_advance_search_dialog(){
    $('#modal_advance_search').dialog('open');
}

function open_free_search_dialog(){
    $('#modal_free_search').dialog('open');
}


///checking the status of subscription...
function verify_transaction(frm){    
    $.ajax({
        type: "POST",
        url:  "../partials/_validate_transaction.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "OK"){
                show_spinner();
                $.ajax({
                    type: "POST",                    
                    url:  "../partials/_subscription_.php",
                    data: frm.serialize(),

                    success: function(html){
                        $('#subscription_modal').dialog('close');
                        $('#subscription_status_modal').dialog('open');
                        document.getElementById("status_change").innerHTML = html;
                        setTimeout('location.reload(true)', 5000); // refresh is required here...10sec
                    }
                });            
            }else{
                $('#div_register_errors_7').html(html);
            }
        },
        error: function(){
            
        },
        beforeSend: function(){
            $('#div_register_errors_7').html("");
        }
    });
    return false;
}

// for services
function exclude_status1(param){
    var status= (param.checked != true) ? "include" : "exclude";
    alert ("The results will " + status + " Providers selected services.");
    if(param.checked){
        if(document.getElementById('services').checked){
            document.getElementById('services').checked = false;
        }
    }
}
// for skills
function exclude_status2(param){
    var status= (param.checked != true) ? "include" : "exclude";
    alert ("The results will " + status + " Providers selected skills.");
    if(param.checked){
        if(document.getElementById('skill_set').checked){
            document.getElementById('skill_set').checked = false;
        }
    }
}
// for geographic search
function exclude_status3(param){
    var status= (param.checked != true) ? "include" : "exclude";
    alert ("The results will " + status + " Providers in the selected geographic area.");
    if(param.checked){
        if(document.getElementById('geographic_search').checked){
            document.getElementById('geographic_search').checked = false;
        }
    }
}
// for provider ratings
function exclude_status4(param){
    var status= (param.checked != true) ? "include" : "exclude";
    alert ("The results will " + status + " Providers with Ratings.");
    if(param.checked){
        if(document.getElementById('provider_rating').checked){
            document.getElementById('provider_rating').checked = false;
        }
    }
}

function disable_popup(){   
    document.getElementById('bck').style.display = 'none';
    document.getElementById('back_btn').style.display = 'none';   
}

function submit_referrals(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_referrals_.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'OK'){
                alert("Thanks the referral. We'll get this provider added to our list");
                $.ajax({
                    type: "POST",
                    url:  "../partials/_referrals_count.php",
                    data: frm.serialize(),

                    success: function(html1){
                        $('#summary').html(html1);
                    }
                });
                $('#compname').val('');
                $('#address').val('');
                $('#city').val('');
                $('#state').val('');
                $('#zip').val('');
                $('#email').val('');
                $('#phone').val('');
            }else{
                $('#div_register_errors_ref').html(html);
            }            
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_ref').html("");
        }
    });
    return false;
}
// free match search method...
function free_search(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_free_search.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'OK') {
              document.getElementById('progress_bar').style.display = 'block';
            $('#modal_free_search').dialog('close'); 
             location.href = '../free_search_results.php';
            }else{
                $('#div_register_errors_fsearch').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_fsearch').html("");
        }
    });
    return false;
}
// advance search method...
function advance_search(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_advance_search.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'OK'){
                document.getElementById('progress_bar').style.display = 'block';
                $('#modal_advance_search').dialog('close');                
                $("#progressbar").progressbar({
                    value: 0
                });
                setTimeout(updateProgress, 50);
            }else{
                $('#div_register_errors_as').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_as').html("");
        }
    });
    return false;
}
//setting and updating progress bar values
function updateProgress() {
    var progress;
    progress = $("#progressbar")
    .progressbar("option","value");
    if (progress < 100) {
        $("#progressbar")
        .progressbar("option", "value", progress + 2);
        setTimeout(updateProgress, 50);
    }else{
        location.href = '/consumer/advance_search_results_5.php';
    }
}

function forgot_password(frm){   
    $.ajax({
        type: "POST",
        url:  "partials/_forgot_password.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'OK'){
                alert("We've created a new password and sent you a message.  Look in your mail for the details.");
                $('#modal_forgot_pass').dialog('close');
            }else{
                $('#div_register_errors_fgpass').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_fgpass').html("");
        }
    });
    return false;
}

function show_billing_panel(param){
    if(param.checked){
        $('#address').val('');
        $('#address2').val('');       
        $('#city').val('');
        $('#state').val('');
        $('#phone_ini').val('');
        $('#phone_mid').val('');
        $('#zip').val('');
        $('#phone_last').val('');
        document.frm_Subscription.bill_cb.disabled = true;        
    }
}

//------------------ some footer functions-------------------//

function to_about(){
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security, we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../about.php";
    }
}

function to_FAQ(){
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../FAQ.php";
    }
}

function to_tos(){ // terms of service
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../terms_of_service.php";
    }
}

function to_contactsales(){ // terms of service
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../contact_sales.php";
    }
}

function to_contactsupport(){ // terms of service
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../contactsupport.php";
    }
}

function to_contactsupport2(){ // terms of service
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../contact_support.php";
    }
}

function to_share_comment(){ // terms of service
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../share_a_comment.php";
    }
}

function to_index(){
    var ans = confirm("Just so you know, going to this page takes you away from your private area.  For your security,  we need to log you off.  Simply log in again to continue or hit cancel to stay right where you are");
    if(ans){
        location.href = "../index.php";
    }
}

function update_provider_password(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_update_service_provider_password.php",
        data: frm.serialize(),

        success: function(html){           
            if(html == "OK"){
                alert("Your new password has been saved");
                $('#modal_change_password').dialog('close');
            }else{
                $('#div_register_errors_savepass').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_register_errors_savepass').html("");
        }
    });
    return false;
}

function show_scroller(){
    $('.scroll-pane').jScrollPane({
        scrollbarWidth: 17,
        dragMinHeight: 42,
        dragMaxHeight: 42
    });
    $('.select-skills-columns').jScrollHorizontalPane({
        scrollbarHeight: 17,
        dragMinWidth: 42,
        dragMaxWidth: 42,
        wheelSpeed: 0
    });
}

function open_4_across_selector(value){
    $('#skillsmodal').dialog('open');
    var query ="?name=" + value;
    $.ajax({
        type: "POST",
        url:  "../partials/_selected_skills_options.php" + query,
        success: function(html){
            document.getElementById('skill_options').innerHTML=html;
            show_scroller();
        }
    });
}

function select_level1_value(value,skill_id){
    elem_id = value.id;
    var div_id = '#'+elem_id;
    var count = $('a[name=level1]').size();
    for(var i=0;i < count;i++){
        if(($('a[name=level1]')[i].id) == elem_id){
            $(div_id).addClass('selected');
            var query ="?skillid=" + skill_id;
            $.ajax({
                type: "GET",
                url:  "../partials/_show_level2_childs.php" + query,
                success: function(html){
                    document.getElementById('skills_level2').innerHTML=html;
                    show_scroller();
                }
            });
        }else{
            $('#level1_'+i).removeClass('selected');
        }
    }
}
// level 2 skills from skills level table
function select_level2_skills(value){
    elem_id = value.id;
    var div_id = '#'+elem_id;
    var count = $('a[name=level1]').size();
    for(var i=0;i < count;i++){
        if(($('a[name=level1]')[i].id) == elem_id){
            $(div_id).addClass('selected');
        }else{
            $('#level1_'+i).removeClass('selected');
        }
    }
}

function select_level2_value(value,skill_id){
    elem_id = value.id;
    var div_id = '#'+elem_id;
    var count = $('a[name=level2]').size();
    for(var i=0;i < count;i++){
        if(($('a[name=level2]')[i].id) == elem_id){
            $(div_id).addClass('selected');
            var query ="?skillid=" + skill_id;
            $.ajax({
                type: "GET",
                url:  "../partials/_show_level3_childs.php" + query,
                success: function(html){
                    document.getElementById('skills_level3').innerHTML=html;
                    show_scroller();
                }
            });
        }else{
            $('#level2_'+i).removeClass('selected');
        }
    }
}

function select_level3_value(value,skill_id){
    elem_id = value.id;
    var div_id = '#'+elem_id;
    var count = $('a[name=level3]').size();
    for(var i=0;i < count;i++){
        if(($('a[name=level3]')[i].id) == elem_id){
            $(div_id).addClass('selected');
            var query ="?skillid=" + skill_id;
            $.ajax({
                type: "GET",
                url:  "../partials/_show_level4_childs.php" + query,
                success: function(html){
                    document.getElementById('skills_level4').innerHTML=html;
                    show_scroller();
                }
            });
        }else{
            $('#level3_'+i).removeClass('selected');
        }
    }
}

function select_level4_value(value,skill_id){
    elem_id = value.id;
    var div_id = '#'+elem_id;
    var count = $('a[name=level4]').size();
    for(var i=0;i < count;i++){
        if(($('a[name=level4]')[i].id) == elem_id){
            $(div_id).addClass('selected');
            var query ="?skillid=" + skill_id;
            $.ajax({
                type: "GET",
                url:  "../partials/_show_level5_childs.php" + query,
                success: function(html){}
            });
        }else{
            $('#level4_'+i).removeClass('selected');
        }
    }
}


function add_staff_skills(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_add_staff_skills.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'duplicate key value violates unique constraint "key5"'){
                alert('Whoa, that skill is already in your skills list. Try adding a different one.');
            }else if(html == "OK"){
                var con=confirm("Way to go!  Skill Saved.  Do you want to add more skills?");
                if(con == true){
                    $('#skills_level2').html('');
                    $('#skills_level3').html('');
                    $('#skills_level4').html('');
                }else{
                    $('#skillsmodal').dialog('close');
                    $.ajax({
                        type: "POST",
                        url:  "../partials/_load_staff_skills.php",
                        success: function(result){
                            document.getElementById('skill_content').innerHTML=result;
                        }
                    });
                }
            }
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;
}
// for changing the service statement....
function change_service_statement(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_service_statement.php",
        data: frm.serialize(),

        success: function(html){
            if(html == 'UPDATE'){
                alert('Awesome!  Now your Service Statement is up to date.');
                $('#modal_modify_service_statement').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_add_services.php",
                    success: function(result){
                        $('#tab_content').html(result);
                    }
                });
            }else if(html == 'INSERT'){
                alert('Excellent!  Your Service Statement is recorded.');
                $('#modal_modify_service_statement').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_add_services.php",
                    success: function(result){
                        $('#tab_content').html(result);
                    }
                });
            }else{
                $('#div_service_statement_errors').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_service_statement_errors').html("");
        }
    });
    return false;    
}

function save_provider_contact(frm){    
    $.ajax({
        type: "POST",
        url:  "../partials/_change_provider_contact.php",
        data: frm.serialize(),

        success: function(html){            
            if(html == "OK"){
                alert('All set, records are up to date.');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_update_provider_contact_form.php",                    
                    success: function(html1){
                        $('#contact_info').html(html1);
                    }
                });
            }else{
                $('#error_provider_contact').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_line_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_line_chart.php",
        data: frm.serialize(),
        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");                
            }else if(html == "EXCEED"){
                open_CSV_dialog();
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_pie_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_pie_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_pie_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}
function change_servicepiechart_by_area(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_service_piechart_by_area.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_service_piechart_by_area_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_geo_chart(frm){    
    $.ajax({
        type: "POST",
        url:  "../partials/_change_geo_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            } else if(html == "EXCEED"){
                open_CSV_dialog();
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_geo_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function backtoanalytics(){
    location.href="analytics.php";
}

function backtoproviderhome(){
    location.href="provider_home.php";
}
function backtoglobalanalytics(){
    location.href = "../view_free_charts.php";
}

function downloadcsv(){
    location.href = "downloadcsv.php";
}

function change_skill_services_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_skills_services_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_skills_service_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_area_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_area_chart.php",
        data: frm.serialize(),

        success: function(html){           
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_area_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_popular_service_myarea_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_popular_service_myarea_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_popular_service_myarea_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_listed_type_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_listed_by_type_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_listed_by_type_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function change_competition_depth_chart(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_change_competition_depth_chart.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "NO RECORD"){
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }else if(html == "EXCEED"){
                open_CSV_dialog();
            }else{
                $.ajax({
                    type: "POST",
                    url:  "../partials/_change_competition_depth_chart_image.php",
                    success: function(html1){
                        $('#main_div').html(html1);
                    }
                });
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function open_subscription_confirmation(){
    $('#modal_confirmation').dialog('open');
}

function cancel_subscription(){
    $('#modal_confirmation').dialog('close');
}

function confirm_subscription(){
    $('#modal_confirmation').dialog('close');
    $('#subscription_modal').dialog('open');
}

function set_home_cookies(obj){    
    var id = obj.id;
    var querystring = "?id=" + id;
    $.ajax({
        type: "POST",
        url:  "../partials/_set_provider_home_cookie.php" + querystring,

        success: function(html){
            if(html == "home"){
                alert("This page is set as your default page");
                document.getElementById(id).disabled = true;
                document.getElementById("default-view-two").disabled = true;
            }else{
                alert("My Profile page is set as your default page");
                document.getElementById(id).disabled = true;
                document.getElementById("default-view-one").disabled = true;
            }
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;
}

// @todo have to change it somehow later
function set_focus(obj,cont){
    if(cont.length == obj.maxLength){
        $('.px22').focus();
    }
}
// @todo have to change it somehow later
function set_focus1(obj,cont){
    if(cont.length == obj.maxLength){
        $('.px35').focus();
    }
}

function change_focus(obj){
    var next_id = parseInt(obj.id)+1;
    var next_id_str = next_id += '';
    document.getElementById(next_id_str).focus();
}

function load_glob_stats_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_line_chart.php" + query,

        success: function(html){
            location.href= "../provider/global_statistics_results.php";            
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_service_pop_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_pie_chart.php" + query,        

        success: function(html){
            location.href= "../provider/service_popularity.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_geo_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_geo_chart.php" +query,

        success: function(html){
            location.href= "searches_by_geography.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_myarea_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_area_chart.php" +query,

        success: function(html){
            location.href= "looking_myarea.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_skills_services_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_skills_services_chart.php" +query,

        success: function(html){
            location.href= "detail_skills_services.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_pop_services_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_popular_service_myarea_chart.php" +query,

        success: function(html){
            location.href= "popular_services_myarea.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}



function load_pop_services_chart_by_area(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_service_piechart_by_area.php" +query,

        success: function(html){
            location.href= "service_popularity_by_area.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}
function load_bytype_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_listed_by_type_chart.php" +query,

        success: function(html){
            location.href= "listed_by_type.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function load_competition_depth_chart(data){
    var query = "?data=" + data;
    $.ajax({
        type: "POST",
        url:  "../partials/_change_competition_depth_chart.php" +query,

        success: function(html){
            location.href= "competition_depth.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function show_subscription_msg(path){
    var con=confirm("Um, Sorry to intrude, but access to this tool is restricted to subscribers.  Click OK to learn more about subscription options.   Click cancel to return to where you were.");
    if(con == true && path=="root"){
       location.href= "consumer/consumer_products.php";
    } else { location.href= "consumer_products.php"; }
}

function show_provider_subscription_msg(){
    var con=confirm("Um, Sorry to intrude, but access to this tool is restricted to subscribers.  Click OK to learn more about subscription options.   Click cancel to return to where you were.");
    if(con == true){
       location.href= "provider_products.php";
    }
}

function open_CSV_dialog(){
    $('#modal_csv').dialog('open');
}

function close_CSV_dialog(){
    $('#modal_csv').dialog('close');
}

function make_CSV(){
    $.ajax({
        type: "POST",
        url:  "../partials/_write_csv.php",

        success: function(html){
            var src = "../"+html;
            $('#here_link').attr('href',src);
            document.getElementById('download1').disabled = true;            
            document.getElementById('download_link').style.display = 'block';
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function make_CSV_ajax(chart_val){

    var ses_val = chart_val;
    
    if(document.getElementById('first_sele') != null){
        var date_range = document.getElementById('first_sele').value;
    }
    
    if(document.getElementById('geo_area') != null){
        var geo_area = document.getElementById('geo_area').value;
    }
    
    if(document.getElementById('org_type') != null){
        var org_type = document.getElementById('org_type').value;
    }
    if(document.getElementById('date_range')!=null && document.getElementById('first_sele') == null){
        var date_range = document.getElementById('date_range').value;
    }
    
    var qry_str = "?ses_val=" + ses_val + "&date_range=" + date_range + "&geo_area=" + geo_area + "&org_type=" + org_type;
    
    $.ajax({
        type: "POST",
        url:  "../partials/_write_csv2.php" + qry_str,

        success: function(html){
            if(html != 'NOT OK'){
                var src = ""+html;
                $('#here_link1').attr('href',src);
                document.getElementById('download2').disabled = true;
                document.getElementById('download_link1').style.display = 'block';
            }else{
                alert("Oops, We don't have any data for that search.  Please try again with a different option.");
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#error_provider_contact').html("");
        }
    });
    return false;
}

function open_edit_staff(id){
    $('#modal_staff_edit').dialog('open');
    var query ="?id=" + id;
    $.ajax({
        type: "POST",
        url:  "../partials/_edit_staff.php" + query,
        success: function(html){
            document.getElementById('afterloading_edit').innerHTML=html;
        }
    });
}

function update_staff(frm){
    $.ajax({
        type: "POST",
        url:  "../partials/_edit_staff1.php",
        data: frm.serialize(),

        success: function(html){
            html=$.trim(html); // trim if some space
            if(html == "OK"){
                $('#modal_staff_edit').dialog('close');
                $.ajax({
                    type: "POST",
                    url:  "../partials/_load_staff_skills.php",
                    success: function(result){
                        document.getElementById('skill_content').innerHTML=result;
                    }
                });
            }else{
                $('#div_staff_errors').html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $('#div_staff_errors').html("");
        }
    });
    return false;
}

function delete_skill(staffid,skillid){    
    var querystring = "?staff_id=" + staffid + "&skill_id=" + skillid;
    $.ajax({
        type: "POST",
        url:  "../partials/_delete_skills.php" + querystring,

        success: function(html){
            document.getElementById('skill_content').innerHTML=html;
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;
}

function open_csv_dialog(val){
    var querystring = "?chart_val=" + val;
    $.ajax({
        type: "POST",
        url:  "../partials/_open_csv_dialog.php" + querystring,

        success: function(html){
            $('#modal_csv2').dialog('open');
            $('#csv_dialog').html(html);
        },
        error: function(){
        },
        beforeSend: function(){
        }
    });
    return false;   
}

function feedback(frm){
    var answer = confirm("Thank you for your feedback.  We'll look it over.  Returning you to your profile page...");
    if (answer){
        $.ajax({
            type: "POST",
            url:  "../partials/_feedback.php",
            data: frm.serialize(),

            success: function(html){
                html=$.trim(html); // trim if some space
                if(html == "OK"){
                    location.href="../consumer/profile.php";//changed here
                //$("#feedback_msg").html("Thankyou for your feedback");
                //$("#feedback_type").html("");
                // $("#feedback_comment").html("");
                }else{
            //$('#feedback_msg').html(html);
            }
            },
            error: function(){
            },
            beforeSend: function(){
                $("#feedback_msg").html("");
            }
        });
        return false;
    }else{
        alert("Feedback Cancelled");
    }    
}

function feedback_provider(frm){
    var answer = confirm("Thank you for your feedback.  We'll look it over.  Returning you to your profile page...");
    if (answer){
        $.ajax({
            type: "POST",
            url:  "../partials/_feedback.php",
            data: frm.serialize(),

            success: function(html){
                html=$.trim(html); // trim if some space
                if(html == "OK"){
                    location.href="../provider/provider_profile.php";
                }else{
            //$('#feedback_msg').html(html);
            }
            },
            error: function(){
            },
            beforeSend: function(){
                $("#feedback_msg").html("");
            }
        });
        return false;
    }else{
        alert("Feedback Cancelled");
    }
}

function open_service_statement_dialog(){
    $('#serv_stat').val("");
    $('#modal_modify_service_statement').dialog('open');
}

function open_add_new_services_dialog(){
    $("#service_names").val("");
    $("#service_description").val("");
    $("#div_service_errorss").html("");
    $("#modal_services").dialog("open");
}

function add_reference(){
    $("#div_reference_errors").html("");
    $("#reference_email").val("");
    $("#reference_name").val("");
    $("#div_reference_errors").html("");
    $("#modal_reference").dialog("open");
}

function open_add_consumer_address_dialog(){
    $("#address_line1").val("");
    $("#address_line2").val("");
    $("#city").val("");
    $("#state").val("");
    $("#zip_code").val("");
    $("#phone_ini").val("");
    $("#phone_mid").val("");
    $("#phone_last").val("");
    $("#address_types").val("");
    $("#modal-consumer-address").dialog("open");
}

function open_change_pwd_dialog(){
    $("#new_password").val("");
    $("#rep_new_password").val("");
    $("#modal_change_password").dialog("open");
}

function enable_button(param){
    if(param.checked){
        document.getElementById('con_sub_submit').disabled = false;
        document.getElementById('con_sub_submit').className ="btn";
    }else{
        document.getElementById('con_sub_submit').disabled = true;
        document.getElementById('con_sub_submit').className ="btn_disabled";
    }
}

function unlock_provider(frm){  
    $.ajax({
        type: "POST",
        url:  "partials/_unlock_provider.php",
        data: frm.serialize(),

        success: function(html){
            if(html == "OK"){
                location.href = "provider/provider_home.php";
            }else{
                $("#unlock_err_msg").html(html);
            }
        },
        error: function(){
        },
        beforeSend: function(){
            $("#unlock_err_msg").html("");
        }
    });
    return false;
}

function logout(){
     $.ajax({
        type: "POST",
        url:  "../partials/_logout.php",

        success: function(html){
                location.href = "../index.php";
        },
        error: function(){
        },
        beforeSend: function(){
            $("#unlock_err_msg").html("");
        }
    });
    return false;
}

function showhideadvancedsearch(element) {
    if (document.getElementById(element).style.visibility == "hidden")
    {
      document.getElementById(element).style.visibility = "visible";
      document.getElementById(element).style.display = "block"
    }
    else
    {
      document.getElementById(element).style.visibility = "hidden";
      document.getElementById(element).style.display = "none"
    }
  }
  