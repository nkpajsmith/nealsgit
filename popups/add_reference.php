<!-- modal window -->
<div class="modal-wrap">
    <div id="modal_reference" class="modalwindow"><div class="modalwindow-bkg">
            <!-- modal form -->
            <div class="modal-form-reference">
                <form name="reference" id="adding_reference" method="post" onsubmit="return referencee($(this));">
                    <table width="90%" border="0" cellspacing="2" cellpadding="5" align="center">

                        <tr>
                            <td align="right"><strong>Reference name*</strong></td>
                            <td><input type="text" name="reference_name" id="reference_name" class="txtfildpopup" /></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Reference email*</strong></td>
                            <td><input type="text" name="reference_email" id="reference_email" class="txtfildpopup" /></td>
                        </tr>

                        <tr>
                            <td align="right">&nbsp;</td>
                            <td>

                                <input id="add_address_btn" type="submit" value="SUBMIT" class="btn">

                            </td>
                        </tr>
                    </table>
                    <div id="div_reference_errors" class="errordiv" style="margin:0px; color: red;"></div>
                </form>
            </div>
        </div><div class="modalwindow-btm"></div></div>
</div>