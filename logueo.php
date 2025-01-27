<?php
require_once("config.php");

$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM docentes WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($result);
if($row){
    session_start();
    $_SESSION["id_docente"] = $row["id_docente"];
    $_SESSION["nombre"] = $row["nombre"];
    $_SESSION["apellido"] = $row["apellido"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["password"] = $row["password"];
    header("Location: dashboard.php");
}else{
    echo "error en el sistema";
    }
mysqli_close($conexion);

