<?php 
    use Html\PageController;
    
    require_once("../../application/Html/PageController.php");
    
    $file = file_get_contents("feed.csv");
    $rows = explode(PHP_EOL, $file);
    
    $page = new PageController();
    $page->renderHeader("RSS Feed");
?>
<div class="list">
<?php
foreach ($rows as $row) {
    $uri = explode(";", $row)[1];    
    $rss = simplexml_load_file($uri);
    
    foreach ($rss->channel->item as $item)
    {   
        $title = $item->title;
        $link = $item->link; 
        echo "<div>";
        echo "<a href=\"".$link."\" target=\"_blank\" rel=\"noopener noreferrer\">".$title."</a>";
        echo "</div>";
    }
    
};
?>
</div>
<?php $page->renderFooter(); ?>