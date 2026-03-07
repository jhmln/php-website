<?php 
namespace File;

class CsvReader {
    public readonly array $header;
    public readonly array $data;
    
    function __construct(string $path, string $separator = ";", bool $firstRowIsHeader = true) {
        $file = file_get_contents($path);
        $rows = explode(PHP_EOL, $file);
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