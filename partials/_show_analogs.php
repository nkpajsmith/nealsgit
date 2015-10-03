<?php session_start();
include '../dao/dbcon.php';

$arr = array();
$errors = "";
$prompt_1 = $_GET['p1'];
$prompt_2 = $_GET['p2'];
$prompt_3 = $_GET['p3'];
$_SESSION['p1']=$_GET['p1'];
$_SESSION['p2']=$_GET['p2'];
$_SESSION['p3']=$_GET['p3'];

//------------------------------------- Paging -------------------------------------------
$rowsPerPage = 1;
$pageNum = 1;
if(isset($_GET['page'])) {
    $pageNum = $_GET['page'];
}
$offset  = ($pageNum - 1) * $rowsPerPage;
$qry5 = pg_query_params("select firstprompt.itconsumeranalog_id, firstprompt.itconsumeranalogdate, firstprompt.analog_text_header, firstprompt.analogtext
            from
            (SELECT itconsumeranalog_id, itconsumeranalogdate,analog_text_header, analogtext, orgdetailcategory_sdesc
                FROM techmatcher.itconsumer_profile_selections
                where subscribertype_id=$1  -- this criteria shows what was selected in the first prompt
                and profileselectionorder=1 and orgdetail_id=$2 -- this criteria shows what was selected in the second prompt
            ) firstprompt
            ,(SELECT  itconsumeranalog_id, itconsumeranalogdate ,analog_text_header, analogtext, orgdetailcategory_sdesc
                FROM techmatcher.itconsumer_profile_selections
                where subscribertype_id=$1  -- this criteria shows what was selected in the first prompt
                and profileselectionorder=2 and orgdetail_id=$3 -- this criteria shows what was selected in the third promp
              )secondprompt
            where firstprompt.itconsumeranalog_id=secondprompt.itconsumeranalog_id and
            firstprompt.itconsumeranalogdate=secondprompt.itconsumeranalogdate", array($prompt_1,$prompt_2,$prompt_3));

$row     = pg_num_rows($qry5);
$numrows = $row;
$maxPage = ceil($numrows/$rowsPerPage);
$self    = $_SERVER['PHP_SELF'];

$query = pg_query_params("select firstprompt.itconsumeranalog_id, firstprompt.itconsumeranalogdate, firstprompt.analog_text_header, firstprompt.analogtext
                from
            (SELECT itconsumeranalog_id, itconsumeranalogdate,analog_text_header, analogtext, orgdetailcategory_sdesc
            FROM techmatcher.itconsumer_profile_selections
            where subscribertype_id=$1
            and profileselectionorder=1 and orgdetail_id=$2
            ) firstprompt
            ,(
            SELECT itconsumeranalog_id, itconsumeranalogdate,analog_text_header, analogtext, orgdetailcategory_sdesc
            FROM techmatcher.itconsumer_profile_selections
            where subscribertype_id=$1
            and profileselectionorder=2 and orgdetail_id=$3
            )secondprompt
            where firstprompt.itconsumeranalog_id=secondprompt.itconsumeranalog_id
            and firstprompt.itconsumeranalogdate=secondprompt.itconsumeranalogdate LIMIT $4 OFFSET $5",array($prompt_1,$prompt_2,$prompt_3,$rowsPerPage,$offset));

while($result = pg_fetch_array($query)) {
    ?>
<div id ="change" class="fw-section-inner" style="width: 487px;">
    <h3>Here&rsquo;s the picture we&rsquo;re getting&hellip;</h3>
    <h2><?php echo $result[2];?></h2>
    <div>
        <p><?php echo $result[3]; ?></p>
        <input type="hidden" id="analog_id" value="<?php echo $result[0]; ?>"/>
        <input type="hidden" id="analog_date" value="<?php echo $result[1]; ?>"/>
        <input type="hidden" id="orgdetail_selected1" value="<?php echo $prompt_1; ?>"/>
        <input type="hidden" id="orgdetail_selected2" value="<?php echo $prompt_2; ?>"/>
        <?php } ?>
    </div>

    <div id="select_status" style="margin:0px; color: red;"> </div>
    <!-- call-out-choice -->
    <div>
        <div style="float: left;">
            <input name ="yep-thats-me" type="button" id="yep-thats-me" onclick="select_analogs();" class="btn" value="Yep, that&rsquo;s me"/>
            <?php if($numrows >1) {
                    if ($pageNum > 1) {
                        $page = $pageNum - 1;?>
                        <input style="margin-left: 10px;" name ="see_more" type="button" id="see-more-options" class="btn" value="See more options" onclick="analog_paging(1)"/>
              <?php }else if ($pageNum < $maxPage) {
                        $page = $pageNum + 1;?>
                        <input style="margin-left: 10px;"name ="see_more" type="button" id="see-more-options" class="btn" value="See more options" onclick="analog_paging(<?php echo $page; ?>)"/>
              <?php }else {?>
                        <input style="margin-left: 10px;"name ="see_more" type="button" id="see-more-options" class="btn" value="See more options" onclick="analog_paging(1)"/>
              <?php }
           } ?>
        </div></div><!--/call-out-choice-->
</div>
