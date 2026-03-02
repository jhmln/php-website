<?php 
    use Html\PageController;

    require_once("../application/Html/PageController.php");
    
    $page = new PageController();
    $page->renderHeader("Error 404");
    
?>
<div class="container">
	<h1>404</h1>
	<h2>Page Not Found</h2>
	<p>The Page you are looking for doesn't exist or moved to other location. Go to <a href="/">Home Page.</a></p>
</div>
<?php $page->renderFooter();?>