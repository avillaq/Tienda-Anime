<?php
    require "PayPal-PHP-SDK/autoload.php";

    define("URL_SITIO","http://localhost/Tienda-Anime");
    
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            //Cliente id
            "ARfvAhsuVBGwM8UG2fveO3OZrvFjHW-7VNCcJDMi-f4Tx2cQTgtrXgcaciXdes-KnDum82_XyRQRieY0",
            //Secret
            "EAr-V6mRncaD4AZUCpugULXU7enjI5sZNYLw2NdzK4ysul5UEkBfRLtXaYAeikTbE5XNnFybz5UT4LLK"
        )
    );


?>