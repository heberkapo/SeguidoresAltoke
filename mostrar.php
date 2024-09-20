<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: index.html");
    exit();
}

// El usuario ha iniciado sesión, aquí puedes mostrar los datos protegidos
?>

<?php
// Leer el contenido del archivo contacto_datos.txt
$archivo = "contacto_datos.txt";
$contenido = file_get_contents($archivo);

// Separar los formularios basados en saltos de línea
$formularios = explode("\n\n", $contenido);

// Mostrar cada formulario
foreach ($formularios as $formulario) {
    $parrafos = explode("\n", $formulario);

    echo "<div class='formulario'>";
    $lineas = count($parrafos);
    for ($i = 0; $i < $lineas; $i++) {
        echo "<p>" . nl2br(htmlspecialchars($parrafos[$i])) . "</p>";

        // Insertar línea de guiones cada 3 líneas
        if (($i + 1) % 3 === 0 && $i < $lineas - 1) {
            echo "<p>-----------------------------</p>";
        }
    }
    echo "</div>";
}
?>

<?php
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: login.html");
exit();
?>
