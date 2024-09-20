<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $mensaje = $_POST["message"];

    // Almacenar los datos en un archivo de texto (se puede personalizar)
    $archivo = "contacto_datos.txt";
    $contenido = "Nombre: $nombre\nCorreo Electrónico: $email\nMensaje: $mensaje\n\n";

    if (file_put_contents($archivo, $contenido, FILE_APPEND) !== false) {
        echo "Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Error al procesar el formulario. Inténtalo de nuevo.";
    }
}
?>
