<?php
function loadEnv($path = null) {

    $envPath = $path ?? __DIR__ . "/.env";

    if (!file_exists($envPath)) {
        throw new Exception("El archivo.env no se encontró en: " . $envPath);
    }
    
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        if (strpos($line, "=") !== false && strpos(trim($line), "#") !== 0) {
            list($name, $value) = explode("=", $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            if (!array_key_exists($name, $_ENV)) {
                putenv(sprintf("%s=%s", $name, $value));
                $_ENV[$name] = $value;
            }
        }
    }
}
loadEnv();
?>