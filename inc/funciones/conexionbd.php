<?php
    $conn = new mysqli("localhost","root","","tiendaanime");
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
    
?>
