<?php
$conexion = new mysqli("localhost", "root", ""/*contraseña */, "Primer_pag"/*nombre de la base de datos */, 3307/*puerto*/);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

echo "✅ Conectado exitosamente a la base de datos.";
?>
