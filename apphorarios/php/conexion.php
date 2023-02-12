<?php

    $conexion = mysqli_connect("localhost:3307","root","","horario");
    if($conexion)
    {imprimir('la conexion fue exitosa');}
    else
    {imprimir('no se pudo realizar la conexion');}

?>