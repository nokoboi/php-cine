<?php

function obtener_peliculas()
{
    // Importamos la conexión
    require 'database.php';

    // Preparamos la consulta
    $sql = "select * from pelicula;";

    // Realizamos la consulta
    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
    // Obtener los datos de la consulta
    // $datos = mysqli_fetch_assoc($resultado);

    // echo '<pre>';
    // var_dump($datos);
    // echo '</pre>';
}

function obtenerPeliculaPorID(){

}

function crearPelicula($titulo, $precio, $director){
   require 'database.php';
   $sql = "insert into pelicula(titulo,precio,id_director) values('$titulo',$precio,$director);";

   // Realizar la consulta
   $resultado = mysqli_query($conexion, $sql);
   return $resultado;
}

function modificarPelicula(){

}

function eliminarPelicula(){

}