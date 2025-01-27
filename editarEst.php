<?php 
require_once("config.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$id = $_POST["id"];
$sql = "UPDATE estudiantes SET dni='$dni', nombre ='$nombre', apellido='$apellido' where  id_estudiante = $id";
if(mysqli_query($conexion,$sql)){ 
header("Location: listaestudiante.php");
}else{
    echo "Error";
}

?>


	