<?php
include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-instructores.php?w=0";
$cedula = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$contratista = $_POST["contratista"];
$zona = $_POST["zona"];
$direccion = $_POST["direccion"];
$salario = $_POST["salario"];
$especialidad = $_POST["especialidad"];

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
    celular = $celular,
    email = '$email',
    zona = '$zona',
    direccion = '$direccion',
    salario = '$salario',
    especialidad = '$especialidad',
    contratista = $contratista,
    activo = $activo
    WHERE id = $cedula";

$consulta = mysqli_query($conexion, $sql);
if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);