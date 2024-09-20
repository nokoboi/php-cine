let botonesEliminar = document.querySelectorAll('.btn-eliminar');
let botonesModificar = document.querySelectorAll('.btn-modificar')

botonesEliminar.forEach(boton => {
    boton.addEventListener('click', event => {
        let botonSeleccionado = event.currentTarget;
        let nombreSeleccionado = botonSeleccionado.getAttribute('data-nombre');
        let id = botonSeleccionado.getAttribute('data-id');

        if (confirm(`¿Seguro que quieres eliminar ${nombreSeleccionado}?`)) {
            console.log(id)

            // Accedemos a control pelicula para coger el metodo que haya, en este caso delete
            fetch('includes/controlPeliculas.php', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id + '&metodo=delete'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Registro eliminado');

                        const fila = document.getElementById(`fila-${id}`);
                        if (fila) {
                            fila.remove();
                        }

                    } else {
                        alert('Error al eliminar: ' + data.message)
                    }
                })
                .catch(error => {
                    console.error('Error: ', error);
                    alert('Ocurrió un error al eliminar')
                });
        }
    })
});

botonesModificar.forEach(boton => {
    boton.addEventListener('click', event => {
        let botonSeleccionado = event.currentTarget;
        let id = botonSeleccionado.getAttribute('data-id');
        console.log(id)

        // Crear un formulario dinámico
        const formulario = document.createElement('form');
        formulario.method = 'POST';
        formulario.action = 'includes/controlPeliculas.php';

        const campoId = document.createElement('input');
        campoId.type = 'hidden';
        campoId.name = 'idPelicula';
        campoId.value = id;

        formulario.appendChild(campoId);

        const campoMetodo = document.createElement('input');
        campoMetodo.type = 'hidden';
        campoMetodo.name = 'metodo';
        campoMetodo.value = 'modificar';

        formulario.appendChild(campoMetodo);

        document.body.appendChild(formulario);
        formulario.submit();
    })
})