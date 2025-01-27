<?php 
require_once("config.php");
$sql = "SELECT * FROM estudiantes WHERE id_curso = 1";
// 
// $sql_periodos = "SELECT * FROM periodos WHERE id_asignatura  = 1 and id_estudiante = 1";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-size: 12px;
        }

        .espacio{
            margin-top: 30px;
        }

        .header {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .header-item {
            display: flex;
            align-items: center;
        }

        .header-item span {
            margin-right: 10px;
        }

        .header-item .line {
            flex-grow: 1;
            border-bottom: 1px solid #000;
        }

        .main-title {
            background-color: #003366;
            color: white;
            padding: 8px;
            text-align: center;
            margin: 10px 0;
        }

        .calificaciones-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .calificaciones-table th, 
        .calificaciones-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            font-size: 11px;
        }

        .competencias-header {
            background-color: #e6f3ff;
        }

        .materias {
            background-color: #e6f3ff;
            text-align: left;
            padding-left: 8px !important;
        }

        .competencia-title {
            writing-mode: vertical-lr;
            text-orientation: mixed;
            transform: rotate(180deg);
            padding: 8px 0;
            height: 100px;
            white-space: nowrap;
        }

        .periodo-header {
            width: 25px;
        }

        .bottom-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .attendance-table, .legend-box, .situacion-box {
            border: 1px solid #000;
        }

        .table-header {
            background-color: #e6f3ff;
            padding: 8px;
            border-bottom: 1px solid #000;
            font-weight: bold;
        }

        .attendance-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .attendance-table td, .attendance-table th {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        .legend-content, .situacion-content {
            padding: 8px;
        }

        .footer {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .footer-line {
            border-top: 1px solid #000;
            margin-top: 30px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
  
    <!-- aqui -->
     <?php 
       $result = mysqli_query($conexion, $sql);
       if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           
    ?>
     
    <div class="header">
        <div class="header-item">
            <span>Nombre(s) y apellido (s):</span>
            <div class="line"><?php echo $row["nombre"] ." ". $row["apellido"];?></div>
        </div>
        <div class="header-item">
            <span>Grado:</span>
            <div class="line">
                <?php
            switch($row["id_curso"]) {
          case 1:
            echo "1ero";
            break;
          case 2:
            echo "1ero";
            break;
          case 3:
            echo "1ero";
            break;
          case 4:
            echo "2do";
            break;
          case 5:
            echo "2do";
            break;
          case 6:
            echo "2do";
            break;
          case 7:
              echo "3ero";
              break;
          case 8:
              echo "3ero";
              break;
          case 9:
              echo "4to";
              break;
          case 10:
              echo "4to";
              break;
          case 11:
            echo "5to";
            break;
          case 12:
            echo "5to";
            break; 
          case 13:
            echo "6to";
            break;
          case 14:
            echo "6to";
            break;
          default:
            echo "No se encontro la seccion";
            break;
        }?>
            </div>
        </div>
        <div class="header-item">
            <span>Sección:</span>
            <div class="line">
            <?php
            switch($row["id_curso"]) {
          case 1:
            echo "A";
            break;
          case 2:
            echo "B";
            break;
          case 3:
            echo "C";
            break;
          case 4:
            echo "A";
            break;
          case 5:
            echo "B";
            break;
          case 6:
            echo "C";
            break;
          case 7:
              echo "A";
              break;
          case 8:
              echo "B";
              break;
          case 9:
              echo "A";
              break;
          case 10:
              echo "B";
              break;
          case 11:
            echo "A";
            break;
          case 12:
            echo "B";
            break; 
          case 13:
            echo "A";
            break;
          case 14:
            echo "B";
            break;
          default:
            echo "No se encontro la seccion";
            break;
        }?>
            </div>
        </div>
    </div>

    <div class="main-title">CALIFICACIONES DE RENDIMIENTO</div>

    <table class="calificaciones-table">
        <tr class="competencias-header">
            <th rowspan="2">COMPETENCIAS FUNDAMENTALES</th>
            <th colspan="4">Comunicativa</th>
            <th colspan="4">Pensamiento Lógico, Creativo y Crítico</th>
            <th colspan="4">Científica y Tecnológica</th>
            <th colspan="4">Ética y Ciudadana</th>
            <th colspan="4">PROMEDIO GRUPO DE COMPETENCIAS ESPECÍFICAS</th>
            <th rowspan="2">CALIFICACIÓN COMPLETIVA</th>
            <th rowspan="2">CALIFICACIÓN EXTRAORDINARIA</th>
            <th rowspan="2">EVALUACIÓN ESPECIAL</th>
            <th colspan="2">SITUACIÓN FINAL EN LA ASIGNATURA</th>
        </tr>
        <tr class="competencias-header">
            <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
            <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
            <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
            <th>P1</th><th>P2</th><th>P3</th><th>P4</th>
            <th>PC1</th><th>PC2</th><th>PC3</th><th>PC4</th>
            <th>A</th><th>R</th>
        </tr>
        <tr>
            <?php
            $sql_materias = "SELECT * FROM asignaturas";  
             $result2 = mysqli_query($conexion, $sql_materias);
             if (mysqli_num_rows($result2) > 0) {
              while ($row2 = mysqli_fetch_assoc($result2)) {     
            ?>
            <?php 
                $asi = $row2['id_asignatura'];
                $est = $row['id_estudiante'];
            
            ?>
            <td class="materias"><?php echo $row2['nombre'];?></td>
            <?php 
               // $sql_periodos = "SELECT * FROM periodo_a WHERE id_asignatura = '$asi'  and id_estudiante = '$est'";

               $sql_periodos = "SELECT * FROM `vista_periodos` where asignatura_a = '$asi' and estudiante_a = '$est'"; 
                
                $result3 = mysqli_query($conexion, $sql_periodos);
                
             if (mysqli_num_rows($result3) > 0) {
        
              while ($row3 = mysqli_fetch_assoc($result3)) {
            ?>
            <td><?php echo intval($row3['c1_a']);?></td><td><?php echo intval($row3['c1_b']);?></td><td></td><td></td>
            <td><?php echo intval($row3['c2_a']);?></td><td><?php echo intval($row3['c2_b']);?></td><td></td><td></td>
            <td><?php echo intval($row3['c3_a']);?></td><td><?php echo intval($row3['c3_b']);?></td><td></td><td></td>
            <td><?php echo intval($row3['c4_a']);?></td><td><?php echo intval($row3['c4_b']);?></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td>
            <td></td><td></td>
            <?php
              }}
              ?>
        </tr>
                <?php
              }
            }else{}
                ?>
    </table>

    <div class="bottom-section">
        <div class="attendance-table">
            <div class="table-header">RESUMEN DE ASISTENCIA DEL/LA ESTUDIANTE</div>
            <table>
                <tr>
                    <th>Períodos</th>
                    <th>Asistencia</th>
                    <th>Ausencia</th>
                    <th colspan="2">% de Anual</th>
                </tr>
                <tr>
                    <td>P1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>P2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>P3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>P4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="legend-box">
            <div class="table-header">LEYENDA:</div>
            <div class="legend-content">
                (P1) Período 1<br>
                (P2) Período 2<br>
                (P3) Período 3<br>
                (P4) Período 4<br>
                (PC) Promedio Grupo de Competencias Específicas<br>
                (C.F.) Calificación Final<br>
                (C.E.C.) Calificación Evaluación Completiva<br>
                (C.C.F.) Calificación Completiva Final<br>
                (C.E.EX) Calificación Evaluación Extraordinaria<br>
                (C.EX.F.) Calificación Extraordinaria Final<br>
                (C.E.) Calificación Especial<br>
                (A) Aprobado<br>
                (R) Reprobado
            </div>
        </div>

        <div class="situacion-box">
            <div class="table-header">SITUACIÓN DEL/DE LA ESTUDIANTE</div>
            <div class="situacion-content">
                <div style="margin-bottom: 10px">Promovido/a ○ Repitente ○</div>
                <div>CONDICIÓN FINAL DEL/DE LA ESTUDIANTE:</div>
                <div style="height: 80px; border: 1px solid #ddd; margin-top: 10px"></div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div>
            <div class="footer-line">Maestro(a) encargado(a) del grado</div>
        </div>
        <div>
            <div class="footer-line">Director(a) del Centro Educativo</div>
        </div>
        <div class="espacio" ></div>
    </div>
    <?php   
      }
    } else {}
    ?>
    <!-- aqui -->
</body>
</html>