<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

// Llamamos a la clase como hemos puesto en el controlador
class libros_view extends HtmlView
{
    // En views/libros/view.html.php

public function display($tpl = null)
{
    $app = \Joomla\CMS\Factory::getApplication();
    
    // 1. Recoger el texto del buscador (si existe)
    $search = $app->input->get('search', '', 'string');

    // 2. Pasar la búsqueda al modelo y obtener resultados
    $model = $this->getModel();
    $this->items = $model->getItems($search);
    
    // 3. Guardar el texto de búsqueda para volverlo a mostrar en el input
    $this->search = $search;

    parent::display($tpl);
}

}
