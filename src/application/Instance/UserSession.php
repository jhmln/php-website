<?php
namespace Instance;

class UserSession {
    const SESSION_STARTED = true;
    const SESSION_NOT_STARTED = false;

    private $sessionState = self::SESSION_NOT_STARTED;
    private static $instance = null;

    protected function __construct() {
    }

    public static function getInstance(): self {
        if (!isset(self::$instance))
        {
            self::$instance = new self;
        }
        
        self::$instance->startSession();
        
        return self::$instance;
    }

    public function __set($name, $value): void {
        $_SESSION[$name] = $value;
    }

    public function __get($name): mixed {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return null;
    }

    public function __isset($name): bool {
        return isset($_SESSION[$name]);
    }

    private function startSession(): bool {
        if ($this->sessionState == self::SESSION_NOT_STARTED)
        {
            $this->sessionState = session_start();
        }
        
        return $this->sessionState;
    }

    public function destroy(): bool
    {
        if ($this->sessionState == self::SESSION_STARTED)
        {
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            
            return !$this->sessionState;
        }
        
        return false;
    }
}
?>