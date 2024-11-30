<?php
$conex = mysqli_connect("localhost", "root", "", "registro");

if (!$conex) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa";
}
?>
