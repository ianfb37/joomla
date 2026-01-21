<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;

class libros_controller extends BaseController
{
    public function display($cachable = false, $urlparams = array())
    {
        $app = Factory::getApplication();
        // Detectar si la URL dice view=libros o view=libro. Por defecto 'libros'
        $viewName = $this->input->get('view', 'libros');

        // 1. Cargar el archivo de la vista desde su carpeta correspondiente
        $viewPath = JPATH_COMPONENT . "/views/{$viewName}/view.html.php";
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("No existe la carpeta de vista: views/" . $viewName);
        }

        // 2. Configurar la vista
        $className = $viewName . '_view';
        $config = ['app' => $app, 'name' => $viewName];
        $view = new $className($config);

        // 3. Decirle a la vista dónde está su carpeta 'tmpl'
        $view->addTemplatePath(JPATH_COMPONENT . "/views/{$viewName}/tmpl");

        // 4. Cargar el modelo
        require_once JPATH_COMPONENT . '/models/libros_model.php';
        $model = new libros_model();
        $view->setModel($model, true);

        // 5. Mostrar
        $view->setLayout('default');
        $view->display();
    }

    public function save()
    {
        require_once JPATH_COMPONENT . '/models/libros_model.php';
        $model = new libros_model();
        $data = $this->input->post->get('jform', array(), 'array');
        
        if ($model->save($data)) {
            Factory::getApplication()->enqueueMessage('¡Libro guardado!');
        }
        
        // Al guardar, siempre volvemos al listado (libros en plural)
        $this->setRedirect('index.php?option=com_libros&view=libros');
    }
    // Añadir dentro de la clase libros_controller en controllers/libros_controller.php

public function delete()
{
    // 1. Obtener el ID de la URL
    $id = $this->input->get('id', 0, 'int');

    if ($id > 0) {
        require_once JPATH_COMPONENT . '/models/libros_model.php';
        $model = new libros_model();

        if ($model->delete($id)) {
            Factory::getApplication()->enqueueMessage('Libro eliminado correctamente', 'message');
        } else {
            Factory::getApplication()->enqueueMessage('No se pudo eliminar el libro', 'error');
        }
    }

    // 2. Redirigir siempre de vuelta al listado
    $this->setRedirect('index.php?option=com_libros&view=libros');
}

}