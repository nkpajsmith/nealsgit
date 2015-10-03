<!-- modal window -->
<div class="modal-wrap">
    <div id="modal_forgot_pass" class="modalwindow"><div class="modalwindow-bkg">
            <!-- modal form -->
            <div class="modal-form-login">
                <h1>Please Enter Following Information. A randomly generated password will send to you in your email inbox.</h1>
                <form id='frm_forgot_pass' name="frm_login_popup" method="post" onsubmit="return forgot_password($(this));">
                    <!-- row -->																	<!-- row -->
                    <div class="row">
                        <label>Email Address</label>
                        <input id="email" name="email" type="text" class="txt" />
                    </div>
                    <div class="row">
                        <label>Captcha</label>
                        <img id="captcha1" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                    </div>
                    <div class="row">
                        <label>Enter the code above</label>
                        <input id="c2" class="txt" type="text" name="captcha_code" size="10" maxlength="6" />
                        <img border="0" align="bottom" onclick="document.getElementById('captcha1').src = 'secureimage/securimage_show.php?' + Math.random(); return false" alt="Refresh Image" src="images/refresh.gif"/>
                    </div>

                    <!-- submit row -->
                    <div class="submit-row">
                        <input id ="login_btn" type="submit" value="SUBMIT" class="btn" />
                    </div>
                    <div id="div_register_errors_fgpass" style="margin:0px;"></div>
                </form>
            </div>
        </div><div class="modalwindow-btm"></div></div>
</div>