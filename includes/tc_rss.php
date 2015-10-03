<?php
include_once "rss_fetch.inc";?>
 <div class="side-latest-blog">
<?php $rss = fetch_rss('http://feeds.feedburner.com/Techmatcher');
if ($rss) {
    //Split the array to show first 3
    $items = array_slice($rss->items, 0, 3);
    // Cycle through each item and echo
    foreach ($items as $item ) {
        echo '<h5><a href="'.$item['link'].'">'.$item['title'].'</a></h5>';
        echo '<br/>';
    }?>
<span class="more"><a href="http://blog.techmatcher.com">more &gt;</a></span>
    <?php }else {
    echo '<h2>Error:</h2><p>'.magpie_error().'</p>';
}
// Restore original error reporting value
@ini_restore('error_reporting');
?>
</div><!--/side-latest-blog-->