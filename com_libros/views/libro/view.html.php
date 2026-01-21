<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Factory;

class libro_view extends HtmlView
{
    protected $item;

    public function display($tpl = null)
    {
        $app = Factory::getApplication();
        // Capturamos el ID de la URL (si existe)
        $id = $app->input->get('id', 0, 'int');

        // Si hay ID, pedimos al modelo los datos de ese libro
        if ($id > 0) {
            $model = $this->getModel();
            $this->item = $model->getItem($id);
        }

        parent::display($tpl);
    }
}
