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

    public function __toString(): string {
        return $this->build();
    }

    private function build(): string {
        $anchor = "<a";
        
        if ($this->id !== "") $anchor .= " id=\"".$this->toSafeString($this->id)."\"";
        if ($this->class !== "") $anchor .= " class=\"".$this->toSafeString($this->class)."\"";   
        if ($this->style !== "") $anchor .= " style=\"".$this->toSafeString($this->style)."\"";   
        if ($this->href !== "") $anchor .= " href=\"".$this->toSafeString($this->href)."\"";                
        if ($this->target === "_blank") {
            $anchor .= " target=\"".$this->toSafeString($this->target)."\" rel=\"noopener noreferrer\"";
        }
        
        $anchor .= ">";        
        $anchor .= $this->toSafeString($this->innerText);            
        $anchor .= "</a>";        
        return $anchor;
    }
    
    private function toSafeString(string $value): string {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}

?>