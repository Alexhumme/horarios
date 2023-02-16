<?php
include "../print.php";
include "../conexion.php";

$ROOT = "../../views/coordinador/coordinador-instructores.php?w=0";
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$celular = $_POST["celular"];
$email = $_POST["e-mail"];
$zona = $_POST["zona"];
$direccion = $_POST["direccion"];
$salario = $_POST["salario"];
$especialidad = $_POST["especialidad"];

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
$cedula = $_POST["cedula"];

$sql = "INSERT 
    INTO instructor(
    id,
    nombre,
    apellido,
    telefono,
    celular,
    email,
    zona,
    direccion,
    salario,
    especialidad,
    contratista,
    activo
    )
    VALUES(
    $cedula,
    '$nombre', 
    '$apellido', 
    $telefono, 
    $celular,
    '$email', 
    '$zona',
    '$direccion'
    $salario,
    '$especialidad'
    $contratista, 
    $activo
    )";
imprimir($sql);
$consulta = mysqli_query($conexion, $sql);
if ($consulta) {
    echo ("<script>window.location.href = '$ROOT&er=0&su=1'</script>");
} else {
    echo ("<script>window.location.href = '$ROOT&er=1&su=0'</script>");
}
;

mysqli_close($conexion);