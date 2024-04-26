<?php
    $conn = new mysqli("localhost","root","","animetienda");
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
    
?>
