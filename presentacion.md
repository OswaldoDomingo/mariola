# Presentación del Proyecto: Sistema de Gestión Académica - Academia Mariola

Este documento sirve como guía completa para la presentación del proyecto ante un tribunal y como manual de despliegue técnico. El sistema ha sido diseñado para gestionar el acceso de alumnos a recursos educativos y la administración de usuarios en una academia de refuerzo escolar.

---

## 1. Descripción General del Proyecto

### Objetivo
El proyecto consiste en una plataforma web diseñada para una academia de clases de apoyo. Su finalidad es centralizar la gestión de alumnos y proporcionar un acceso organizado a recursos didácticos (como vídeos de YouTube y material de estudio) divididos por asignaturas y niveles educativos.

### Público Objetivo
*   **Administradores:** Gestión de alumnos y control de acceso.
*   **Alumnos:** Acceso a materiales de estudio específicos de su nivel y materia.
*   **Invitados:** Consulta de información general sobre la academia.

---

## 2. Arquitectura Técnica

### Stack Tecnológico
*   **Lenguaje Backend:** PHP (Programación orientada a objetos).
*   **Base de Datos:** MySQL / MariaDB.
*   **Frontend:** HTML5, CSS3 y Bootstrap (para un diseño responsivo).
*   **Comunicación BD:** PDO (PHP Data Objects) para garantizar seguridad contra inyecciones SQL.

### Patrón de Diseño
El sistema sigue una estructura inspirada en el patrón **MVC (Modelo-Vista-Controlador)**:
*   **Modelo (`app/modelo/`):** Gestiona la lógica de datos y la comunicación directa con la base de datos.
*   **Controlador (`app/controlador/`):** Actúa como intermediario, procesando las peticiones del usuario y decidiendo qué vista mostrar.
*   **Vista (`web/templates/`):** Se encarga de la representación visual de la información al usuario.
*   **Enrutador (`web/index.php`):** Punto de entrada único que redirige las peticiones según el parámetro `ctl` en la URL.

---

## 3. Funcionamiento y Flujos de Usuario

### A. Acceso y Registro
1.  **Alta de Usuarios:** Los nuevos alumnos pueden registrarse a través de un formulario. El sistema valida los datos (email, teléfono, usuario) y encripta la contraseña mediante un hash seguro antes de guardarla en la base de datos.
2.  **Inicio de Sesión:** El usuario accede introduciendo su nombre de usuario y contraseña. El sistema crea una sesión que almacena el `id_alumno` y el `nivel_usuario` para controlar los permisos.
3.  **Gestión de Usuarios:** El administrador tiene la capacidad de buscar alumnos por ID, modificar sus datos personales o dar de alta nuevos estudiantes directamente.

### B. Acceso a Contenidos (Módulo de Ciencias)
*   El alumno accede a la sección de "Ciencias".
*   Puede seleccionar entre diversas materias: **Biología, Física, Química, Matemáticas y Física-Química**.
*   El sistema consulta la tabla correspondiente en la base de datos y despliega una tabla con el Bloque, Tema y un enlace directo al recurso educativo.

---

## 4. Guía de Instalación y Puesta en Marcha

### Requisitos Previos
*   Servidor Web (Apache o Nginx).
*   PHP 7.4 o superior.
*   MySQL o MariaDB.

### Instalación en Local (Ej: XAMPP, WAMP, Laragon)
1.  Copiar la carpeta del proyecto en el directorio raíz del servidor (ej: `htdocs` o `www`).
2.  Abrir la herramienta de gestión de base de datos (phpMyAdmin).
3.  Crear una base de datos llamada `mariola`.
4.  Importar el archivo `cenfor_bd.sql` proporcionado en la raíz del proyecto.
5.  Configurar las credenciales de acceso en el archivo `/app/libs/Config.php`.

### Instalación en Servidor Remoto (Linux/Ubuntu)
1.  Subir los archivos vía FTP/SSH al directorio `/var/www/html/mariola`.
2.  Configurar los permisos de carpetas: `sudo chown -R www-data:www-data /var/www/html/mariola`.
3.  Crear la base de datos y el usuario en MySQL:
    ```sql
    CREATE DATABASE mariola;
    CREATE USER 'mariola'@'localhost' IDENTIFIED BY 'contraseña_segura';
    GRANT ALL PRIVILEGES ON mariola.* TO 'mariola'@'localhost';
    FLUSH PRIVILEGES;
    ```
4.  Importar la base de datos: `mysql -u mariola -p mariola < cenfor_bd.sql`.
5.  Ajustar el archivo `/app/libs/Config.php` con los datos del servidor remoto.

### Configuración del Archivo `Config.php`
Es fundamental editar las siguientes variables para que el sitio conecte con la base de datos:
*   `$mvc_bd_hostname`: Host del servidor (normalmente `localhost`).
*   `$mvc_bd_nombre`: Nombre de la base de datos (`mariola`).
*   `$mvc_bd_usuario`: Usuario de la base de datos.
*   `$mvc_bd_clave`: Contraseña del usuario.

---

## 5. Resumen para el Tribunal (Puntos Clave)

Al presentar el proyecto, se recomienda destacar:
1.  **Seguridad:** Uso de `password_hash` para contraseñas y `PDO` con sentencias preparadas para evitar ataques SQLi.
2.  **Escalabilidad:** Gracias al controlador genérico de asignaturas, añadir una nueva materia es tan sencillo como crear una tabla en la base de datos y añadir una línea en el controlador.
3.  **Usabilidad:** Interfaz limpia y adaptativa que permite al alumno centrarse en el estudio sin distracciones.
