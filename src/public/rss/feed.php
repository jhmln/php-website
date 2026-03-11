<?php 
    use File\CsvReader;
    use Html\Anchor;
    use Html\PageController;
    use Rss\RssFeedItem;
    
    require_once("../../application/File/CsvReader.php");
    require_once("../../application/Html/Anchor.php");
    require_once("../../application/Html/PageController.php");
    require_once("../../application/Rss/RssFeedItem.php");       
    
    $page = new PageController();
    $page->renderHeader("RSS Feed");
?>
<div>
<h1>RSS Feed</h1>
<div class="list">
	<ul>
<?php
    $csv = new CsvReader("feed.csv");
    $items = [];

    foreach ($csv->data as $data) {
        $uri = $data[1];    
        $rss = simplexml_load_file($uri);
        
        foreach ($rss->channel->item as $item)
        {   
            $rssItem = new RssFeedItem(
                $rss->channel->title,
                $rss->channel->link,
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
        echo "<li>";
        echo "  <span>";
        
        echo "      <div>";
        $anchor = new Anchor($item->title, $item->link);
        $anchor->target = "_blank";
        $anchor->render();
        echo "      </div>";
        
        echo "      <div>";
        echo "Source: ";
        $source = new Anchor($item->source, $item->sourceLink);
        $source->target = "_blank";
        $source->render();
        echo ", Published: ".$item->publicationDate->setTimezone(new DateTimeZone("Europe/Helsinki"))->format("d.m.Y H:i");
        echo "      </div>";
        
        echo "  </span>";
        echo "</li>";
    }
?>
	</ul>
</div>
</div>
<?php $page->renderFooter(); ?>