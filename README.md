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

administrator/components/com_libros/
├── controllers/
│   └── libros_controller.php    # Gestión de tareas (save, delete, display)
├── models/
│   └── libros_model.php         # Consultas SQL a la base de datos
├── views/
│   ├── libros/                  # Vista del listado (Plural)
│   │   ├── view.html.php
│   │   └── tmpl/
│   │       └── default.php
│   └── libro/                   # Vista del formulario (Singular)
│       ├── view.html.php
│       └── tmpl/
│           └── default.php
├── libros.php                   # Punto de entrada del componente
└── access.xml                   # Configuración de permisos (ACL)

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
