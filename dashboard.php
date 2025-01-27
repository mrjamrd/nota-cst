<?php
require_once("config.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
// echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['id_docente'];
// echo "Nombre de usuario recuperado de la variable de sesión:" . $_SESSION['nombre'];
// echo "<br>Apellido de usuario recuperado de la variable de sesión:" . $_SESSION['apellido'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
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
          <a class="nav-link active" href="perfil.php">Perfil</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">editar</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accion
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Editar</a></li>
            <li><a class="dropdown-item" href="salir.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
   
    <div class="container mt-2">
    <div>
       <h2>Secciones:</h2> 
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Asignatura</th>
      <th scope="col">Seccion</th>
      <th scope="col">P1</th>
      <th scope="col">P2</th>
      <th scope="col">P3</th>
      <th scope="col">P4</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "SELECT * FROM asigna_docentes WHERE id_docente = '".$_SESSION['id_docente']."'";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
       
    ?>
    <tr>
      <th scope="row"><?php echo $row["id_docente"]?></th>
      <td><?php
      switch ($row["id_asignatura"]) {
        case 1:
          echo "Lengua Española";
          break;
        case 2:
          echo "Matematica";
          break;
        case 3:
          echo "Naturales";
          break;
        case 4:
          echo "Sociales";
          break;
        case 5:
          echo "Ingles";
          break;
        case 6:
          echo "Frances";
          break;
        case 7:
          echo "Artistica";
          break;
        case 8:
          echo "Educacion Fisica";
          break;
        case 9:
          echo "F.H.I.R";
          break;
        case 10:
          echo "Ciencia & Tecnologia";
          break;
        default:
          echo "No se encontro la asignatura";
          break;
      }
      ?>
     </td>
      <td><?php
        switch($row["id_curso"]) {
          case 1:
            echo "1ero A";
            break;
          case 2:
            echo "1ero B";
            break;
          case 3:
            echo "1ero C";
            break;
          case 4:
            echo "2do A";
            break;
          case 5:
            echo "2do B";
            break;
          case 6:
            echo "2do C";
            break;
          case 7:
              echo "3ero A";
              break;
          case 8:
              echo "3ero B";
              break;
          case 9:
              echo "4to A";
              break;
          case 10:
              echo "4to B";
              break;
          case 11:
            echo "5to A";
            break;
          case 12:
            echo "5to B";
            break; 
          case 13:
            echo "6to A";
            break;
          case 14:
            echo "6to B";
            break;
          default:
            echo "No se encontro la seccion";
            break;
        }
      ?>
      </td>
      <td>
        <a class="btn btn-primary btn-sm" href="asignatura.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Publicar</a>
        <a class="btn btn-success btn-sm" href="consultaCurso.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Consultar</a>
        <a class="btn btn-info btn-sm" href="editaNotas.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Editar</a>
      </td>
      <td>
        <a class="btn btn-primary btn-sm" href="asignaturab.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Publicar</a>
        <a class="btn btn-success btn-sm" href="consultaCursob.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Consultar</a>
        <a class="btn btn-info btn-sm" href="editaNotasb.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Editar</a>
      </td>
      <td>
        <a class="btn btn-primary btn-sm quitar_link" href="asignatura.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Publicar</a>
        <a class="btn btn-success btn-sm quitar_link" href="consultaCurso.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Consultar</a>
        <a class="btn btn-info btn-sm quitar_link" href="editaNotas.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Editar</a>
      </td>
      <td>
        <a class="btn btn-primary btn-sm quitar_link"  href="asignatura.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Publicar</a>
        <a class="btn btn-success btn-sm quitar_link" href="consultaCurso.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Consultar</a>
        <a class="btn btn-info btn-sm "  href="editaNotas.php?curso=<?php echo $row["id_curso"];?>&asignatura=<?php echo $row["id_asignatura"];?>">Editar</a>
      </td>
    </tr>
    <?php
      }}
    ?>
  </tbody>
</table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>