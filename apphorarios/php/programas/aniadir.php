<?php
include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-programas.php?w=0";
$id = $_POST["id"];
$programa = $_POST["programa"];
$nivel = $_POST["nivel"];
$horasL = $_POST["horasL"];
$horasP = $_POST["horasP"];

$sql = "INSERT 
    INTO programas(
    programa,
    nivel,
    horas_lectivas,
    horas_productivas
    )
    VALUES(
    '$programa',
    '$nivel',
    $horasL,
    $horasP
    )";

$consulta = mysqli_query($conexion, $sql);

if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);