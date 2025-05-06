<?php
require 'db_init.php'; // Este define $conn con mysqli

// Insertar en item_types
$sql = "INSERT INTO item_types (name, description, type, rarity, value) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $desc, $type, $rarity, $value);

// Datos de prueba
$name = 'Espada básica';
$desc = 'Espada de prueba para jugador';
$type = 'weapon';
$rarity = 'common';
$value = 50;

if ($stmt->execute()) {
    $item_type_id = $conn->insert_id;

    // Insertar en player_items
    $sql2 = "INSERT INTO player_items (player_id, item_type_id, quantity) VALUES (?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("iii", $player_id, $item_type_id, $quantity);

    $player_id = 1; // Asegúrate de que exista este ID en la tabla players
    $quantity = 2;

    if ($stmt2->execute()) {
        echo "Objetos insertados correctamente.";
    } else {
        echo "Error al insertar en player_items: " . $stmt2->error;
    }
} else {
    echo "Error al insertar en item_types: " . $stmt->error;
}

// pa conectar: http://localhost/DAM-vibe-php-main/Test_insertar_items.php
?>
