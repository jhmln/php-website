<?php
namespace Instance;

use File\CsvReader;

require_once("UserSession.php");

class Translation {
    private static $instance = null;
    private $translations = [];

    protected function __construct() {
        $session = UserSession::getInstance();

        $csv = new CsvReader("../../static/translations/".$session->language.".csv");
        $items = [];

        foreach ($csv->data as $data) {
            $key = $data[0];
            $value = $data[1];

            $items[$key] = $value;
        }

        $this->translations = $items;
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new Translation();
        }

        return self::$instance;
    }

    public function get(string $key, ...$substrings): string {
        $value = $this->translations[$key] ?? null;

        if ($value === null) {
            throw new \RunTimeException("Unknown translation key: \"".$key."\"");
        }

        if (is_array($substrings)) {
            for ($index = 0; $index < count($substrings); $index++) {
                $value = str_replace("%".$index, $substrings[$index], $value);
            }
        }

        return $value;
    }
}
?>