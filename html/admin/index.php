<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Acceso</title>
    <link rel="stylesheet" href="../asserts/styles.css">
</head>
<body>
    <h1>Registros de Acceso</h1>

    <?php
    $log_file = '/var/log/user_access.log';

    // Verificar si el archivo de log existe
    if (!file_exists($log_file)) {
        echo "<p>No hay registros disponibles.</p>";
        exit;
    }

    // Leer las entradas del archivo de log
    $log_entries = file($log_file, FILE_IGNORE_NEW_LINES);

    // Renderizar la tabla
    echo "<table border='1'>";
    echo "<thead><tr><th>Fecha</th><th>Hora</th><th>Usuario</th><th>Correo</th><th>IP</th></tr></thead>";
    echo "<tbody>";
    foreach ($log_entries as $entry) {
        list($fecha, $hora, $user, $email, $ip) = explode(", ", $entry);
        echo "<tr><td>$fecha</td><td>$hora</td><td>$user</td><td>$email</td><td>$ip</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <footer>
        <p>&copy; Deyvid Rios - 2024. Sistema PKI.</p>
    </footer>
</body>
</html>
