<?php
namespace Html;

require_once("Menu.php");

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
        echo "  <body>";   
        echo "      <div style=\"max-width:1000px;margin:auto;height:calc(100% - 50px);margin-top:50px;padding:8px 32px;background-color:white;\">";
    }
    
    function renderFooter(): void {        
        echo "      </div>";
        (new Menu())->render();
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