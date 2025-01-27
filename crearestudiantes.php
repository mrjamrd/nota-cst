<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class=" container-fluid navbar-dark bg-primary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Centro Educativo Santa Teresita</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav  ms-auto">
        <li class="nav-item">
          <b><a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION['nombre']?></a></b>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">editar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accion
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="salir.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>

<div class="container mt-3">
    <h2>Registrar Estudiantes</h2>
    <div class="">
        <form action="" method="post">
            <div class="form-group">
                <label for="">DNI:</label>
                <input type="text" class="form-control" name="dni" placeholder="DNI">
            </div>
            <div class="form-group">
            <label for="">Nombre:</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
            <label for="">Apellido:</label>
                <input type="text" class="form-control" name="Apellido" placeholder="Apellido">
            </div>
            <div class="form-group">
            <label for="">Selecione un Curso:</label>
                <select name="" id="" class="form-control">
                    <option value="">Seleccione un curso</option>
                    <option value="1">1ero A</option>
                    <option value="2">1ero B</option>
                    <option value="3">1ero C</option>
                    <option value="4">2do A</option>
                    <option value="5">2do B</option>
                    <option value="6">2do C</option>
                    <option value="7">3ero A</option>
                    <option value="8">3ero B</option>
                    <option value="9">4to A</option>
                    <option value="10">4to B</option>
                    <option value="11">5to A</option>
                    <option value="12">5to B</option>
                    <option value="13">6to A</option>
                    <option value="14">6to B</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-success" name="" value="Registar">
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>