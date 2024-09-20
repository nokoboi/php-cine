<?php
// Función para ejecutar consultas y devolver resultados
function ejecutarConsulta($sql)
{
    require 'database.php';
    return mysqli_query($conexion, $sql);
}

// Función para obtener todas las películas
function obtener_peliculas()
{
    $sql = "SELECT * FROM pelicula;";
    return ejecutarConsulta($sql);
}

// Función para obtener una película por ID
function obtenerPeliculaPorID($id)
{
    $sql = "SELECT * FROM pelicula WHERE id=$id;";
    return ejecutarConsulta($sql);
}

// Función para crear una nueva película
function crearPelicula($titulo, $precio, $director)
{
    $sql = "INSERT INTO pelicula(titulo,precio,id_director) VALUES('$titulo', $precio, $director);";
    return ejecutarConsulta($sql);
}

// Función para modificar una película existente
function modificarPelicula($id, $titulo, $precio, $director)
{
    $sql = "UPDATE pelicula SET titulo='$titulo', precio=$precio, id_director=$director WHERE id=$id;";
    return ejecutarConsulta($sql);
}

// Función para eliminar una película
function eliminarPelicula($id)
{
    $sql = "DELETE FROM pelicula WHERE id=$id;";
    return ejecutarConsulta($sql);
}
