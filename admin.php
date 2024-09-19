<?php
require 'includes/funcionesPeliculas.php';

$consulta = obtener_peliculas();

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
            <h1>Administrar peliculas</h1>
            <a href="crearPelicula.php" class="botonForm">REGISTRAR NUEVA PELICULA</a>
            <table>
                <thead>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>PRECIO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </thead>
                <?php while ($datos = mysqli_fetch_assoc($consulta)): ?>
                    <tr id="fila-<?php echo $datos['id'];?>">
                        <td><?php echo htmlspecialchars($datos['id']); ?></td>
                        <td><?php echo htmlspecialchars($datos['titulo']); ?></td>
                        <td class="precio"><?php echo htmlspecialchars($datos['precio']); ?>€</td>
                        <td class="emoji"><button class="btn-modificar" data-id=<?php echo $datos['id']; ?>>✏️</button></td>
                        <td class="emoji"><button class="btn-eliminar" data-nombre="<?php echo $datos['titulo']; ?>" data-id=<?php echo $datos['id']; ?>>✖️</button></td>
                    </tr>
                <?php endwhile; ?>
            </table>

        </main>

        <footer>

        </footer>

    </div>

    <script src="js/admin.js"></script>
</body>

</html>