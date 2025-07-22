<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario simple</title>
</head>
<body>
    <h2>Ingresa tus datos</h2>

    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
