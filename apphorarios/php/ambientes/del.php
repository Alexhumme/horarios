<?php

include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-ambientes.php?w=0";
$id = $_GET["id"];
$sql = "DELETE FROM ambientes WHERE idambiente = $id";

imprimir($sql);
$consulta = mysqli_query($conexion, $sql);
if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);