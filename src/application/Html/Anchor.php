<?php 
namespace Html;

class Anchor {    
    public string $id = "";
    public string $class = "";
    public string $style = "";
    public string $href = "";
    public string $target = "_self";
    public string $innerText = "";
    
    public function __construct(string $text = "", string $url = "") {
        $this->href = $url;
        $this->innerText = $text;
    }
    
    public function render(): void {        
        echo $this->build();
    }

    public function toString(): string {
        return $this->build();
    }

    private function build(): string {
        $anchor = "<a";
        
        if (isset($this->id) && $this->id !== "") $anchor .= " id=\"".$this->toSafeString($this->id)."\"";
        if (isset($this->class) && $this->class !== "") $anchor .= " class=\"".$this->toSafeString($this->class)."\"";   
        if (isset($this->style)) $anchor .= " style=\"".$this->toSafeString($this->style)."\"";   
        if (isset($this->href)) $anchor .= " href=\"".$this->toSafeString($this->href)."\"";        
        if (isset($this->target) && $this->target === "_blank") {
            $anchor .= " target=\"".$this->toSafeString($this->target)."\" rel=\"noopener noreferrer\"";
        }
        
        $anchor .= ">";
        
        if (isset($this->innerText)) $anchor .= $this->toSafeString($this->innerText);
        
        $anchor .= "</a>";        
        return $anchor;
    }
    
    private function toSafeString(string $value): string {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

?>