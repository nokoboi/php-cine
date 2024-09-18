<?php
    require 'includes/funcionesPeliculas.php';

    $consulta = obtener_peliculas();
    $insertar = crearPelicula();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <div class="container">
        <header>

        </header>

        <main>
            <h1>Películas</h1>
            <div class="listado-peliculas">
            <?php while ($datos = mysqli_fetch_assoc($consulta)): ?>
                    <section class="pelicula">
                        <p><?php echo htmlspecialchars($datos['titulo']); ?></p>
                        <p class="precio"><?php echo htmlspecialchars($datos['precio']); ?>€</p>
                        <button class="botonMas">Ver más</button>
                    </section>
                <?php endwhile; ?>
            </div>
        </main>

        <footer>

        </footer>

    </div>
</body>

</html>