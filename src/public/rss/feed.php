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
    echo "<div>";
    echo $row;
    echo "</div>";
};
?>
</div>
<?php $page->renderFooter(); ?>