<!-- modal window -->
<div class="modal-wrap">
    <div id="modal_signup" class="modalwindow"><div class="modalwindow-bkg">
            <!-- modal form -->
            <div class="modal-form-signup">
                <h1>Welcome to Techmatcher!   To begin, we need to create your account login.  Please sign up.</h1>
                <form id="frm_signup_consumer" name="frm_signup_consumer" method="post" onsubmit="return signup($(this));">                    
                    <table border="0" cellspacing="2" cellpadding="2" align="center">
                        <tr>
                            <td rowspan="2" align="right">&nbsp;</td>
                            <td align="left"><input name="usertype" type="radio" id="usertype" value="100" checked>
                                Individual or Family</td>
                        </tr>
                        <tr>
                            <td align="left"><input type="radio" name="usertype" id="usertype" value="300">
                                Commercial Customer/Business</td>
                        </tr>
                        <tr>
                            <td align="right">Name&nbsp;</td>
                            <td align="left"><input name="name" type="text" id="name" style="height:22px;width:150px;" /></td>
                        </tr>
                        <tr>
                            <td align="right">Email&nbsp;</td>
                            <td align="left"><input name="email" type="text" id="email" style="height:22px;width:150px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Password&nbsp;</td>
                            <td align="left"><input name="password" type="password" id="password" style="height:22px;width:150px;" /></td>
                        </tr>
                        <tr>
                            <td align="right">Re-type Password&nbsp;</td>
                            <td align="left"><input name="retype_password" type="password" id="retype_password" style="height:22px;width:150px;" /></td>
                        </tr>
                        <tr>
                            <td align="right">&nbsp;</td>
                            <td align="left"><input class="btn" type="submit" name="submit" id="submit" value="SUBMIT"/></td>
                        </tr>
                    </table>
                    <div id="div_register_errors_6" style="margin:10px; color: red; font-weight:bold;"></div>
                        
                </form>
                <?php //unset($_SESSION['email'])?>
            </div>
        </div><div class="modalwindow-btm"></div></div>
</div>