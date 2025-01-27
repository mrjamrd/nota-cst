<?php 
require_once("config.php");
$sql_maestros = "SELECT * FROM docentes";
$sql_cursos = "SELECT * FROM cursos";
$sql_asignaturas = "SELECT * FROM asignaturas";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Maestro</title>
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
      <ul class="navbar-nav">
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
    <div class="container-sm mt-3">
        <form action="addmaster.php" method="post">
            <div class="mb-3">
                <select class="form-select" name="docente" id="">
                <option value="0">Selecciona el Maestro</option>
                    <?php 
                        $result1 = mysqli_query($conexion, $sql_maestros);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {       
                    ?>
                    <option value="<?php echo $row["id_docente"];?>"><?php echo $row["nombre"] . " ". $row["apellido"] ." ";?></option>
                    <?php 
                     }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="curso" id="">
                    <option value="0">Selecciona el curso</option>
                    <?php 
                    $result2 = mysqli_query($conexion, $sql_cursos);
                    if(mysqli_num_rows($result2)>0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                    ?>
                    <option value="<?php echo $row2["id_curso"];?>"><?php echo $row2["nombre"];?></option>
                    <?php 
                    }}else{
                        echo "0 Results";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="asignatura" id="">
                    <option value="">Selecciona la Asignatura</option>
                    <?php 
                        $result3 = mysqli_query($conexion, $sql_asignaturas);
                        if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){
                    ?>
                    <option value="<?php echo $row3["id_asignatura"];?>"><?php echo $row3["nombre"];?></option>
                    <?php 
                    }
                     }else{
                        echo "result 0";
                     }
                    ?>
                </select>
            </div>
            <div class="">
                <input type="submit" class="btn btn-success" name="enviar" value="Enviar">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>