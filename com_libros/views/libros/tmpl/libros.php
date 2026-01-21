<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>Listado de Libros</h1>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Publicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $item) : ?>
        <tr>
            <td><?php echo htmlspecialchars($item->titulo); ?></td>
            <td><?php echo htmlspecialchars($item->autor); ?></td>
            <td><?php echo htmlspecialchars($item->publicacion); ?></td>
            <td>
                <a href="<?php echo JRoute::_('index.php?option=com_libros&task=libros.edit&id=' . $item->id); ?>" class="btn btn-primary">Editar</a>
                <a href="<?php echo JRoute::_('index.php?option=com_libros&task=libros.delete&id=' . $item->id); ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo JRoute::_('index.php?option=com_libros&task=libros.add'); ?>" class="btn btn-success">Agregar Libro</a>
