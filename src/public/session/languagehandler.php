<?php
    use Instance\UserSession;
    
    require_once("../../application/Instance/UserSession.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["language"])) {
        $language = $_POST["language"];
        
        if ($language == "fi" || $language == "en") {
            $session = UserSession::getInstance();
            $session->language = $language;
        }
    }

    $redirect = "/";
    
    if (isset($_SERVER["HTTP_REFERER"])) {
        $parts = parse_url($_SERVER["HTTP_REFERER"]);
        $isSameHost = is_array($parts) && ($parts["host"] ?? "") === ($_SERVER["HTTP_HOST"] ?? "");

        if ($isSameHost && isset($parts["path"]) && str_starts_with($parts["path"], "/")) {
            $redirect = $parts["path"];

            if (isset($parts["query"])) {
                $redirect .= "?".$parts["query"];
            }
        }
    }

    header("Location: ".$redirect);
    exit();
?>