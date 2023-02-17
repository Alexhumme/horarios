<?php
include "../../php/print.php";
include "../../php/conexion.php";

//error_reporting(0);
$sql = "SELECT 
            idficha,
            inicio,
            final,
            jornada,
            idinstructor AS id_instructor,
            idprograma AS id_programa,
            (SELECT programa FROM programas WHERE idprograma = id_programa) AS programa,
            (SELECT CONCAT(nombre,' ',apellido) FROM instructor WHERE id = id_instructor) AS instructor
        FROM fichas";

$consulta = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_array($consulta);
if (mysqli_num_rows($consulta) > 0) {
    $listaFichas = [];
    do {
        $listaFichas[] = $resultado;
    } while ($resultado = mysqli_fetch_array($consulta));
} else {
    $listaFichas = false;

}

$sqlInst = "SELECT CONCAT(nombre,' ',apellido) as nombreC, id FROM instructor";
$sqlProg = "SELECT programa, idprograma FROM programas";
$consultaInst = mysqli_query($conexion, $sqlInst);
$consultaProg = mysqli_query($conexion, $sqlProg);
$resultadoInst = mysqli_fetch_array($consultaInst);
$resultadoProg = mysqli_fetch_array($consultaProg);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/index.css">
    <title>SENA horarios - coordinador</title>
</head>

<body>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../js/elementos.js"></script> <!-- importar clases de elementos -->
    <script>
        crear_cabecera()
    </script>
    <main>
        <div class="container-page">
            <script>
                crear_coordinador_menu(3)
            </script>
            <aside class="container-sect">
                <section class="modulo">
                    <?php if ($listaFichas) { ?>
                        <div class="container-table adm_intr">
                            <form action="../../php/programas/aniadir.php" method="post">
                                <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="8">Fichas</th>
                                        </tr>
                                        <tr>
                                            <th>Id</th>
                                            <th>Programa</th>
                                            <th>Instructor</th>
                                            <th>Jornada</th>
                                            <th>Inicio</th>
                                            <th>Final</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="add">
                                            <td class="input-cont">
                                                <input type="text" name="id" placeholder="Id" id="id-input">
                                                <input type="button" value="AG" onclick="autoGenUID()">
                                            </td>
                                            <td class="input-cont">
                                                <select name="programa">
                                                    <?php do { ?>
                                                        <option value="<?php echo $resultadoProg["idprograma"]; ?>">
                                                            <?php echo $resultadoProg["programa"]; ?>
                                                        </option>
                                                    <?php } while ($resultadoProg = mysqli_fetch_array($consultaProg)); ?>
                                                </select>
                                            <td>
                                                <select name="instructor">
                                                    <?php do { ?>
                                                        <option value="<?php echo $resultadoInst["id"]; ?>">
                                                            <?php echo $resultadoInst["nombreC"]; ?>
                                                        </option>
                                                    <?php } while ($resultadoInst = mysqli_fetch_array($consultaInst)); ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="jornada">
                                                    <option value="diurna">Diurna</option>
                                                    <option value="nocturna">Nocturna</option>
                                                    <option value="completa">Completa</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" name="inicio" placeholder="Horas lectivas">
                                            </td>
                                            <td>
                                                <input type="date" name="final" placeholder="Horas productivas">
                                            </td>
                                            <td class="input-cont">
                                                <input type="reset" value="cancelar">
                                                <input type="submit" value="añadir">
                                            </td>
                                        </tr>
                                        <?php foreach ($listaFichas as $ficha) { ?>
                                            <tr id="reg<?php echo $ficha["idficha"]; ?>">
                                                <th class="Id">
                                                    <?php echo $ficha["idficha"]; ?>
                                                </th>
                                                <td class="Programa">
                                                    <?php echo $ficha["programa"]; ?>
                                                </td>
                                                <td class="Instructor">
                                                    <?php echo $ficha["instructor"]; ?>
                                                </td>
                                                <td class="Jornada">
                                                    <?php echo $ficha["jornada"]; ?>
                                                </td>
                                                <td class="Inicio">
                                                    <?php echo $ficha["inicio"]; ?>
                                                </td>
                                                <td class="Final">
                                                    <?php echo $ficha["final"]; ?>
                                                </td>
                                                <td class="opt">
                                                    <input type="button" value="eliminar"
                                                        onclick="confirmarDelete(<?php echo $ficha["idficha"]; ?>,'fichas',1)">
                                                    <input type="button" value="editar"
                                                        onclick="editarRegistro('reg<?php echo $ficha["idficha"]; ?>','fichas')">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="empty-DB">no se encontraron programas</div>
                    <?php } ?>
                </section>
            </aside>
        </div>
    </main>
    <script>
        crear_pie()
    </script>

    <script src="../../js/autoGenUID.js"></script>
    <script src="../../js/eliminar.js"></script>
    <script src="../../js/editar.js"></script>
    <script src="../../js/result.js"></script>
    <script>getResultadoToast()</script>
</body>

</html>