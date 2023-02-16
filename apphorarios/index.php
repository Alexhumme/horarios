<?php
include './php/print.php';
include './php/conexion.php';

//error_reporting(0);
$ficha = $_GET['ficha'];
if ($ficha == '' || !$ficha) {
    $ficha = FALSE;
}
if ($ficha) {
    $sql = "
    SELECT 
            hora_inicio,
            idresultado AS id_resultado,
            idambiente AS id_ambiente,
            idinstructor AS id_instructor,
            LCASE(DAYNAME(asignaciones.fecha)) AS nom_dia, 
            (SELECT idcompetencia FROM resultados WHERE idresultado = id_resultado) AS id_competencia,
            (SELECT competencia FROM competencias WHERE idcompetencia = id_competencia) AS nom_competencia,
            (SELECT resultado FROM resultados WHERE idresultado = id_resultado) AS nom_resultado,
            (SELECT ambiente FROM ambientes WHERE idambiente = id_ambiente) AS nom_ambiente,
            (SELECT nombre FROM instructor WHERE id = id_instructor) AS nom_instructor,
            (SELECT apellido FROM instructor WHERE id = id_instructor) AS apl_instructor
            FROM asignaciones WHERE idficha = $ficha
            ";

    $consulta = mysqli_query($conexion, $sql);
    if ($consulta != false and mysqli_num_rows($consulta) > 0) {
        imprimir('hay resultados');
        $resultado = mysqli_fetch_array($consulta);
        $asignaciones = [];
        do {
            $asignaciones[] = $resultado;
        } while ($resultado = mysqli_fetch_array($consulta));
    } else {
        imprimir('no hay resultados');
        $ficha = FALSE;
    }
}
;
$horas = ['7:00', '8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
$dias = [
    'Lunes' => 'monday',
    'Martes' => 'thuesday',
    'Miercoles' => 'wednesday',
    'Jueves' => 'thursday',
    'Viernes' => 'friday',
    'Sabado' => 'saturday'
];
$fechaActual = date('D-m-Y');


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>SENA HORARIOS</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- alertas -->
    <script src="./js/elementos.js"></script>
    <script src="./js/result.js"></script>
    <div>
        <script>
            crear_cabecera()
        </script>
        <main>
            <div class="container-page">
                <section class="row c-2">
                    <article class="consultar" id="#">
                        <div>
                            <?php
                            if ($ficha) {
                                ?>
                                <script>resultadoToast(1)</script>
                                <div class="container-table horario">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="7">HORARIOS ACTUALIZADOS
                                                    <?php echo $fechaActual ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td colspan="8" class="scroll-table">
                                                <table>
                                                    <tr>
                                                        <th>hora</th>
                                                        <th>Lunes</th>
                                                        <th>Martes</th>
                                                        <th>Miercoles</th>
                                                        <th>Jueves</th>
                                                        <th>Viernes</th>
                                                        <th>Sabado</th>
                                                    </tr>
                                                    <?php
                                                    foreach ($horas as $hora) { // para cada una de las jornadas
                                                        ?>
                                                        <tr class="">
                                                            <th>
                                                                <?php echo $hora ?>
                                                            </th>
                                                            <?php
                                                            foreach ($dias as $dia => $codDia) { // para cada uno de los dias
                                                                $consulta = mysqli_query($conexion, $sql);
                                                                $resultado = mysqli_fetch_array($consulta);
                                                                foreach ($asignaciones as $asignacion) { // para todas las asignaciones encontradas
                                                                    if ($hora == $asignacion['hora_inicio'] and $codDia == $asignacion['nom_dia']) {
                                                                        ?>
                                                                        <td class="registro">
                                                                            <?php echo $asignacion['nom_competencia'] ?>
                                                                            <div class="info">
                                                                                <br>
                                                                                <div class="dato"><b> instructor:</b> <span>
                                                                                        <?php echo $asignacion['nom_instructor'] . " " . $asignacion['apl_instructor'] ?>
                                                                                    </span></div>
                                                                                <div class="dato"><b> resultado: </b><span>
                                                                                        <?php echo $asignacion['nom_resultado'] ?>
                                                                                    </span></div>
                                                                                <div class="dato"><b> ambiente: </b><span>
                                                                                        <?php echo $asignacion['nom_ambiente'] ?>
                                                                                    </span></div>
                                                                                <div class="dato"><b> horas restantes: </b><span>x</span>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </td>
                                                                        <?php
                                                                        break;
                                                                    } else {
                                                                        if (end($asignaciones) == $asignacion) { // si el registro que se esta revisando es el ultimo de la tabla     
                                                                            ?>
                                                                            <td class="libre">libre</td>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                            </td>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="7">ficha
                                                    <?php echo $ficha ?>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php
                            } else {
                                ?>
                                <script> resultadoToast(0) </script>
                                <?php
                            }
                            ?>
                        </div>

                    </article>

                    <article class="ingresar">
                        <input type="radio" name="form-selector" class="form-selector coord" id="" checked="">
                        <div class="container-form">
                            <span><a href="./views/coordinador/coordinador-instructores.php">coordinador</a></span>
                            <form action="">
                                <div><label for="">Documento: </label><input type="text" class="txt"></div>
                                <div><label for="">Contraseña: </label><input type="text" class="txt"></div>
                                <div><input class="primary-btn block-btn" type="button" value="Iniciar sesion"></div>
                                <div><input class="primary-btn revert" type="button" value="Recuperar contraseña"></div>
                            </form>
                        </div>
                        <input type="radio" name="form-selector" class="form-selector inst" id="">
                        <div class="container-form">
                            <span>instructor</span>
                            <form action="">
                                <div><label for="">Documento: </label><input type="text" class="txt"></div>
                                <div><label for="">Contraseña: </label><input type="text" class="txt"></div>
                                <div><input class="primary-btn block-btn" type="button" value="Iniciar sesion"></div>
                                <div><input class="primary-btn revert" type="button" value="Recuperar contraseña"></div>
                            </form>
                        </div>
                        <input type="radio" name="form-selector" class="form-selector cons" id="">
                        <div class="container-form">
                            <span>consulte su horario por ficha</span>
                            <form action="" method="">
                                <div class="input-db">
                                    <input type="text" class="txt" name="ficha">
                                    <input class="primary-btn" type="button" value="Consultar">
                                </div>
                            </form>
                        </div>
                    </article>
                </section>
                <div class="sep"></div>
                <section class="info-sena" id="">

                </section>
            </div>
        </main>
        <script>
            crear_pie()
        </script>
    </div>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="./js/consultas.js"></script>


</body>

</html>