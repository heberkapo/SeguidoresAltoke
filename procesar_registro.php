<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $contacto = $_POST["contacto"];

    // Crear una cadena de datos
    $datos_registro = "Usuario: $usuario\nContraseña: $contrasena\nNúmero de Contacto: $contacto\n\n";

    // Ruta al archivo de texto donde se almacenarán los datos
    $archivo = "registros.txt";

    // Abrir el archivo en modo escritura (append)
    if (file_put_contents($archivo, $datos_registro, FILE_APPEND | LOCK_EX)) {
        // Redirigir al usuario a otra página después del registro exitoso
        header("Location: otra_pagina.html");
        exit;
    } else {
        echo "<h2>Error al almacenar los datos.</h2>";
    }
} else {
    echo "<h2>Error en el envío del formulario</h2>";
}
?>
