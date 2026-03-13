<?php 
namespace File;

class CsvReader {
    public readonly array $header;
    public readonly array $data;
    
    public function __construct(string $path, string $separator = ";", bool $firstRowIsHeader = true) {
        $file = file_get_contents($path);
        
        if ($file === false) {
            throw new \RuntimeException("Failed to read file: " . $path);
        }    
        
        $normalizedFile = str_replace(["\r\n", "\r"], "\n", $file);
        $allRows = explode("\n", $normalizedFile);
        $rows = array_filter($allRows, fn($row) => $row !== '');
        $rowIndex = 0;
        $data = [];
        
        foreach ($rows as $row) {
            $values = explode($separator, $row);
            
            if ($rowIndex === 0) {
                if ($firstRowIsHeader) {
                    $this->header = $values;
                }
                else {
                    $this->header = [];
                    array_push($data, $values);
                }
            }
            else {
                array_push($data, $values);
            }            
            
            $rowIndex++;
        }
        
        $this->data = $data;
    }      
}

?>