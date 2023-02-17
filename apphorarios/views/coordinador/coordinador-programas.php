<?php
include "../../php/print.php";
include "../../php/conexion.php";

//error_reporting(0);
$sql = "SELECT * FROM programas";
$consulta = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_array($consulta);
if (mysqli_num_rows($consulta) > 0) {
    $listaProgramas = [];
    do {
        $listaProgramas[] = $resultado;
    } while ($resultado = mysqli_fetch_array($consulta));
} else {
    $listaProgramas = false;
}
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
                crear_coordinador_menu(4)
            </script>
            <aside class="container-sect">
                <section class="modulo">
                    <?php if ($listaProgramas) { ?>
                        <div class="container-table adm_intr">
                            <form action="../../php/programas/aniadir.php" method="post">
                                <table class="table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="8">programas</th>
                                        </tr>
                                        <tr>
                                            <th>Id</th>
                                            <th>Programa</th>
                                            <th>Nivel</th>
                                            <th>Horas lectivas</th>
                                            <th>Horas productivas</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="add">
                                            <td class="input-cont">
                                                <input type="text" name="id" placeholder="Id" id="id-input">
                                                <input type="button" value="AG" onclick="autoGenUID()">
                                            </td>
                                            <td class="input-cont"><input type="text" name="programa" placeholder="Nombre"
                                                    required></td>
                                            <td>
                                                <input type="text" name="nivel" placeholder="Nivel" required>
                                            </td>
                                            <td>
                                                <input type="number" name="horasL" placeholder="Horas lectivas">
                                            </td>
                                            <td>
                                                <input type="number" name="horasP" placeholder="Horas productivas">
                                            </td>
                                            <td class="input-cont">
                                                <input type="reset" value="cancelar">
                                                <input type="submit" value="añadir">
                                            </td>
                                        </tr>
                                        <?php foreach ($listaProgramas as $programa) { ?>
                                            <tr id="reg<?php echo $programa["idprograma"]; ?>">
                                                <th class="Id">
                                                    <?php echo $programa["idprograma"]; ?>
                                                </th>
                                                <td class="Programa">
                                                    <?php echo $programa["programa"]; ?>
                                                </td>
                                                <td class="Nivel">
                                                    <?php echo $programa["nivel"]; ?>
                                                </td>
                                                <td class="Horas_lectivas">
                                                    <?php echo $programa["horas_lectivas"]; ?>
                                                </td>
                                                <td class="Horas_productivas">
                                                    <?php echo $programa["horas_productivas"]; ?>
                                                </td>
                                                <td class="opt">
                                                    <input type="button" value="eliminar"
                                                        onclick="confirmarDelete(<?php echo $programa["idprograma"]; ?>,'programas',1)">
                                                    <input type="button" value="editar"
                                                        onclick="editarRegistro('reg<?php echo $programa["idprograma"]; ?>','programas')">
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