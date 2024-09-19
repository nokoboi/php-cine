<?php
require 'includes/funcionesDirectores.php';
session_start();
// comprobar de donde viene la llamada
$directores = obtener_directores();

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
        <h1>REGISTRAR NUEVA PELÍCULA</h1>
        <form class="formulario-creacion" action="includes/controlPeliculas.php" method="POST">
            <input type="hidden" name="metodo" value="crear">
            <div class="campo-form">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="campo-form">
                <label for="precio">Precio</label>
                <input type="number" name="precio" required>
            </div>
            <select name="directores">
                <option value="">Seleccione un director</option>
                <?php
                while ($director = mysqli_fetch_assoc($directores)) { ?>
                    <option value="<?php echo $director['id'] ?>"><?php echo $director['nombre'] ?></option>
                <?php }
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