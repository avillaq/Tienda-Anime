<?php
    require_once dirname(dirname(__DIR__)) . "/config.php";

    $conn = new mysqli(
        getenv("DB_HOST"),
        getenv("DB_USER"), 
        getenv("DB_PASS"),
        getenv("DB_NAME")
    );
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
    
?>
