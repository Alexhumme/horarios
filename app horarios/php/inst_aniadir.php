<?php
include "./print.php";
include "./conexion.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["e-mail"];
$contratista = $_POST["contratista"];
if (!$contratista){$contratista = 0;};
$activo = $_POST["activo"];
if (!$activo){$activo = 0;};
$cedula = $_POST["cedula"];

$sql = "INSERT 
    INTO instructor(
    id,
    idinstructor,
    nombre,
    apellido,
    telefono,
    email,
    contratista,
    activo
    )
    VALUES(
    '$id',
    '$cedula',
    '$nombre', 
    '$apellido', 
    '$telefono', 
    '$email', 
    $contratista, 
    $activo
    )";
imprimir($sql);
$consulta = mysqli_query($conexion, $sql);
if ($consulta){
    echo ("<script>window.location.href = '../coordinador-instructores.php?er=0&su=1'</script>");
}else{
    echo ("<script>window.location.href = '../coordinador-instructores.php?er=1&su=0'</script>");
};

mysqli_close($conexion);

?>