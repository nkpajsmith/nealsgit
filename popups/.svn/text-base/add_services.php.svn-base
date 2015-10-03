<!-- modal window -->
<div class="modal-wrap">
    <div id="modal_services" class="modalwindow"><div class="modalwindow-bkg">
            <!-- modal form -->
            <div class="modal-form-services">
                <form name="service" id="adding_service" method="post" onsubmit="return services($(this));">
                    <table width="90%" border="0" cellspacing="2" cellpadding="5" align="center">
                        <tr>
                            <td width="31%" align="right"><strong>Service type</strong></td>
                            <td><select name="service_types" id="service_typess" style="width:155px;">
                                    <?php
                                    $servicez = getservicecategorytypes();
                                    foreach($servicez as $name) {
                                        echo "<option value='{$name['servicecategory_id']}' >".$name['servicecategoryname']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Service Name</strong></td>
                            <td><input type="text" name="service_name" id="service_names"/></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Service Description</strong></td>
                            <td><textarea id="service_description"  name="service_description" rows="10" cols ="17"> </textarea></td>
                        </tr>

                        <tr>
                            <td align="right">&nbsp;</td>
                            <td>
                                <input id="add_services_btn" type="submit" value="SUBMIT" class="btn">
                            </td>
                        </tr>
                    </table>
                    <div id="div_service_errorss" class="errordiv" style="margin:0px; color: red;"></div>
                </form>
            </div>
        </div><div class="modalwindow-btm"></div></div>
</div>
<!-- Modal popup.....Add Address Popup-->