<?php 
    use Html\Anchor;
    use Html\PageController;
    use Rss\RssFeedItem;
    
    require_once("../../application/Html/Anchor.php");
    require_once("../../application/Html/PageController.php");
    require_once("../../application/Rss/RssFeedItem.php");
    
    $file = file_get_contents("feed.csv");
    $rows = explode(PHP_EOL, $file);
    
    $page = new PageController();
    $page->renderHeader("RSS Feed");
?>
<div class="list">
<?php
    $items = [];

    foreach ($rows as $row) {
        $uri = explode(";", $row)[1];    
        $rss = simplexml_load_file($uri);
        
        foreach ($rss->channel->item as $item)
        {   
            $rssItem = new RssFeedItem(
                $item->title, 
                $item->link, 
                $item->description, 
                $item->guid, 
                $item->pubDate
            );
            
            array_push($items, $rssItem);
        }
    }
    
    usort($items, function($first, $second){
        return $first->publicationDateUnix < $second->publicationDateUnix;
    });
        
    foreach ($items as $item)
    {
        echo "<div>";
        $anchor = new Anchor($item->title, $item->link);
        $anchor->target = "_blank";
        $anchor->render();
        echo "</div>";
    }
?>
</div>
<?php $page->renderFooter(); ?>