<?php
    include './php/print.php';
    include './php/conexion.php';

    //error_reporting(0);
    $ficha = $_GET['ficha'];
    if ($ficha == ''){$ficha = FALSE;}
    if($ficha){
        $sql = "SELECT *,LCASE(DAYNAME(asignaciones.fecha)) AS nom_dia FROM asignaciones WHERE idficha = $ficha";
        imprimir($sql);
        $consulta = mysqli_query($conexion,$sql);
        if($consulta != false and mysqli_num_rows($consulta)> 0){
            imprimir('hay resultados');
            $resultado = mysqli_fetch_array($consulta);
            $asignaciones = [];
            do{
                $asignaciones[] = $resultado;
            }while($resultado=mysqli_fetch_array($consulta));
        }else{
            imprimir('no hay resultados');
            $ficha = FALSE;
        }
        
    };
    $horas = ['7:00','8:00','9:00','10:00'];
    $dias = [
        'Lunes' => 'monday',
        'Martes' => 'thuesday',
        'Miercoles' => 'wednesday',
        'Jueves' => 'thursday',
        'Viernes' => 'friday',
        'Sabado' => 'saturday'
    ];
    $fechaActual = date ( 'D-m-Y' );
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>SENA HORARIOS</title>
</head>
<body>
    <div>
        <header class="header">
            <i> icono </i>
            <div>
                <ul>
                    <li><a href="#ingresar">ingresar</a></li>
                    <li><a href="#consultar">horarios</a></li>
                    <li><a href="#contacto">contacto</a></li>
                </ul>
            </div>
        </header>
        <main>
            <section class="consultar" id="#">
                <div>
                    <div class="container-busqueda">
                        <form action="" method="">
                            <h3>consulte su horario por ficha</h3>
                            <div class="input-db">
                                <input type="text" name="ficha">
                                <input type="button" id="btn_consultar" value="buscar">
                            </div>
                        </form>
                    </div>
                    <?php 
                    if ($ficha){
                    ?>
                    <div class="container-table horario">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="7">HORARIOS ACTUALIZADOS <?php echo $fechaActual ?></th>
                                </tr>
                                <tr>
                                    <th>hora</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miercoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                    <th>Sabado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($horas as $hora){ // para cada una de las jornadas
                                ?>
                                <tr class="">
                                    <th><?php echo $hora ?></th>
                                    <?php
                                    foreach ($dias as $dia => $codDia) { // para cada uno de los dias
                                        $consulta = mysqli_query($conexion,$sql);
                                        $resultado = mysqli_fetch_array($consulta);
                                        foreach($asignaciones as $asignacion){ // para todas las asignaciones encontradas
                                            if ($hora == $asignacion['hora_inicio'] and $codDia == $asignacion['nom_dia']){
                                    ?>
                                    <td class="asignacion">
                                        competencia
                                        <div class="info">
                                            <div class="dato">instructor: <span>x</span></div>
                                            <div class="dato">resultado: <span>x</span></div>
                                            <div class="dato">ambiente: <span>x</span></div>
                                            <div class="dato">horas restantes: <span>x</span></div>
                                        </div>
                                    </td>
                                    <?php
                                                break;
                                            }else{
                                                if (end($asignaciones) == $asignacion){ // si el registro que se esta revisando es el uñtimo de la tabla     
                                    ?>
                                    <td><?php //echo $codDia ?></td>
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
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="7">ficha <?php echo $ficha?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
            </section>
    
            <section class="ingresar">
                <h2>INGRESE</h2>
                <div>
                    <form action="">
                        <h3>coordinador</h3>
                        <div><label for=""></label><input type="text"></div>
                        <div><label for=""></label><input type="text"></div>
                        <div><input type="button" value=""></div>
                    </form>
                </div>
                <div>
                    <form action="">
                        <h3>instructor</h3>
                        <div><label for=""></label><input type="text"></div>
                        <div><label for=""></label><input type="text"></div>
                        <div><input type="button" value=""></div>
                    </form>
                </div>
            </section>
            
            <section class="contacto" id="contacto">
                <div>
                    <h3>contacto</h3>
                    <form action="">
                        <div><label for=""></label><input type="text"></div>
                        <div><label for=""></label><input type="text"></div>
                        <div><label for=""></label><input type="text"></div>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <input type="button" value="enviar">
                    </form>
                </div>
            </section>
        </main>
        <footer class="footer">
            <section class=""></section>
            <section class="bottom">todos los derechos reservados</section>
        </footer>
    </div>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/consultas.js"></script>
</body>
</html>