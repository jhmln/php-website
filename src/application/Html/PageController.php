<?php
namespace Html;

class PageController {
    function renderHeader($title = "Hello world!"): void {      
        $stylesheetPath = $this->buildPathToStyleSheet();
        
        echo "<html>";
        echo "  <head>";
        echo "      <title>".$title."</title>";
        echo "      <meta charset=\"UTF-8\">";
        echo "      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "      <link rel=\"stylesheet\" href=\"".$stylesheetPath."\">";
        echo "  </head>";
        echo "  <body style=\"max-width:1000px;margin:auto;\">";
        echo "      <div style=\"width:250px;display:inline-block;vertical-align:top;text-align:right;padding-top:80px;\">";
        echo "          <div>";
        echo "              <a href=\"/rss/feed.php\">RSS Feed</a>";
        echo "          </div>";
        echo "      </div>";
    }
    
    function renderFooter(): void {
        echo "  </body>";
        echo "</html>";
    }
    
    private function buildPathToStylesheet(): string {        
        $path = "";
        $uri = $_SERVER["REQUEST_URI"];
        
        for($i = 0; $i < substr_count($uri, "/") - 1; $i++) {
            $path .= "../"; 
        }              
        
        return $path."common.css";
    }
}
?>