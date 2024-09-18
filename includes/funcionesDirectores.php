<?php

function obtener_directores()
{
    // Importamos la conexión
    require 'database.php';

    // Preparamos la consulta
    $sql = "select * from director;";

    // Realizamos la consulta
    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}