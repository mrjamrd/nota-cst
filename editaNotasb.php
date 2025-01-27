<?php
session_start();
require_once("config.php");
$curso = $_GET['curso'];
$asignatura = $_GET['asignatura'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de notas por Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <div>
            <h2>Notas de cursos</h2>
        </div>
        <table class="table table-bordered">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">C1 </th>
      <th scope="col">C2</th>
      <th scope="col">C3</th>
      <th scope="col">C4</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <form action="editarPeriodob.php" method="post">
    <input type="hidden" name="curso" value="<?php echo $curso;?>">
    <input type="hidden" name="asignatura" value="<?php echo $asignatura;?>">
  <tbody>
    <?php 
      
       #$sql = "SELECT * FROM estudiantes where id_curso = $curso";
       #$sql = "SELECT * FROM estudiantes WHERE id_curso = $curso ORDER BY apellido asc";
       $sql = "SELECT 
       e.id_estudiante,
       e.dni,
       e.nombre,
       e.apellido,
       e.id_curso,
       pa.id_pb,
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
       periodo_b pa ON e.id_estudiante = pa.id_estudiante
   WHERE
       e.id_curso = '$curso'
       AND pa.id_asignatura = '$asignatura'
   ORDER BY 
       e.apellido asc, e.nombre";
       $result = mysqli_query($conexion, $sql);

       if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr class="">
      <th scope="row"><?php echo $row["id_estudiante"]; ?></th>
  
      <td><?php echo $row["nombre"] ." ".$row["apellido"] ;?></td>
      <input type="hidden" name="id_estudiante[]" value="<?php echo $row["id_estudiante"]; ?>">
      <input type="hidden" name="id_pb[]" value="<?php echo $row["id_pb"]; ?>">
      <td class="text-center">
        <input type="text" class="text-center" value="<?php echo $row["c1"];?>"  name="c1p1[]" size="2" placeholder="P1" required>
        <input type="text" class="text-center"  name="c1p1r[]" size="2" placeholder="R1">
      </td>
      <td class="text-center">
      <input type="text" class="text-center" value="<?php echo $row["c2"];?>" name="c2p1[]" size="2" placeholder="P1" required>
      <input type="text" class="text-center" name="c2p1r[]" size="2" placeholder="R1">
      </td>
      <td class="text-center">
      <input type="text" class="text-center" value="<?php echo $row["c3"];?>" name="c3p1[]" size="2" placeholder="P1" required>
      <input type="text" class="text-center" name="c3p1r[]" size="2" placeholder="R1">
      </td>
      <td class="text-center">
      <input type="text" class="text-center" value="<?php echo $row["c4"];?>" name="c4p1[]" size="2" placeholder="P1" required>
      <input type="text" class="text-center" name="c4p1r[]" size="2" placeholder="R1">
      </td>
      <td>
        <a href=""><img src="img/edit.png" width="20" alt=""></a>
      </td>
    </tr>
    <?php
        }
        }else{
            echo "0 results";
        }  
    ?>
  </tbody>
   <div class="p-">
   <input type="submit" class="btn btn-success" name="enviar" value="Actualizar">
   <a href="dashboard.php" class="btn btn-warning">Atras</a>
   </div>
  </form>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>