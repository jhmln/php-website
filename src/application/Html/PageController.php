<?php
namespace Html;

class PageController {
    function renderHeader() {
        echo "<html>";
        echo "  <head>";
        echo "      <title>Hello world!</title>";
        echo "      <meta charset=\"UTF-8\">";
        echo "      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "      <link rel=\"stylesheet\" href=\"common.css\">";
        echo "  </head>";
        echo "  <body>";
    }
    
    function renderFooter() {
        echo "  </body>";
        echo "</html>";
    }
}
?>