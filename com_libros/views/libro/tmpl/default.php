<?php
defined('_JEXEC') or die;
// Si existe $this->item, estamos editando, si no, estamos creando
$libro = $this->item;
$titulo_pagina = isset($libro->id) ? 'Editar Libro: ' . $libro->titulo : 'Añadir Nuevo Libro';
?>

<div class="container">
    <h1><?php echo $titulo_pagina; ?></h1>
    
    <form action="index.php?option=com_libros&task=save" method="post">
        
        <!-- CAMPO OCULTO PARA EL ID (Vital para editar) -->
        <input type="hidden" name="jform[id]" value="<?php echo isset($libro->id) ? $libro->id : ''; ?>">

        <div class="form-group mb-3">
            <label>Título</label>
            <input type="text" name="jform[titulo]" class="form-control" 
                   value="<?php echo isset($libro->titulo) ? $this->escape($libro->titulo) : ''; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Autor</label>
            <input type="text" name="jform[autor]" class="form-control" 
                   value="<?php echo isset($libro->autor) ? $this->escape($libro->autor) : ''; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Publicación</label>
            <input type="text" name="jform[publicacion]" class="form-control" 
                   value="<?php echo isset($libro->publicacion) ? $this->escape($libro->publicacion) : ''; ?>">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php?option=com_libros&view=libros" class="btn btn-secondary">Cancelar</a>
        </div>

        <?php echo \Joomla\CMS\HTML\HTMLHelper::_('form.token'); ?>
    </form>
</div>
