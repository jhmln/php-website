<?php 
namespace Html;

use Instance\Translation;

require_once(__DIR__."/Anchor.php");
require_once(__DIR__."/../Instance/Translation.php");

class Menu {
    public function render(): void {
        echo "<div style=\"position:fixed;top:0;left:0;width:100%;background-color:#797979;\">";
        
        $translations = Translation::GetInstance();

        echo "<table style=\"width:100%;\">";
        echo "<tbody>";
        echo "<tr>";
        echo "<td style=\"width:100%;padding:0;\">";
        $this->createAnchor($translations->get("menu.home"), "/");
        $this->createAnchor($translations->get("rss.feed"), "/rss/feed.php");
        echo "</td>";
        
        $handlerPath = $this->buildPathToHandler();
        $this->createLanguageButton($handlerPath, "fi");
        $this->createLanguageButton($handlerPath, "en");

        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        
        echo "</div>";
    }
    
    private function createAnchor($text, $url): void {        
        $style = "display:inline-block;";
        $style .= "padding:16px;";
        $style .= "min-width:100px;";
        $style .= "text-align:center;";
        
        $anchor = new Anchor($text, $url);
        $anchor->style = $style;
        $anchor->render();
    }

    private function buildPathToHandler(): string {        
        $path = "";
        $uri = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH) ?? "/";
        
        for($i = 0; $i < substr_count($uri, "/") - 1; $i++) {
            $path .= "../"; 
        }              
        
        return $path."session/languagehandler.php";
    }

    private function createLanguageButton(string $actionPath, string $value): void {
        echo "<td style=\"padding-right:16px\">";
        echo "<form method=\"post\" action=\"".$actionPath."\">";
        echo "<input type=\"submit\" name=\"language\" value=\"".$value."\" />";
        echo "</form>";
        echo "</td>";
    }
}
    
?>