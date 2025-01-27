<?php
session_start();
$curso = $_GET["curso"];
$asignatura = $_GET["asignatura"];
require_once('config.php');
$sql = "SELECT 
            e.id_estudiante,
            e.dni,
            e.nombre,
            e.apellido,
            e.id_curso,
            pa.id_pa,
            pa.id_asignatura,
            pa.id_curso,
            pa.c1,
            pa.c2,
            pa.c3,
            pa.c4,
            pa.c1r,
            pa.c2r,
            pa.c3r,
            pa.c4r,
            pa.promedio,
            pa.id_docente

        FROM 
            estudiantes e
        LEFT JOIN 
            periodo_a pa ON e.id_estudiante = pa.id_estudiante
        WHERE
            e.id_curso = '$curso'
            AND pa.id_asignatura = '$asignatura'
        ORDER BY 
            e.apellido, e.nombre";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Notas por Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
        
    <table class="table table-bordered">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">C1</th>
      <th scope="col">C2</th>
      <th scope="col">C3</th>
      <th scope="col">C4</th>
      <th scope="col">Promedio</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0){
        while($fila = mysqli_fetch_assoc($resultado)){
           # echo "id: " . $fila["id_estudiante"] . " - DNI: " . $fila["dni"] . " - Nombre: " . $fila["nombre"] . " - Apellido: " . $fila["apellido"] . " - Curso: " . $fila["id_curso"] . " - Promedio: " . $fila["promedio"] . "<br>";   
    ?>
    <tr>
      <th class="text-center" scope="row"><?php echo $fila["id_estudiante"];?></th>
      <td class=""><?php echo $fila["nombre"] . " " .$fila["apellido"] ;?></td>
      <td class="text-center"><?php echo $fila["c1"];?></td>
      <td class="text-center"><?php echo $fila["c2"];?></td>
      <td class="text-center"><?php echo $fila["c3"];?></td>
      <td class="text-center"><?php echo $fila["c4"];?></td> 
      <td class="text-center"><?php echo $fila["promedio"];?></td> 
    </tr>
    <?php 
    
        }
     }else{
         echo "0 resultados";
     }
    ?>
  </tbody>
</table>
    </div>
<div class="container">
    <a href="dashboard.php" class="btn btn-primary">Regresar</a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>