<?php
include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-instructores.php?w=0";
$cedula = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$contratista = $_POST["contratista"];
if (!$contratista) {
    $contratista = 0;
}
;
$activo = $_POST["activo"];
if (!$activo) {
    $activo = 0;
}
;

$sql = "UPDATE
    instructor 
    SET
    id = $cedula,
    nombre = '$nombre',
    apellido = '$apellido',
    telefono = $telefono,
    email = '$email',
    contratista = $contratista,
    activo = $activo
    WHERE id = $cedula";
imprimir($sql);

$consulta = mysqli_query($conexion, $sql);
if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);