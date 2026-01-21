<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Component\ComponentHelper;

$app = Factory::getApplication();
$input = $app->input;

ComponentHelper::getComponent('com_libros');

// Si no viene controlador en la URL, por defecto es 'libros'
$controllerName = $input->getCmd('controller', 'libros');

// Construimos la ruta: /controllers/libros_controller.php
$controllerPath = __DIR__ . '/controllers/' . strtolower($controllerName) . '_controller.php';

// El nombre de la clase que tú quieres usar
$controllerClass = strtolower($controllerName) . '_controller';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
} else {
    throw new \Exception("No se encontró el archivo del controlador en: " . $controllerPath);
}

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    // Ejecutamos la tarea (display, save, etc.)
    $controller->execute($input->get('task', 'display'));
    $controller->redirect();
} else {
    throw new \Exception("La clase $controllerClass no existe en el archivo.");
}
