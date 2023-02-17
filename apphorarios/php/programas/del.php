<?php

include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-programas.php?w=0";
$id = $_GET["id"];
$sql = "DELETE FROM programas WHERE idprograma = $id";

$consulta = mysqli_query($conexion, $sql);
if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);