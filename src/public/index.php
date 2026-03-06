<?php 
    use Html\Anchor;
    use Html\PageController;

    require_once("../application/Html/Anchor.php");
    require_once("../application/Html/PageController.php");
    
    $page = new PageController();
    $page->renderHeader();
    
    (new Anchor("RSS Feed", "/rss/feed.php"))->render();    
    
    $page->renderFooter();
?>