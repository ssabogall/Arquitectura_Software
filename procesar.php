<?php
// Conexión
$conexion = new mysqli("localhost", "root", "", "Primer_pag", 3307);

if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];

// Preparar consulta
$sql = "INSERT INTO usuario (nombre, correo) VALUES (?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("❌ Error en prepare(): " . $conexion->error);
}

$stmt->bind_param("ss", $nombre, $correo);

if ($stmt->execute()) {
    echo "✅ Datos guardados correctamente. ¡Gracias, $nombre!";
} else {
    echo "❌ Error al guardar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
