<?php
require_once 'config.php';

$sql = "SELECT * FROM docentes";

$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id_docente"] . " - Nombre: " . $row["nombre"] . " - Apellido: " . $row["apellido"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}