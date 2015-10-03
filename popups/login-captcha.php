<!-- modal window -->
                            <div class="modal-wrap">
                                <div id="modaltest_1" class="modalwindow"><div class="modalwindow-bkg">
                                        <!-- modal form -->
                                        <div class="modal-form-login-zip">
                                            <form id='frm_login_zip' name="frm_login_zip" method="post">

                                                <input type="hidden" id="keyword_hidden" name="keyword_hidden" value=""/>
                                                <!-- row -->
                                                <div class="row">
                                                    <label>Email Address</label>
                                                    <input id="email" name="email" type="text" class="txt" onblur="emailVerification(this.value);" />
                                                </div>
                                                <div id="passdiv" class="row" style="display:none;">
                                                    <label>Password</label>
                                                    <input id="pwd" name="pwd" type="password" class="txt"/>
                                                </div>
                                                <!-- row -->
                                                <div class="row">
                                                    <label>Captcha</label>
                                                    <img id="captcha" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                                                </div>
                                                <div class="row">
                                                    <label>Enter the code above</label>
                                                    <input id="c1" class="txt" type="text" name="captcha_code" size="10" maxlength="6" />
                                                    <img border="0" align="bottom" onclick="document.getElementById('captcha').src = 'secureimage/securimage_show.php?' + Math.random(); return false" alt="Refresh Image" src="images/refresh.gif"/>
                                                </div>

                                                <div id="error_desc"  style="color:red;font-weight:bold;"></div>
                                                <!-- submit row -->
                                                <div class="submit-row">
                                                    <input type="button" value="SUBMIT" class="btn" onclick="captcha_verification(document.getElementById('c1').value);"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div><div class="modalwindow-btm"></div></div>
                                    
                                     <script>
                                        function zipcode_value(){  $('#modaltest_1').dialog('open');           }
                                    </script>    