<?php
namespace Html;

class PageController {
    function renderHeader($title = "Hello world!") {      
        $stylesheetPath = $this->buildPathToStyleSheet();
        
        echo "<html>";
        echo "  <head>";
        echo "      <title>".$title."</title>";
        echo "      <meta charset=\"UTF-8\">";
        echo "      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "      <link rel=\"stylesheet\" href=\"".$stylesheetPath."\">";
        echo "  </head>";
        echo "  <body>";
    }
    
    function renderFooter() {
        echo "  </body>";
        echo "</html>";
    }
    
    private function buildPathToStylesheet() {        
        $path = "";
        $uri = $_SERVER["REQUEST_URI"];
        
        for($i = 0; $i < substr_count($uri, "/") - 1; $i++) {
            $path .= "../"; 
        }              
        
        return $path."common.css";
    }
}
?>