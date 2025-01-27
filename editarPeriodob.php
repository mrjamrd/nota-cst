<?php
session_start();
require_once("config.php");
if(isset($_POST['enviar'])) {

    // Obtener los arrays de datos
    $id_periodo = $_POST['id_pb'];
    $estudiantes = $_POST['id_estudiante'];

    $c1 = $_POST['c1p1'];

    $c1r = $_POST['c1p1r'];

    $c2 = $_POST['c2p1'];

    $c2r = $_POST['c2p1r'];

    $c3 = $_POST['c3p1'];

    $c3r = $_POST['c3p1r'];

    $c4 = $_POST['c4p1'];

    $c4r = $_POST['c4p1r'];

    

    // Obtener id_curso e id_asignatura (debes enviarlos desde el formulario)

    $id_curso = $_POST['curso'];

    $id_asignatura = $_POST['asignatura'];

    

    // Variable para contar inserciones exitosas

    $insercionesExitosas = 0;

    $totalEstudiantes = count($estudiantes);


    // Iterar sobre cada estudiante

    for($i = 0; $i < $totalEstudiantes; $i++) {

        // Convertir valores vacíos a 0 o el valor numérico

        $c1_val = empty($c1[$i]) ? 0 : floatval($c1[$i]);

        $c2_val = empty($c2[$i]) ? 0 : floatval($c2[$i]);

        $c3_val = empty($c3[$i]) ? 0 : floatval($c3[$i]);

        $c4_val = empty($c4[$i]) ? 0 : floatval($c4[$i]);

        $c1r_val = empty($c1r[$i]) ? 0 : floatval($c1r[$i]);

        $c2r_val = empty($c2r[$i]) ? 0 : floatval($c2r[$i]);

        $c3r_val = empty($c3r[$i]) ? 0 : floatval($c3r[$i]);

        $c4r_val = empty($c4r[$i]) ? 0 : floatval($c4r[$i]);


        // Calcular promedio

        $promedio = (($c1_val + $c1r_val)+ ($c2_val+$c2r_val)+ ($c3_val+$c3r_val )+ ($c4_val+$c4r_val)) / 4;


        // Preparar la consulta SQL

       /* $sql = "INSERT INTO periodo_a (

                    id_estudiante, 

                    id_asignatura, 

                    id_curso, 

                    c1, c2, c3, c4, 

                    c1r, c2r, c3r, c4r, 

                    promedio, 

                    id_docente

                ) VALUES (

                    {$estudiantes[$i]},

                    $id_asignatura,

                    $id_curso,

                    $c1_val, $c2_val, $c3_val, $c4_val,

                    $c1r_val, $c2r_val, $c3r_val, $c4r_val,

                    $promedio,

                    {$_SESSION['id_docente']}

                )";*/

                $sql = "UPDATE periodo_b SET 

                id_estudiante = {$estudiantes[$i]}, 
            
                id_asignatura = $id_asignatura,
            
                id_curso = '$id_curso',
            
                c1 = '$c1_val',
            
                c2 = '$c2_val',
            
                c3 = '$c3_val',
            
                c4 = '$c4_val',
            
                c1r = '$c1r_val',
            
                c2r = '$c2r_val',
            
                c3r = '$c3r_val',
            
                c4r = '$c4r_val',
            
                promedio = $promedio,
            
                id_docente = {$_SESSION['id_docente']}  
            
            WHERE id_pb = {$id_periodo[$i]}";


        // Ejecutar la consulta

        if(mysqli_query($conexion, $sql)) {

            $insercionesExitosas++;

        } else {

            echo "Error al insertar registro para estudiante ID: " . $estudiantes[$i] . "<br>";

            echo "Error: " . mysqli_error($conexion);

        }

    }


    // Cerrar la conexión

    mysqli_close($conexion);


    // Verificar si todas las inserciones fueron exitosas

    if($insercionesExitosas == $totalEstudiantes) {

        header("Location: dashboard.php?mensaje=Notas registradas correctamente");

        exit();

    } else {

        header("Location: dashboard.php?mensaje=Algunas notas no se pudieron registrar");

        exit();

    }

} else {

    header("Location: dashboard.php?mensaje=Error al procesar el formulario");

    exit();

}

?>