<?php
require 'includes/funcionesDirectores.php';
require 'includes/funcionesPeliculas.php';
session_start();
$directores = obtener_directores();

$pelicula = '';
if (isset($_SESSION['metodo']) && $_SESSION['metodo'] === 'modificar') {
    // Modificar pelicula
    $id = $_SESSION['idPelicula'];
    $respuesta = obtenerPeliculaPorID($id);
    $pelicula = mysqli_fetch_assoc($respuesta);

    unset($_SESSION['metodo']);
    unset($_SESSION['idPelicula']);

    // var_dump($pelicula);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pelicula</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <?php echo ($pelicula != '') ? '<h1>MODIFICAR PELICULA</h1>' : '<h1>REGISTRAR NUEVA PELÍCULA</h1>' ?>
        <form class="formulario-creacion" action="includes/controlPeliculas.php" method="POST">
            <input type="hidden" name="metodo" value="<?php echo ($pelicula != '') ? 'modificacion' : 'crear' ?>">
            <input type="hidden" name="id" value="<?php echo ($pelicula != '') ? $pelicula['id'] : '' ?>">
            <div class="campo-form">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" value="<?php echo ($pelicula != '') ? $pelicula['titulo'] : '' ?>"
                    required>
            </div>
            <div class="campo-form">
                <label for="precio">Precio</label>
                <input type="number" name="precio" value="<?php echo ($pelicula != '') ? $pelicula['precio'] : '' ?>"
                    required>
            </div>
            <select name="directores">
                <option value="">Seleccione un director</option>
                <?php
                $currectDirector = ($pelicula != '') ? $pelicula['id_director'] : '';
                while ($director = mysqli_fetch_assoc($directores)) {
                    $selected = ($currectDirector == $director['id']) ? 'selected' : '';
                    echo "<option $selected value='$director[id]'> $director[nombre] $director[apellido]</option>";
                    
                }
                ?>
            </select>

            <div class="campo-form">
                <button class="botonForm" type="submit">Enviar datos</button>
                <a href="admin.php" class="botonForm">Volver</a>
            </div>
        </form>
        <div class="ultimosDatos">
            <?php
            if (isset($_SESSION['datos_insertados'])) {
                echo "<p>" . $_SESSION['mensaje'] . "</p>";
                unset($_SESSION["mensaje"]);
            }
            if (isset($_SESSION["datos_insertados"])) {
                echo "<h2>Última película insertada:</h2>";
                echo "<ul>";
                foreach ($_SESSION["datos_insertados"] as $campo => $valor) {
                    echo "<li>" . ucfirst($campo) . ": " . htmlspecialchars($valor) . "</li>";
                }
                echo "</ul>";

                unset($_SESSION["datos_insertados"]);
            }
            ?>
        </div>

    </div>
</body>

</html>