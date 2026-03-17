<?php
namespace Instance;

class UserSession {
    private static $instance = null;
    public readonly string $language;

    protected function __construct($language) {
        $this->language = $language;
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new UserSession("fi");
        }

        return self::$instance;
    }
}
?>