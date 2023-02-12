<?php

    include "print.php";
    include "conexion.php";

    $id = $_GET["id"];
    $sql = "DELETE FROM instructor WHERE id = $id";

    imprimir($sql);
    $consulta = mysqli_query($conexion, $sql);
    if ($consulta){
        echo ("<script>window.location.href = '../coordinador-instructores.php?er=0&su=1'</script>");
    }else{
        echo ("<script>window.location.href = '../coordinador-instructores.php?er=1&su=0'</script>");
    };

    mysqli_close($conexion);

?>