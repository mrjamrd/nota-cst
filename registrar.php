<?php
require_once("config.php");

mysqli_query($conexion, "INSERT INTO docentes (nombre,apellido,email,password) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellido]', '$_REQUEST[email]', '$_REQUEST[password]')") or die("Error en el sistema");

mysqli_close($conexion);

header("Location: index.php");