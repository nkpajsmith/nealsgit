<?php session_start();

include_once '../dao/dbcon.php'; ?>

<div id="summary">
<h4><span>Summary</span></h4>
<p> This is a list of the providers you have referred or who have listed you as a reference.  To report an error <a href="mailto:tm_support@techmatcher.com"> email support. </a></p>
<?php $qry = pg_query_params("select distinct(serviceprovider_id) from techmatcher.serviceprovidercustomerlinkhistory where itconsumer_id = $1 ORDER BY serviceprovider_id DESC", array($_SESSION['consumer']['itconsumer_id']));
while($result = pg_fetch_array($qry)) {
    $qry4=pg_query_params("select primaryname from techmatcher.serviceprovider where serviceprovider_id = $1",array($result['serviceprovider_id']));
    $result4= pg_fetch_all($qry4);
    ?>
<p> <?php echo $result4[0]['primaryname']; ?></p>
    <?php } ?>
</div>
