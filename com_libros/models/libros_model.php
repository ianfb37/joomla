<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;
use Joomla\CMS\Factory;

class libros_model extends BaseDatabaseModel
{
    // Obtener un solo libro por ID
    public function getItem($id)
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('*')
              ->from($db->quoteName('#__libros'))
              ->where($db->quoteName('id') . ' = ' . (int) $id);
        $db->setQuery($query);
        return $db->loadObject();
    }

    public function save($data)
    {
        $db = $this->getDbo();
        $obj = new \stdClass();
        
        // Mapeamos los datos
        if (!empty($data['id'])) {
            $obj->id = (int) $data['id'];
        }
        $obj->titulo = $data['titulo'];
        $obj->autor = $data['autor'];
        $obj->publicacion = $data['publicacion'];

        try {
            if (empty($obj->id)) {
                // Si no hay ID, INSERTAR
                $db->insertObject('#__libros', $obj);
            } else {
                // Si hay ID, ACTUALIZAR
                $db->updateObject('#__libros', $obj, 'id');
            }
            return true;
        } catch (\Exception $e) {
            Factory::getApplication()->enqueueMessage($e->getMessage(), 'error');
            return false;
        }
    }
    
public function delete($id)
{
    $db = $this->getDbo();
    $query = $db->getQuery(true);

    // Definir la condición de borrado
    $conditions = array($db->quoteName('id') . ' = ' . (int) $id);

    $query->delete($db->quoteName('#__libros'))
          ->where($conditions);

    $db->setQuery($query);

    return $db->execute();
}

    // En models/libros_model.php

public function getItems($search = '')
{
    $db = $this->getDbo();
    $query = $db->getQuery(true);

    $query->select('*')
          ->from($db->quoteName('#__libros'));

    // Si hay algo escrito en el buscador, filtramos
    if (!empty($search)) {
        $search = $db->quote('%' . $db->escape($search, true) . '%');
        
        // Buscamos en titulo O en autor
        $query->where('(' . $db->quoteName('titulo') . ' LIKE ' . $search . 
                      ' OR ' . $db->quoteName('autor') . ' LIKE ' . $search . ')');
    }

    $db->setQuery($query);
    return $db->loadObjectList();
}

}