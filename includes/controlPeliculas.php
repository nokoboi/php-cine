<?php
// Aqui vamos a procesar los datos que nos llegan del formulario
session_start();
require 'funcionesPeliculas.php';

$metodo = '';
if(isset($_POST) && isset($_POST['metodo'])){
    $metodo = $_POST['metodo'];
}

if ($metodo === 'crear') {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $director = $_POST['directores'];

    $respuesta = crearPelicula($titulo, $precio, $director);

    if ($respuesta) {
        $_SESSION['mensaje'] = "Los datos se insertaron correctamente";
        $_SESSION['datos_insertados'] = [
            'titulo' => $titulo,
            'precio' => $precio,
            'director' => $director
        ];

    } else {
        $_SESSION['mensaje'] = "Error: " . mysqli_connect_error();
    }

    header("Location: ../crearPelicula.php");
    exit(); 
}

if ($metodo === 'delete') {
    $id = $_POST['id'];
    $respuesta = eliminarPelicula($id);

    if ($respuesta) {
        echo json_encode(['success' => true, 'message' => 'Pelicula eliminada']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incorrectos']);
    }

}else{
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

if ($metodo === 'modificar') {
    $_SESSION['idPelicula'] = $_POST['idPelicula'];
    $_SESSION['metodo'] = $_POST['metodo'];

    header('Location: ../crearPelicula.php');
}

if($metodo === 'modificacion'){
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $director = $_POST['directores'];

    $respuesta = modificarPelicula($id, $titulo, $precio, $director);

    if ($respuesta) {
        $_SESSION['mensaje'] = "Los datos se modificaron correctamente";
        $_SESSION['datos_insertados'] = [
            'titulo' => $titulo,
            'precio' => $precio,
            'director' => $director
        ];

    } else {
        $_SESSION['mensaje'] = "Error: " . mysqli_connect_error();
    }

    header("Location: ../crearPelicula.php");
    exit(); 

}
