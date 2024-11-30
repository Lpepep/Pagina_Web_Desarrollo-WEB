<?php
include("conexion.php");

// Verifica si el formulario fue enviado
if (isset($_POST["register"])) {
    // Valida que todos los campos tengan contenido
    if (
        strlen($_POST["name"]) >= 1 &&
        strlen($_POST["email"]) >= 1 &&
        strlen($_POST["direction"]) >= 1 &&
        strlen($_POST["phone"]) >= 1 &&
        strlen($_POST["password"]) >= 1
    ) {
        // Limpia y prepara los datos
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $direction = trim($_POST["direction"]);
        $phone = trim($_POST["phone"]);
        $password = trim($_POST["password"]);
        $fecha = date("Y-m-d"); // Formato estándar para MySQL

        // Crea la consulta SQL
        $consulta = "INSERT INTO datos (nombre, email, direccion, telefono, contraseña, fecha) 
                     VALUES ('$name', '$email', '$direction', '$phone', '$password', '$fecha')";

        // Ejecuta la consulta y verifica el resultado
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            echo '<h3 class="success">Tu registro se ha completado</h3>';
        } else {
            // Muestra el error de MySQL para depuración
            echo '<h3 class="error">Ocurrió un error: ' . mysqli_error($conex) . '</h3>';
        }
    } else {
        echo '<h3 class="error">Llena todos los campos</h3>';
    }
}
?>
