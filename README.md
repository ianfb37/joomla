Joomla Component: com_libros 📚

Este es un componente para el panel de administración de Joomla diseñado para la gestión de un catálogo de libros. Sigue la arquitectura MVC (Modelo-Vista-Controlador) estándar de Joomla.
🚀 Características

El componente incluye un sistema CRUD completo:

    Listado Dinámico: Visualización de todos los libros almacenados.
    Buscador: Filtrado en tiempo real por Título o Autor.
    Creación: Vista independiente con formulario para añadir nuevos libros.
    Edición: Sistema de selección mediante Radio Buttons para editar registros existentes.
    Eliminación: Función de borrado con confirmación de seguridad.
    Interfaz Responsiva: Construido utilizando clases de Bootstrap (integrado en Joomla).

📂 Estructura del Proyecto

<ul> <li> 📁 <b>com_libros/</b> <ul> <li> 📁 <b>controllers/</b> <ul> <li>📄 <code>libros_controller.php</code></li> </ul> </li> <li> 📁 <b>models/</b> <ul> <li>📄 <code>libros_model.php</code></li> </ul> </li> <li> 📁 <b>views/</b> <ul> <li> 📁 <b>libros/</b> <small>(Listado)</small> <ul> <li>📄 <code>view.html.php</code></li> <li>📁 <b>tmpl/</b> ➔ 📄 <code>default.php</code></li> </ul> </li> <li> 📁 <b>libro/</b> <small>(Formulario)</small> <ul> <li>📄 <code>view.html.php</code></li> <li>📁 <b>tmpl/</b> ➔ 📄 <code>default.php</code></li> </ul> </li> </ul> </li> <li>📄 <code>libros.php</code> <small>(Entrada principal)</small></li> <li>📄 <code>libros.xml</code> <small>(Instalador)</small></li> </ul> </li> </ul>

🛠️ Instalación
Requisitos previos

    Joomla 3.x, 4.x o 5.x.
    Base de datos con la tabla #__libros.

Configuración de la Base de Datos

Asegúrate de tener creada la tabla necesaria en tu base de datos de Joomla:

CREATE TABLE IF NOT EXISTS `#__libros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `autor` VARCHAR(255) NOT NULL,
  `publicacion` VARCHAR(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

🛠️ Tecnologías utilizadas

    PHP (Lógica de servidor)
    MySQL/MariaDB (Persistencia de datos)
    JavaScript (Interacción en el cliente y validaciones)
    Joomla API (Framework MVC)
    Bootstrap (Estilos UI)
