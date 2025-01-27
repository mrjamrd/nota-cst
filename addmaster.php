<?php 
require_once("config.php");
$id_asignatura = $_POST["asignatura"];
$id_curso  = $_POST["curso"];
$id_docente = $_POST["docente"];
mysqli_query($conexion, "INSERT INTO asigna_docentes (id_asigna_docente,id_docente,id_curso, id_asignatura) VALUES (NULL, '$id_docente', '$id_curso', '$id_asignatura')") or die("Error en el sistema");

mysqli_close($conexion);

header("Location: addmaestros.php");

?>