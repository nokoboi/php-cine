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
            <button>REGISTRAR NUEVA PELICULA</button>
            <table>
                <thead>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>PRECIO</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>
                </thead>
                <?php while ($datos = mysqli_fetch_assoc($consulta)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($datos['id']); ?></td>
                        <td><?php echo htmlspecialchars($datos['titulo']); ?></td>
                        <td class="precio"><?php echo htmlspecialchars($datos['precio']); ?>€</td>
                        <td class="emoji"><button>✏️</button></td>
                        <td class="emoji"><button>✖️</button></td>
                    </tr>
                <?php endwhile; ?>
            </table>

        </main>

        <footer>

        </footer>

    </div>
</body>

</html>