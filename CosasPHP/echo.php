<?php
echo 'Salida por pantalla' . PHP_EOL;

$variable = 'Salida por pantalla con variable' . '\n';
echo $variable;

$edad = 18;

if ($edad >= 18) {
    echo "Mayor de edad con $edad años" . '\n';
} else {
    echo "Menor de edad con $edad años" . '\n';
}

function saludar($nombre)
{
    return "Hola, $nombre";
}

echo saludar("paco");

// http://localhost/CosasPHP/echo.php

?>

