<?php
    include "./php/print.php";
    include "./php/conexion.php";
    
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
    <link rel="stylesheet" href="./css/index.css">
    <title>SENA horarios - coordinador</title>
</head>
<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- alertas -->
    <script src="js/elementos.js"></script> <!-- importar clases y metodos de elementos prediseñados  -->
    <script>crear_cabecera()</script>
    <main>
        <div class="container-page">
            <script>crear_coordinador_menu(1)</script>
            <aside class="container-sect">
                <section class="modulo">
                    <div class="container-table adm_intr">
                        <form action="./php/inst_aniadir.php" method="post">
                        <table>
                            <thead>
                                <tr><th colspan="8">instructores</th></tr>
                                <tr>
                                    <th>id</th>
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>E-mail</th>
                                    <th>contratista</th>
                                    <th>activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php do{ ?>
                                <tr>
                                    <th><?php echo $resultado["idinstructor"]; ?></th>
                                    <td><?php echo $resultado["id"]; ?></td>
                                    <td><?php echo $resultado["nombre"]; ?></td>
                                    <td><?php echo $resultado["apellido"]; ?></td>
                                    <td><?php echo $resultado["telefono"]; ?></td>
                                    <td><?php echo $resultado["email"]; ?></td>
                                    <td><?php if ($resultado["contratista"]){echo "si";}else{echo "no";}; ?></td>
                                    <td><?php if ($resultado["activo"]){echo "si";}else{echo "no";}; ?></td>
                                    <td class="opt">
                                        opciones
                                        <ul>
                                            <li><input type="button" value="delete" onclick="confirmarDelete('<?php echo $resultado['id']?>','inst',1)"></li>
                                            <li><a href=""> editar </a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php }while($resultado = mysqli_fetch_array($consulta)); ?>
                                <tr class="add">
                                        <td class="input-cont"><input type="text" name="id" placeholder="Id" required></td>
                                        <td class="input-cont"><input type="text" name="cedula" placeholder="Documento" required></td>
                                        <td class="input-cont"><input type="text" name="nombre" placeholder="Nombre" required></td>
                                        <td class="input-cont"><input type="text" name="apellido" placeholder="Apellido" required></td>
                                        <td class="input-cont"><input type="text" name="telefono" placeholder="Telefono" required></td>
                                        <td class="input-cont"><input type="text" name="e-mail" placeholder="E-mail" required></td>
                                        <td class="input-cont"><input type="checkbox" value=1 name="contratista"></td>
                                        <td class="input-cont"><input type="checkbox" value=1 name="activo"></td>
                                        <td class="input-cont"><input type="reset" value="cancelar"></td>
                                        <td class="input-cont"><input type="submit" value="añadir"></td>
                                    </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </form>
                    </div>
                </section>
            </aside>
        </div>
    </main>
    <script>crear_pie()</script>

    <script src="./js/eliminar.js"></script>
</body>
</html>
<?php
    $er = $_GET["er"];
    $su = $_GET["su"];
    if ($er == 1){ echo ("<script> swal.fire('no se pudo realizar la solicitud')</script>");};
    if ($su == 1){ echo ("<script> swal.fire('solicitud exitosa')</script>");};
?>