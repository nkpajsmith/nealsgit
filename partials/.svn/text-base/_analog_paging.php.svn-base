<?php
session_start();
include '../dao/dbcon.php';
$consumer_id = $_SESSION['consumer']['itconsumer_id'];

//------------------------------------- Paging -------------------------------------------
$rowsPerPage = 1;
$pageNum = 1;
if (isset($_GET['page'])) {
    $pageNum = $_GET['page'];
}
$offset = ($pageNum - 1) * $rowsPerPage;
$qry5 = pg_query_params("select firstprompt.itconsumeranalog_id, firstprompt.itconsumeranalogdate, firstprompt.analog_text_header, firstprompt.analogtext
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
            and firstprompt.itconsumeranalogdate=secondprompt.itconsumeranalogdate", array($_SESSION['p1'], $_SESSION['p2'], $_SESSION['p3']));

$row = pg_num_rows($qry5);
$numrows = $row;
$maxPage = ceil($numrows / $rowsPerPage);
$self = $_SERVER['PHP_SELF'];

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
            and firstprompt.itconsumeranalogdate=secondprompt.itconsumeranalogdate LIMIT $4 OFFSET $5"
                , array($_SESSION['p1'], $_SESSION['p2'], $_SESSION['p3'], $rowsPerPage, $offset));

while ($result = pg_fetch_array($query)) {
?>
    <h3>Here&rsquo;s the picture we&rsquo;re getting&hellip;</h3>
    <h2><?php echo $result[2]; ?></h2>
    <div>
        <p ><?php echo $result[3]; ?></p>
        <input type="hidden" id="hidden_id1" value="<?php echo $result[0]; ?>"/>
        <input type="hidden" id="analog_id" value="<?php echo $result[0]; ?>"/>
        <input type="hidden" id="analog_date" value="<?php echo $result[1]; ?>"/>
        <input type="hidden" id="orgdetail_selected1" value="<?php echo $_SESSION['p1']; ?>"/>
    <input type="hidden" id="orgdetail_selected2" value="<?php echo $_SESSION['p2']; ?>"/>
<?php } ?>
</div>

<div id="select_status" style="margin:0px; color: red;"> </div>
<!-- call-out-choice -->
<div>
    <div style="float: left;">
        <input name ="yep-thats-me" type="button" id="yep-thats-me" onclick="select_analogs();" class="btn" value="Yep, that&rsquo;s me"/>
        <!-- choice-two-two -->
        <?php
        if ($numrows > 1) {
            if ($pageNum < $maxPage) {
                $page = $pageNum + 1;
        ?>
                <input style="margin-left: 10px;" name ="see_more" type="button" id="see-more-options" class="btn" value="See more options" onclick="analog_paging(<?php echo $page; ?>)"/>
<?php } else { ?>
                <input style="margin-left: 10px;" name ="see_more" type="button" id="see-more-options" class="btn" value="See more options" onclick="analog_paging(1)"/>
<?php }
        } ?>
    </div></div><!--/call-out-choice-->
