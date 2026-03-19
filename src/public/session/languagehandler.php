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

    header("Location:".$_SERVER["HTTP_REFERER"]);
    exit();
?>