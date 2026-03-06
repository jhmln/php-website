<?php 
namespace Html;

class Anchor {    
    public string $id;
    public string $class;
    public string $href = "";
    public string $target = "_self";
    public string $innerText;
    
    function __construct(string $text = "", string $url = "") {
        $this->href = $url;
        $this->innerText = $text;
    }
    
    function render(): void {
        $anchor = "<a";
        
        if (isset($this->id) && $this->id !== "") $anchor .= " id=\"".$this->id."\"";
        if (isset($this->class) && $this->id !== "") $anchor .= " class=\"".$this->class."\"";        
        if (isset($this->href)) $anchor .= " href=\"".$this->href."\"";        
        if (isset($this->target) && $this->target === "_blank") {
            $anchor .= " target=\"".$this->target."\" rel=\"noopener noreferrer\"";
        }
        
        $anchor .= ">";
        
        if (isset($this->innerText)) $anchor .= $this->innerText;
        
        $anchor .= "</a>";        
        echo $anchor;
    }
}

?>