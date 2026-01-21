<?php
defined('_JEXEC') or die;
?>

<div class="container">
    <h2>Gestión de Libros</h2>

    <!-- BARRA DE BÚSQUEDA -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="index.php?option=com_libros&view=libros" method="post" class="row g-2">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Buscar por título o autor..." 
                           value="<?php echo $this->escape($this->search); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="index.php?option=com_libros&view=libros" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- BOTONES DE ACCIÓN -->
    <div class="mb-3">
        <a href="index.php?option=com_libros&view=libro" class="btn btn-success">+ Nuevo</a>
        <button type="button" class="btn btn-warning" onclick="accionSeleccionado('editar')">Editar</button>
        <button type="button" class="btn btn-danger" onclick="accionSeleccionado('eliminar')">Eliminar</button>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="50">Sel.</th>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($this->items)) : ?>
                <?php foreach ($this->items as $item) : ?>
                    <tr>
                        <td><input type="radio" name="libro_sel" value="<?php echo $item->id; ?>"></td>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $this->escape($item->titulo); ?></td>
                        <td><?php echo $this->escape($item->autor); ?></td>
                        <td><?php echo $this->escape($item->publicacion); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">No se encontraron libros que coincidan con la búsqueda.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function accionSeleccionado(tarea) {
    const seleccionado = document.querySelector('input[name="libro_sel"]:checked');
    if (!seleccionado) {
        alert('Por favor, selecciona un libro.');
        return;
    }
    const id = seleccionado.value;

    if (tarea === 'editar') {
        window.location.href = 'index.php?option=com_libros&view=libro&id=' + id;
    } 
    if (tarea === 'eliminar') {
        if (confirm('¿Borrar este libro?')) {
            window.location.href = 'index.php?option=com_libros&task=delete&id=' + id;
        }
    }
}
</script>