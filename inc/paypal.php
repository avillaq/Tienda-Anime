<?php
    require_once dirname(__DIR__) . "/config.php";
    require "PayPal-PHP-SDK/autoload.php";

    define("URL_SITIO","http://localhost/Tienda-Anime");
    
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            //Cliente id
            getenv("PAYPAL_CLIENT_ID"),
            //Secret
            getenv("PAYPAL_CLIENT_SECRET")
        )
    );

?>