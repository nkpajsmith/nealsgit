<div class="modal-wrap">
    <div id="modal_change_password" class="modalwindow">
        <div class="modalwindow-bkg">
            <div class="modal-form-edit">
                <form id="form_change_password" method="POST" onsubmit="return update_provider_password($(this));">
                    <?php $qry_service_provider_password = pg_query_params("select companycode from techmatcher.serviceprovider where serviceprovider_id = $1", array($_SESSION['provider']['serviceprovider_id']));
                          $sp_old_password = pg_fetch_all($qry_service_provider_password);                          
                    ?>
                    <div class="row">
                        <label>Old Password</label>
                        <input type="password" id="old_password" name="old_password" value="<?php echo $sp_old_password[0]['companycode'];?>">
                    </div>

                    <div class="row">
                        <label>New Password</label>
                        <input type="password" id="new_password" name="new_password">
                    </div>

                    <div class="row">
                        <label>Repeat New Password</label>
                        <input type="password" id="rep_new_password" name="rep_new_password">
                    </div>

                    <div class="submit-row">
                        <input id="save_pass" type="submit" value="SUBMIT" class="btn" />
                    </div>
                    <div id="div_register_errors_savepass" style="margin:0px;"></div>

                </form>
            </div>
        </div>        
        <div class="modalwindow-btm"></div>
    </div>
</div>