<?php
include "../../php/print.php";
include "../../php/conexion.php";

//error_reporting(0);
$sql = "SELECT * FROM instructor";
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
                crear_coordinador_menu(1)
            </script>
            <aside class="container-sect">
                <section>
                    wakanda
                </section>
                <div class="sep"></div>
                <section class="modulo">
                    <?php if ($resultado) { ?>
                        <div class="container-table adm_intr">
                            <form action="../../php/instructor/aniadir.php" method="post">
                                <table class="table-striped">
                                    <thead>

                                        <tr>
                                            <th>Documento</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>E-mail</th>
                                            <th>Zona</th>
                                            <th>Direccion</th>
                                            <th>Salario</th>
                                            <th>Especialidad</th>
                                            <th>contratista</th>
                                            <th>activo</th>
                                            <th>opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="add">
                                            <td class="input-cont"><input type="text" name="cedula" placeholder="Documento"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="nombre" placeholder="Nombre"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="apellido" placeholder="Apellido"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="telefono" placeholder="Telefono"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="celular" placeholder="Celular">
                                            </td>
                                            <td class="input-cont"><input type="text" name="e-mail" placeholder="E-mail"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="zona" placeholder="Zona"
                                                    required></td>
                                            <td class="input-cont"><input type="text" name="direccion"
                                                    placeholder="Direccion" required></td>
                                            <td class="input-cont"><input type="number" name="salario"
                                                    placeholder="Salario"></td>
                                            <td class="input-cont"><input type="text" name="especialidad"
                                                    placeholder="especialidad"></td>
                                            <td class="input-cont"><input type="checkbox" value=1 name="contratista"></td>
                                            <td class="input-cont"><input type="checkbox" value=1 name="activo">
                                            </td>
                                            <td class="input-cont">
                                                <input type="reset" value="cancelar">
                                                <input type="submit" value="añadir">
                                            </td>
                                        </tr>
                                        <?php do { ?>
                                            <tr id="reg<?php echo $resultado["id"]; ?>">
                                                <th class="Id">
                                                    <?php echo $resultado["id"]; ?>
                                                </th>
                                                <td class="Nombre">
                                                    <?php echo $resultado["nombre"]; ?>
                                                </td>
                                                <td class="Apellido">
                                                    <?php echo $resultado["apellido"]; ?>
                                                </td>
                                                <td class="Telefono">
                                                    <?php echo $resultado["telefono"]; ?>
                                                </td>
                                                <td class="Celular">
                                                    <?php echo $resultado["celular"]; ?>
                                                </td>
                                                <td class="Email">
                                                    <?php echo $resultado["email"]; ?>
                                                </td>
                                                <td class="Zona">
                                                    <?php echo $resultado["zona"]; ?>
                                                </td>
                                                <td class="Direccion">
                                                    <?php echo $resultado["direccion"]; ?>
                                                </td>
                                                <td class="Salario">
                                                    <?php echo $resultado["salario"]; ?>
                                                </td>
                                                <td class="Especialidad">
                                                    <?php echo $resultado["especialidad"]; ?>
                                                </td>
                                                <td class="Contratista checkbox">
                                                    <?php if ($resultado["contratista"]) {
                                                        echo "1";
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ; ?>
                                                </td>
                                                <td class="Activo checkbox">
                                                    <?php if ($resultado["activo"]) {
                                                        echo "1";
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ; ?>
                                                </td>
                                                <td class="opt">
                                                    <input type="button" value="eliminar"
                                                        onclick="confirmarDelete(<?php echo $resultado["id"]; ?>,'instructor',1)">
                                                    <input type="button" value="editar"
                                                        onclick="editarRegistro('reg<?php echo $resultado["id"]; ?>','instructor')">
                                                </td>
                                            </tr>
                                        <?php } while ($resultado = mysqli_fetch_array($consulta)); ?>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="empty-DB">no se encontraron instructores</div>
                    <?php } ?>
                </section>
            </aside>
        </div>
    </main>
    <script>
        crear_pie()
    </script>

    <script src="../../js/eliminar.js"></script>
    <script src="../../js/editar.js"></script>
    <script src="../../js/result.js"></script>
    <script>getResultadoToast()</script>
</body>

</html>