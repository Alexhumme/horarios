<?php
include "../../php/print.php";
include "../../php/conexion.php";

//error_reporting(0);
$sql = "SELECT * FROM ambientes";
$consulta = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_array($consulta);
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- alertas -->
    <script src="../../js/elementos.js"></script> <!-- importar clases y metodos de elementos prediseñados  -->
    <script>
        crear_cabecera()
    </script>
    <main>
        <div class="container-page">
            <script>
                crear_coordinador_menu(2)
            </script>
            <aside class="container-sect">
                <section class="modulo">
                    <div class="container-table adm_intr">
                        <form action="../../php/ambientes/aniadir.php" method="post">
                            <table class="table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="8">ambientes</th>
                                    </tr>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Funcional</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="add">
                                        <td class="input-cont">
                                            <input type="text" name="id" placeholder="Id" id="id-input">
                                            <input type="button" value="AG" onclick="autoGenUID()">
                                        </td>
                                        <td class="input-cont"><input type="text" name="nombre" placeholder="Nombre"
                                                required></td>
                                        <td>
                                            <input type="checkbox" name="funcional" id="">
                                        </td>
                                        <td class="input-cont">
                                            <input type="reset" value="cancelar">
                                            <input type="submit" value="añadir">
                                        </td>
                                    </tr>
                                    <?php do { ?>
                                        <tr id="reg<?php echo $resultado["idambiente"]; ?>">
                                            <th class="Id">
                                                <?php echo $resultado["idambiente"]; ?>
                                            </th>
                                            <td class="Nombre">
                                                <?php echo $resultado["ambiente"]; ?>
                                            </td>
                                            <td class="Funcional checkbox">
                                                <?php echo $resultado["funcional"]; ?>
                                            </td>
                                            <td class="opt">
                                                <input type="button" value="eliminar"
                                                    onclick="confirmarDelete(<?php echo $resultado["idambiente"]; ?>,'ambientes',1)">
                                                <input type="button" value="editar"
                                                    onclick="editarRegistro('reg<?php echo $resultado["idambiente"]; ?>','ambientes')">
                                            </td>
                                        </tr>
                                    <?php } while ($resultado = mysqli_fetch_array($consulta)); ?>

                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </form>
                    </div>
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
</body>

</html>