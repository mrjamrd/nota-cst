<?php 
require_once("config.php");
$id = $_GET['id_estudiante'];
$sql = "SELECT * FROM estudiantes where id_estudiante=$id";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Educativo Santa Teresita - Listar Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-primary" id="header ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Centro Educativo Santa Teresita</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
 </nav>
    </div>
</div>
 <div class="container mt-3">
    <h2>Actualizar Estudiante</h2>
    <form action="editarEst.php" method="POST">
      <?php 
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">DNI:</label>
            <input class="form-control" name="dni" type="text" value="<?php echo $row["dni"];?>" required>
            <input type="hidden" name="id" value="<?php echo $row["id_estudiante"];?>">
        </div>
        
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
            <input class="form-control" name="nombre" type="text" value="<?php echo $row["nombre"];?>" required>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Apellido:</label>
            <input class="form-control" name="apellido" type="text" value="<?php echo $row["apellido"];?>" required>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">ID Estudiante:</label>
            <input class="form-control" type="text" value="<?php echo $row["id_curso"];?>" disabled>
        </div>
        <?php 
            }
        }
        ?>
        <div class="mt-2">
            <input type="submit" class=" btn btn-primary" value="Actualizar">
        </div>
    </form>
 </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>