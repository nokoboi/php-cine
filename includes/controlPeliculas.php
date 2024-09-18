<?php
// Aqui vamos a procesar los datos que nos llegan del formulario
require 'funcionesPeliculas.php';

if(isset($_POST)){
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $director = $_POST['directores'];

    $respuesta = crearPelicula($titulo, $precio, $director);

    if($respuesta){
        echo "Registro creado";
    }else{
        echo "Error: " . mysqli_connect_error();
    }
}
