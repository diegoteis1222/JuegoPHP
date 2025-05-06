<?php
require_once 'db_init.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "
    SELECT pi.id, it.name, pi.quantity, pi.acquired_at
    FROM player_items pi
    JOIN item_types it ON pi.item_type_id = it.id
    WHERE pi.player_id = ?
";

// Preparar la consulta
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Asignar el player_id
$player_id = 1; // Cambia esto según el jugador que desees consultar
$stmt->bind_param("i", $player_id);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Obtener los resultados
    $result = $stmt->get_result();

    // Mostrar los resultados
    while ($row = $result->fetch_assoc()) {
        echo "Objeto: {$row['name']} - Cantidad: {$row['quantity']} - Fecha: {$row['acquired_at']}<br>";
    }
} else {
    echo "Error al ejecutar la consulta: " . $stmt->error;
}

// Cerrar la consulta y la conexión
$stmt->close();
$conn->close();

// pa conectar : http://localhost/DAM-vibe-php-main/Test_ver_items.php
?>

