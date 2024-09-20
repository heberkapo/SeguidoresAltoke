<?php
session_start();

// Cambia estos valores por los datos reales del formulario de inicio de sesión
$nombre_de_usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$db_host = "localhost"; // Cambia esto según tu configuración
$db_nombre = "id21439578_wp_c6aae0a7e167caef8b5cd9252bcd4cec"; // Cambia por el nombre de tu base de datos
$db_usuario = "id21439578_wp_c6aae0a7e167caef8b5cd9252bcd4cec"; // Cambia por el usuario de tu base de datos
$db_contrasena = "2a39df5d095eac4649e1d200658881b5fe5c7782"; // Cambia por la contraseña de tu base de datos

$mysqli = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Ajusta la consulta SQL y la tabla de la base de datos según tu configuración real
$query = "SELECT id, username, password FROM usuarios WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $nombre_de_usuario);
$stmt->execute();
$stmt->bind_result($id, $username, $contrasena_en_bd);

if ($stmt->fetch() && $contrasena === $contrasena_en_bd) {
    // Las credenciales son válidas, crear una sesión
    $_SESSION["usuario"] = $nombre_de_usuario;
    // Redirigir al usuario a la página mostrar.php
    header("Location: mostrar.php");
    exit();
} else {
    // Las credenciales son incorrectas, mostrar un mensaje de error o redirigir a la página de inicio de sesión
    echo "Credenciales incorrectas. Intenta nuevamente.";
}

$stmt->close();
$mysqli->close();
?>
