<?php 
    use Html\PageController;

    require_once("../application/Html/PageController.php");
    
    $page = new PageController();
    $page->renderHeader();
    echo "Hello world!";
    $page->renderFooter();
?>