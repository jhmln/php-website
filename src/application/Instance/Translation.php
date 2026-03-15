<?php
namespace Instance;

use File\CsvReader;

class Translation {
    private static $instance = null;
    private $translations = [];

    function __construct() {
        $csv = new CsvReader("../../static/translations/fi.csv");
        $items = [];

        foreach ($csv->data as $data) {
            $key = $data[0];
            $value = $data[1];

            $items[$key] = $value;
        }

        $this->translations = $items;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Translation();
        }

        return self::$instance;
    }

    public function get(string $key): string {
        $value = $this->translations[$key] ?? null;

        if ($value === null) {
            throw new \RunTimeException("Unknown translation key: \"".$key."\"");
        }

        return $value;
    }
}
?>