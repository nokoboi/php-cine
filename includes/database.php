<?php
// Conexión a la base de datos
// mysqli es para conectar bases de datos con mysql y PDO admite varias bases y orientada a objetos
$conexion = mysqli_connect('localhost','root','','cinebd');
// echo '<pre>';
// var_dump($conexion);
// echo'</pre>';
if(mysqli_connect_errno()){
    echo "La conexión a la base de datos ha fallado: " . mysqli_connect_error();
    exit();
}
