# INFORME COMPLETO DEL PROYECTO
# Sistema de Gestión Académica — Academia Mariola / CENFOR

---

> **Fecha del informe:** Mayo 2026  
> **Versión del sistema:** 1.0 (en desarrollo activo)  
> **Entorno de producción:** Linux / Apache / PHP 8.2 / MariaDB 10.4  

---

## ÍNDICE

1. [Descripción General](#1-descripción-general)
2. [Arquitectura del Sistema](#2-arquitectura-del-sistema)
3. [Estructura de Directorios](#3-estructura-de-directorios)
4. [Capa de Datos — Base de Datos](#4-capa-de-datos--base-de-datos)
5. [Capa de Lógica — Backend PHP](#5-capa-de-lógica--backend-php)
6. [Capa de Presentación — Frontend](#6-capa-de-presentación--frontend)
7. [Sistema de Enrutamiento](#7-sistema-de-enrutamiento)
8. [Gestión de Usuarios y Permisos](#8-gestión-de-usuarios-y-permisos)
9. [Seguridad](#9-seguridad)
10. [Funcionalidades Implementadas](#10-funcionalidades-implementadas)
11. [Funcionalidades Pendientes / En Construcción](#11-funcionalidades-pendientes--en-construcción)
12. [Bugs y Problemas Conocidos](#12-bugs-y-problemas-conocidos)
13. [Historial de Cambios](#13-historial-de-cambios)
14. [Guía de Instalación](#14-guía-de-instalación)
15. [Conclusiones y Mejoras Propuestas](#15-conclusiones-y-mejoras-propuestas)

---

## 1. Descripción General

**Academia Mariola** (también identificada como **CENFOR** — Centro de Formación) es una plataforma web de gestión académica desarrollada en PHP orientado a objetos. Su propósito principal es centralizar la gestión de alumnos de una academia de clases de apoyo y proporcionar acceso organizado a recursos educativos (vídeos de YouTube y material didáctico) clasificados por asignaturas.

### 1.1 Objetivo del proyecto

Desarrollar una aplicación web que permita:

- A los **administradores**: gestionar el alta, baja y modificación de alumnos y recursos académicos.
- A los **alumnos registrados**: acceder a materiales didácticos organizados por áreas (Ciencias, Letras, Otros).
- A los **visitantes/invitados**: consultar información general sobre la academia (localización, contacto, preguntas frecuentes).

### 1.2 Tecnologías utilizadas

| Componente         | Tecnología                          |
|--------------------|-------------------------------------|
| Backend            | PHP 8.2 (Programación orientada a objetos) |
| Base de datos      | MariaDB 10.4 / MySQL                |
| Frontend           | HTML5, CSS3, Bootstrap 5.3.3        |
| Iconografía        | Bootstrap Icons 1.11.3              |
| Comunicación BD    | PDO (PHP Data Objects)              |
| Servidor web       | Apache / Nginx                      |
| Codificación       | UTF-8 / utf8mb4                     |

---

## 2. Arquitectura del Sistema

El proyecto sigue una estructura inspirada en el patrón **MVC (Modelo–Vista–Controlador)**, con un único punto de entrada y un enrutador centralizado.

```
Solicitud HTTP
      │
      ▼
web/index.php  ◄── Punto de entrada único (Front Controller)
      │
      ├── Inicia sesión PHP
      ├── Carga librerías (Config, bGeneral, bSeguridad)
      ├── Carga modelos (classModelo, classAlumno, classAsignatura)
      ├── Carga controlador (Controller.php)
      ├── Parsea el parámetro GET ?ctl=...
      ├── Verifica permisos (nivel_usuario de sesión)
      │
      ▼
Controller.php  ◄── Controlador único
      │
      ├── Llama al Modelo (classAlumno / classAsignatura)
      │         │
      │         └── Consulta a MariaDB via PDO
      │
      └── Carga la Vista correspondiente (web/templates/*.php)
                │
                └── Incluye layout.php (cabecera, menú, pie)
```

### 2.1 Patrón de diseño

- **Modelo**: Clases PHP que encapsulan el acceso a datos mediante PDO con sentencias preparadas.
- **Vista**: Archivos PHP/HTML en `web/templates/` que utilizan `ob_start()` / `ob_get_clean()` para buffering de salida antes de incluir el `layout.php`.
- **Controlador**: Clase `Controller` con métodos públicos que se mapean a rutas. Actúa de intermediario entre modelo y vista.
- **Enrutador**: El archivo `web/index.php` implementa un array de mapeo (`$map`) que asocia cada ruta (`?ctl=`) con su controlador, acción y nivel mínimo de acceso.

---

## 3. Estructura de Directorios

```
mariola/
│
├── app/                          # Lógica de negocio (backend)
│   ├── controlador/
│   │   └── Controller.php        # Controlador único de la aplicación
│   ├── libs/
│   │   ├── Config.php            # Configuración: BD y CSS
│   │   ├── bGeneral.php          # Funciones de sanitización y validación
│   │   └── bSeguridad.php        # Funciones de encriptación de contraseñas
│   ├── modelo/
│   │   ├── classModelo.php       # Clase base: conexión PDO
│   │   ├── classAlumno.php       # Modelo de alumnos (CRUD)
│   │   └── classAsignatura.php   # Modelo de recursos académicos (CRUD)
│   └── log/                      # Archivos de log de errores (runtime)
│
├── web/                          # Capa de presentación (frontend)
│   ├── index.php                 # Punto de entrada y enrutador
│   ├── templates/                # Vistas (plantillas PHP/HTML)
│   │   ├── layout.php            # Plantilla maestra (cabecera, nav, footer)
│   │   ├── inicio.php            # Página de inicio (invitados y usuarios)
│   │   ├── inicioadm.php         # Panel de control del administrador
│   │   ├── ciencias.php          # Menú del área de Ciencias
│   │   ├── asignatura.php        # Vista genérica de asignatura (tabla de recursos)
│   │   ├── matematicas.php       # Vista específica de Matemáticas (legacy)
│   │   ├── construccion.php      # Página "En construcción"
│   │   ├── formInicioSesion.php  # Formulario de login
│   │   ├── formRegistro.php      # Formulario de registro de alumnos
│   │   ├── insertarAlumno.php    # Formulario (admin): alta de alumno
│   │   ├── insertarMatematicas.php # Formulario (admin): insertar recurso
│   │   ├── modificarAlumno.php   # Formulario (admin): editar alumno
│   │   ├── menuHome.php          # Menú para visitantes no autenticados
│   │   ├── menuInvitado.php      # Menú para invitados (nivel 0)
│   │   ├── menuUser.php          # Menú para alumnos (nivel 1)
│   │   ├── menuAdmin.php         # Menú para administradores (nivel 2)
│   │   └── error.php             # Página de error genérica
│   ├── css/                      # Hojas de estilo
│   │   ├── style.css             # Estilos principales
│   │   ├── estillogin.css        # Estilos del formulario de login
│   │   ├── stylephp.css          # Estilos complementarios PHP/HTML
│   │   └── css-modificado.css    # Estilos adicionales
│   ├── image/                    # Imágenes estáticas (19 archivos)
│   ├── video/                    # Vídeos para el hero de la página
│   └── audio/                    # Archivos de audio
│
├── pruebas-comprobaciones/       # Scripts de prueba y diagnóstico
│   ├── comprobacion_conexion.php
│   └── comprobando_funciones.php
│
├── cenfor_bd.sql                 # Script SQL de la base de datos principal
├── mariola.sql                   # Script SQL alternativo
├── matematicas.sql               # Script SQL de la tabla de matemáticas
├── test_connection.php           # Script de prueba de conexión
├── avances.md                    # Registro de cambios y avances
├── presentacion.md               # Documentación para presentación al tribunal
├── skills-lock.json              # Archivo de configuración de herramientas
└── .gitignore                    # Exclusiones de control de versiones
```

---

## 4. Capa de Datos — Base de Datos

### 4.1 Información de conexión

| Parámetro  | Valor      |
|------------|------------|
| Host       | localhost  |
| Base de datos | mariola / cenfor_bd |
| Usuario    | mariola    |
| Motor      | MariaDB 10.4 / MySQL |
| Charset    | utf8mb4    |

> **Configuración:** Los parámetros de conexión se definen en `app/libs/Config.php` mediante la clase estática `Config`.

### 4.2 Diagrama de tablas

La base de datos consta de **11 tablas** organizadas en dos grupos funcionales:

#### Tablas de gestión de usuarios

| Tabla    | Descripción                                   | PK          |
|----------|-----------------------------------------------|-------------|
| `alumnos` | Almacena los datos de todos los usuarios del sistema | `id_alumno` (AUTO_INCREMENT) |
| `cursos`  | Catálogo de niveles educativos disponibles    | `id_curso`  |

#### Tablas de recursos académicos

| Tabla          | Asignatura         | PK                  |
|----------------|--------------------|---------------------|
| `matematicas`  | Matemáticas        | `id_matematicas`    |
| `biologia`     | Biología           | `id_biologia`       |
| `fisica`       | Física             | `id_fisica`         |
| `fisicaquimica`| Física-Química     | `id_fisica-quimica` |
| `quimica`      | Química            | `id_quimica`        |
| `castellano`   | Castellano/Lengua  | `id_castellano`     |
| `ingles`       | Inglés             | `id_ingles`         |
| `historia`     | Historia           | `id_historia`       |
| `valenciano`   | Valenciano         | `id_valenciano`     |

### 4.3 Estructura de la tabla `alumnos`

```sql
CREATE TABLE alumnos (
  id_alumno      INT(11)       NOT NULL AUTO_INCREMENT,
  nombre         VARCHAR(100)  NOT NULL,
  apellidos      VARCHAR(100)  NOT NULL,
  usuario        VARCHAR(50)   NOT NULL  UNIQUE,
  email          VARCHAR(100)  NOT NULL  UNIQUE,
  pass           VARCHAR(255)  NOT NULL,           -- Hash bcrypt
  telefono       VARCHAR(20)   NOT NULL,
  centro         VARCHAR(255)  DEFAULT NULL,        -- Centro educativo
  curso          INT(11)       DEFAULT NULL,        -- FK a cursos.id_curso
  nivel_usuario  INT(11)       NOT NULL DEFAULT 1   -- 0=invitado, 1=alumno, 2=admin
);
```

### 4.4 Estructura de la tabla `cursos`

```sql
CREATE TABLE cursos (
  id_curso  INT(11)      NOT NULL AUTO_INCREMENT,
  nombre    VARCHAR(50)  DEFAULT NULL  UNIQUE
);
```

**Valores disponibles:** Primaria, 1ESO, 2ESO, 3ESO, 4ESO, 1Bachiller, 2Bachiller, Otros.

### 4.5 Estructura genérica de tablas de asignaturas

Todas las tablas de recursos académicos comparten la misma estructura:

```sql
CREATE TABLE <asignatura> (
  id_<asignatura>  INT(11)       NOT NULL AUTO_INCREMENT,
  bloque           VARCHAR(50)   NOT NULL,   -- Bloque temático
  tema             VARCHAR(100)  NOT NULL,   -- Nombre del tema
  recurso          VARCHAR(255)  NOT NULL,   -- URL del recurso (YouTube, etc.)
  nivel            VARCHAR(25)   NOT NULL    -- Nivel educativo
);
```

### 4.6 Relaciones

- `alumnos.curso` → `cursos.id_curso` (FK con `ON DELETE CASCADE ON UPDATE CASCADE`)

### 4.7 Estado de los datos (datos de ejemplo)

| Tabla          | Registros |
|----------------|-----------|
| `alumnos`      | 17        |
| `cursos`       | 8         |
| `matematicas`  | 3         |
| `castellano`   | 3         |
| `fisica`       | 2         |
| `fisicaquimica`| 2         |
| Resto de tablas| 0 (vacías)|

---

## 5. Capa de Lógica — Backend PHP

### 5.1 `app/libs/Config.php` — Configuración

Clase estática que centraliza la configuración de la aplicación:

- Credenciales de la base de datos (`$mvc_bd_hostname`, `$mvc_bd_nombre`, `$mvc_bd_usuario`, `$mvc_bd_clave`)
- Listado de hojas de estilo CSS a cargar (`$mvc_vis_css`)
- Método `cargarCss()` para inyectar los `<link>` en el HTML

### 5.2 `app/libs/bGeneral.php` — Librería de funciones generales

Contiene las funciones de **sanitización y validación** de entrada de usuario:

| Función                  | Descripción                                                    |
|--------------------------|----------------------------------------------------------------|
| `sinTildes($frase)`      | Elimina caracteres con tilde de una cadena                     |
| `sinEspacios($frase)`    | Elimina espacios redundantes con `trim()` + `preg_replace()`   |
| `recoge($var)`           | Sanitiza un campo de `$_REQUEST` (strips tags + sin espacios)  |
| `recogeArray($var)`      | Sanitiza un array de `$_REQUEST`                               |
| `cTexto(...)`            | Valida texto (letras, espacios, tildes) con longitud min/max    |
| `cUser(...)`             | Valida nombres de usuario (alfanumérico + guión bajo)          |
| `cEmail(...)`            | Valida email con `filter_var(FILTER_VALIDATE_EMAIL)`           |
| `cNum(...)`              | Valida que el valor sea numérico y dentro de un rango          |
| `cRadio(...)`            | Valida que el valor esté en un conjunto de valores válidos     |
| `cSelect(...)`           | Valida un valor de `<select>` contra un array de claves válidas|
| `cCheck(...)`            | Valida selecciones múltiples (checkboxes)                      |
| `cFile(...)`             | Valida y sube archivos al servidor (extensión + tamaño)        |
| `validarEnlaceYouTube(...)` | Valida el formato de URL de YouTube corto (`youtu.be`)      |
| `unixFechaAAAAMMDD(...)` | Valida y convierte fecha a timestamp Unix                      |

### 5.3 `app/libs/bSeguridad.php` — Librería de seguridad

| Función                    | Descripción                                              |
|----------------------------|----------------------------------------------------------|
| `encriptar($password, $cost)` | Genera hash bcrypt con `password_hash()` (coste: 10) |
| `comprobarhash($pass, $passBD)` | Verifica la contraseña con `password_verify()`     |

### 5.4 `app/modelo/classModelo.php` — Modelo base

Clase `Modelo` que extiende `PDO` y establece la conexión a la base de datos:

- Usa la configuración de `Config.php`
- Establece el charset `utf8`
- Activa el modo de errores `PDO::ERRMODE_EXCEPTION`

### 5.5 `app/modelo/classAlumno.php` — Modelo de alumnos

La clase `Alumno` extiende `Modelo` e implementa las siguientes operaciones:

| Método                          | Descripción                                       |
|---------------------------------|---------------------------------------------------|
| `consultarAlumnoPorId($id)`      | Busca un alumno por su ID                        |
| `consultarAlumnoPorUsuario($u)`  | Busca un alumno por nombre de usuario            |
| `verAlumnos()`                   | Lista todos los alumnos ordenados por apellidos  |
| `insertarUsuario(...)`           | Inserta un nuevo alumno (8 campos)               |
| `eliminarUsuario($id)`           | Elimina un alumno por ID                         |
| `actualizarUsuario(...)`         | Actualiza los datos de un alumno                 |
| `listarCursos()`                 | Devuelve el catálogo de cursos                   |

### 5.6 `app/modelo/classAsignatura.php` — Modelo de asignaturas

La clase `Asignatura` extiende `Modelo` e implementa operaciones genéricas sobre tablas de recursos:

| Método                              | Descripción                                              |
|-------------------------------------|----------------------------------------------------------|
| `insertarRecurso($tabla, ...)`       | Inserta un recurso en cualquier tabla de asignatura     |
| `listarMatematicas()`               | Lista recursos de matemáticas (función específica)      |
| `listarAsignatura($tabla)`          | Lista recursos de cualquier asignatura (función genérica)|
| `eliminarMatematicas($id)`          | Elimina un recurso de matemáticas (función específica)  |
| `eliminarRecurso($tabla, $idCampo, $idValor)` | Elimina un recurso de cualquier tabla      |
| `modificarRecurso($tabla, ...)`     | Actualiza un recurso con construcción dinámica de SQL   |

> **Nota de diseño:** Las funciones específicas por asignatura (comentadas en el código) fueron refactorizadas en funciones genéricas más escalables que reciben el nombre de la tabla como parámetro.

### 5.7 `app/controlador/Controller.php` — Controlador principal

Clase `Controller` que agrupa todos los métodos de acción de la aplicación:

| Método              | Nivel | Descripción                                                    |
|---------------------|-------|----------------------------------------------------------------|
| `home()`            | 0     | Página principal para visitantes no autenticados               |
| `inicio()`          | 0     | Página de inicio según el nivel (usuario o administrador)      |
| `registro()`        | 0     | Formulario de registro de nuevos alumnos con validación        |
| `iniciarSesion()`   | 0     | Formulario de login con verificación de contraseña             |
| `error()`           | 0     | Página de error genérica                                       |
| `salir()`           | 1     | Destruye la sesión y redirige al home                          |
| `ciencias()`        | 1     | Menú del área de Ciencias                                      |
| `matematicas()`     | 1     | Delega en `mostrarAsignatura('matematicas', 'Matemáticas')`    |
| `biologia()`        | 1     | Delega en `mostrarAsignatura('biologia', 'Biología')`          |
| `fisica()`          | 1     | Delega en `mostrarAsignatura('fisica', 'Física')`              |
| `fisica_quimica()`  | 1     | Delega en `mostrarAsignatura('fisicaquimica', 'Física-Química')`|
| `quimica()`         | 1     | Delega en `mostrarAsignatura('quimica', 'Química')`            |
| `letras()`          | 1     | Muestra página "En construcción"                               |
| `otros()`           | 1     | Muestra página "En construcción"                               |
| `insertarAlumno()`  | 2     | Formulario de alta de alumno (desde panel de admin)            |
| `modificarAlumno()` | 2     | Búsqueda y edición de datos de un alumno                       |
| `insertarMatematicas()` | 2 | Método vacío (pendiente de implementación)                 |
| `modificarMatematicas()` | 2 | Gestión de modificación de recursos de matemáticas       |
| `eliminarMatematicas()` | 2 | Gestión de eliminación de recursos de matemáticas         |
| `consultarMatematicas()` | 2 | Consulta de recursos de matemáticas                      |
| `mostrarAsignatura()` | —   | Método privado genérico: carga datos y vista de una asignatura |
| `cargaMenu()`       | —     | Método privado: selecciona el menú según `nivel_usuario`       |

---

## 6. Capa de Presentación — Frontend

### 6.1 Layout principal (`web/templates/layout.php`)

Plantilla HTML maestra que define la estructura de todas las páginas:

- **DOCTYPE:** HTML 4.01 Transitional
- **Cabecera:** Carga Bootstrap 5.3.3 (CDN), Bootstrap Icons 1.11.3 (CDN) y los 4 CSS propios.
- **Navbar:** Incluye dinámicamente el archivo de menú correspondiente (`$menu`).
- **Contenido:** Inyecta la variable `$contenido` generada por cada vista con `ob_start()`.
- **Footer:** Incluye dirección física (C/ Vicente Zaragozá, 16 Bajo, Silla), teléfono, correo, mapa de Google Maps embebido y enlaces a redes sociales.

### 6.2 Menús disponibles

| Archivo               | Nivel | Elementos                                                 |
|-----------------------|-------|-----------------------------------------------------------|
| `menuHome.php`        | —     | Acceso público; no requiere sesión                        |
| `menuInvitado.php`    | 0     | Inicio, Iniciar sesión, Registro                          |
| `menuUser.php`        | 1     | Inicio, Ciencias, Letras, Otros, Cerrar sesión            |
| `menuAdmin.php`       | 2     | Inicio, Insertar/Eliminar/Modificar/Buscar alumno, Cerrar sesión |

### 6.3 Vistas disponibles

| Vista                    | Descripción                                             |
|--------------------------|---------------------------------------------------------|
| `inicio.php`             | Página pública con vídeo hero, servicios, FAQ (invitados) |
| `inicioadm.php`          | Panel de administración con botones CRUD de alumnos y asignaturas |
| `ciencias.php`           | Menú de materias del área científica con tarjetas de color |
| `asignatura.php`         | Tabla dinámica de recursos: Bloque, Tema, Enlace        |
| `formInicioSesion.php`   | Formulario de login                                     |
| `formRegistro.php`       | Formulario de registro con checkboxes de asignaturas    |
| `insertarAlumno.php`     | Formulario de alta de alumno (admin)                    |
| `insertarMatematicas.php`| Formulario para añadir recursos a Matemáticas           |
| `modificarAlumno.php`    | Búsqueda por ID + formulario de edición                 |
| `construccion.php`       | Página "En construcción" para secciones pendientes      |
| `error.php`              | Página de error genérica                                |
| `layout.php`             | Plantilla maestra (no se usa directamente como vista)   |

### 6.4 Recursos estáticos

| Tipo       | Carpeta         | Descripción                                        |
|------------|-----------------|----------------------------------------------------|
| CSS        | `web/css/`      | 4 hojas de estilo propias + Bootstrap (CDN)       |
| Imágenes   | `web/image/`    | 19 imágenes (JPEG, PNG, JPG) para secciones y hero|
| Vídeos     | `web/video/`    | Vídeo de fondo para el hero de la página de inicio |
| Audio      | `web/audio/`    | Archivos de audio (uso no implementado visualmente)|

---

## 7. Sistema de Enrutamiento

El enrutamiento se gestiona en `web/index.php` mediante un array asociativo `$map`:

### 7.1 Tabla de rutas

| Ruta (`?ctl=`)       | Método del controlador    | Nivel mínimo | Estado       |
|----------------------|---------------------------|:------------:|:------------:|
| `home`               | `home()`                  | 0            | ✅ Activa    |
| `inicio`             | `inicio()`                | 0            | ✅ Activa    |
| `iniciarSesion`      | `iniciarSesion()`         | 0            | ✅ Activa    |
| `registro`           | `registro()`              | 0            | ✅ Activa    |
| `salir`              | `salir()`                 | 1            | ✅ Activa    |
| `error`              | `error()`                 | 0            | ✅ Activa    |
| `ciencias`           | `ciencias()`              | 1            | ✅ Activa    |
| `letras`             | `letras()`                | 1            | ⚠️ En construcción |
| `otros`              | `otros()`                 | 1            | ⚠️ En construcción |
| `matematicas`        | `matematicas()`           | 1            | ✅ Activa    |
| `biologia`           | `biologia()`              | 1            | ✅ Activa    |
| `fisica`             | `fisica()`                | 1            | ✅ Activa    |
| `fisica_quimica`     | `fisica_quimica()`        | 1            | ✅ Activa    |
| `quimica`            | `quimica()`               | 1            | ✅ Activa    |
| `modificarAlumno`    | `modificarAlumno()`       | 2            | ✅ Activa    |
| `insertarMatematicas`| `insertarMatematicas()`   | 2            | ❌ Vacío    |
| `modificarMatematicas`| `modificarMatematicas()` | 2            | ✅ Activa    |
| `eliminarMatematicas`| `eliminarMatematicas()`   | 2            | ✅ Activa    |
| `consultarMatematicas`| `consultarMatematicas()` | 2            | ✅ Activa    |
| `insertarAlumno`     | `insertarAlumno()`        | 2            | ⚠️ Comentado |
| `eliminarAlumno`     | `eliminarAlumno()`        | 2            | ⚠️ Comentado |
| `buscarAlumno`       | `buscarAlumno()`          | 2            | ⚠️ Comentado |

### 7.2 Lógica del enrutador

1. Comprueba si `$_SESSION['nivel_usuario']` está inicializado; si no, lo establece en `0`.
2. Parsea el parámetro `?ctl=` de la URL.
3. Si la ruta no existe en `$map`, devuelve un error HTTP 404.
4. Comprueba que el nivel del usuario sea suficiente para acceder.
5. Si no tiene permiso, redirige al método `inicio()` en lugar de mostrar error.
6. Si el método del controlador no existe, devuelve error 404.

---

## 8. Gestión de Usuarios y Permisos

### 8.1 Niveles de usuario

| Nivel | Rol            | Descripción                                                   |
|:-----:|----------------|---------------------------------------------------------------|
| `0`   | Invitado       | Sin autenticar. Puede ver la home, registrarse y hacer login  |
| `1`   | Alumno         | Autenticado. Puede acceder a Ciencias, Letras, Otros y materiales |
| `2`   | Administrador  | Acceso completo: gestión de alumnos y recursos académicos     |

### 8.2 Variables de sesión

| Variable              | Descripción                          |
|-----------------------|--------------------------------------|
| `$_SESSION['id_alumno']`   | ID del alumno autenticado       |
| `$_SESSION['usuario']`     | Nombre de usuario                |
| `$_SESSION['nivel_usuario']` | Nivel de acceso (0, 1 o 2)    |

### 8.3 Flujo de autenticación

```
Usuario introduce credenciales
         │
         ▼
recoge() y cUser() → sanitización y validación
         │
         ▼
Alumno::consultarAlumnoPorUsuario($usuario) → BD
         │
         ▼
comprobarhash($pass, $usuario['pass']) → password_verify()
         │
    ┌────┴────┐
  Válido   Inválido
    │         │
    ▼         ▼
$_SESSION  Mensaje
se crea    de error
    │
    ▼
Redirige a index.php?ctl=inicio
```

---

## 9. Seguridad

### 9.1 Medidas implementadas

| Medida                  | Implementación                                                              |
|-------------------------|-----------------------------------------------------------------------------|
| **Hash de contraseñas** | `password_hash()` con `PASSWORD_DEFAULT` (bcrypt, coste 10)                |
| **Verificación segura** | `password_verify()` — resistente a ataques de tiempo                       |
| **Prevención SQLi**     | PDO con sentencias preparadas (`prepare()` + `bindParam()`) en todas las consultas |
| **Sanitización XSS**    | `strip_tags()` + `trim()` aplicados a todos los campos de formulario        |
| **Control de acceso**   | Verificación de `nivel_usuario` en el enrutador antes de ejecutar acciones  |
| **Log de errores**      | Excepciones capturadas y registradas en archivos de log (`app/log/`)        |
| **Validación de URLs**  | Función `validarEnlaceYouTube()` con regex específica para `youtu.be`       |

### 9.2 Vulnerabilidades conocidas / Áreas de mejora

- **CSRF (Cross-Site Request Forgery):** Los formularios no incluyen tokens CSRF. Cualquier petición POST podría ser falsificada.
- **Nombre de tabla dinámico en SQL:** `listarAsignatura($tabla)` y `insertarRecurso($tabla, ...)` construyen queries con el nombre de tabla directamente (aunque PDO no permite parametrizar nombres de tablas, sería recomendable una whitelist de tablas permitidas).
- **Contraseñas visibles en formularios:** El campo `pass` se muestra con `value="<?php echo $params['pass'] ?>"` en el formulario de registro, lo que revela la contraseña en texto plano en el DOM.
- **Autenticación de administrador:** No existe una ruta específica de registro para administradores; el nivel 2 se asigna manualmente en la base de datos.

---

## 10. Funcionalidades Implementadas

### 10.1 Módulo de autenticación ✅

- [x] Registro de nuevos alumnos con validación completa de formulario
- [x] Inicio de sesión con verificación de hash de contraseña
- [x] Cierre de sesión seguro (destrucción de sesión)
- [x] Redirección según el nivel del usuario
- [x] Protección de rutas por nivel de usuario

### 10.2 Módulo de contenidos académicos ✅

- [x] Vista del área de Ciencias con menú de materias
- [x] Vista genérica de asignaturas con tabla de recursos (Bloque, Tema, Enlace)
- [x] Recursos funcionales en: Matemáticas, Física, Física-Química, Castellano
- [x] Tablas creadas y listas para: Biología, Química, Inglés, Historia, Valenciano

### 10.3 Módulo de administración de alumnos ✅ (parcial)

- [x] Vista del panel de administrador con acciones CRUD
- [x] Formulario de inserción de alumno (desde panel admin)
- [x] Búsqueda de alumno por ID y formulario de modificación
- [x] Modelo completo con métodos: consultar, insertar, eliminar, actualizar

### 10.4 Módulo de administración de recursos ✅ (parcial)

- [x] Rutas definidas: insertar, modificar, eliminar, consultar Matemáticas
- [x] Métodos de modelo genéricos: `insertarRecurso()`, `listarAsignatura()`, `eliminarRecurso()`, `modificarRecurso()`
- [x] Vista de inserción de recurso de matemáticas (`insertarMatematicas.php`)

### 10.5 Páginas estáticas / informativas ✅

- [x] Página de inicio con vídeo hero, sección de servicios y preguntas frecuentes
- [x] Página "En construcción" para secciones pendientes (Letras, Otros)
- [x] Footer con datos de contacto, dirección y mapa de Google Maps embebido
- [x] Página de error genérica

---

## 11. Funcionalidades Pendientes / En Construcción

### 11.1 Alta prioridad

| Funcionalidad              | Estado   | Descripción                                                    |
|----------------------------|----------|----------------------------------------------------------------|
| `insertarMatematicas()`    | ❌ Vacío | El método del controlador existe pero no tiene implementación   |
| Rutas CRUD alumno          | ⚠️ Comentadas | `insertarAlumno`, `eliminarAlumno`, `buscarAlumno` están comentadas en el router |
| Sección "Letras"           | ⚠️ En construcción | Muestra página de construcción; no hay tablas de contenido configuradas en el menú |
| Sección "Otros"            | ⚠️ En construcción | Igual que "Letras"                                           |

### 11.2 Media prioridad

| Funcionalidad               | Descripción                                                    |
|-----------------------------|----------------------------------------------------------------|
| CRUD completo de asignaturas | Solo Matemáticas tiene rutas definidas; el resto no está en el router |
| Listado de alumnos          | El método `verAlumnos()` existe en el modelo pero no hay vista ni ruta |
| Tokens CSRF                 | Protección contra falsificación de peticiones                  |
| Paginación                  | Las tablas de recursos no tienen paginación                    |

### 11.3 Baja prioridad / Mejoras sugeridas

| Mejora                      | Descripción                                                    |
|-----------------------------|----------------------------------------------------------------|
| Sección de audio            | La carpeta `web/audio/` existe pero no tiene uso visible       |
| Whitelist de tablas SQL     | Validar el nombre de tabla en funciones genéricas de modelo    |
| Recuperación de contraseña  | No existe flujo de "Olvidé mi contraseña"                      |
| Listado de alumnos para admin | En lugar de buscar por ID, mostrar un listado completo       |
| Panel de admin unificado    | El `menuAdmin.php` tiene enlaces vacíos (`href=""`)            |

---

## 12. Bugs y Problemas Conocidos

### Bug 1 — Variable `$usuario` no definida en `modificarAlumno()`

**Archivo:** `app/controlador/Controller.php`  
**Método:** `modificarAlumno()`  
**Descripción:** Al actualizar los datos del alumno, se llama a `$m->actualizarUsuario($params['usuario'], ...)` pero dentro de la misma rama condicional también se referencia `$usuario` (variable no definida) en los argumentos de `actualizarUsuario`.

```php
// Bug: $usuario no está definida en este scope
if ($m->actualizarUsuario($params['usuario'], $nombre, $apellidos, $usuario, ...))
```

**Impacto:** Error fatal de PHP al intentar modificar un alumno.

---

### Bug 2 — ID de columna con guión en `fisicaquimica`

**Archivo:** `app/controlador/Controller.php`  
**Método:** `mostrarAsignatura()`  
**Descripción:** El nombre de la PK de la tabla `fisicaquimica` es `id_fisica-quimica` (con guión), lo que genera un ID de campo inválido en contextos PHP.

```php
'id_col' => ($tabla === 'fisicaquimica') ? 'id_fisica-quimica' : 'id_' . $tabla
```

**Impacto:** Posibles problemas al excluir la columna ID en la vista de asignatura.

---

### Bug 3 — `insertarMatematicas()` sin implementar

**Archivo:** `app/controlador/Controller.php`  
**Método:** `insertarMatematicas()`  
**Descripción:** El método existe y tiene ruta activa en el router, pero el cuerpo está vacío. Acceder a esa URL no produce ningún output.

---

### Bug 4 — Password visible en formulario de registro

**Archivo:** `web/templates/formRegistro.php`  
**Descripción:** El campo de contraseña tiene `value="<?php echo $params['pass'] ?>"`, lo que expone la contraseña en texto plano en el HTML si el formulario se recarga tras un error.

---

### Bug 5 — `menuAdmin.php` con `href` vacíos

**Archivo:** `web/templates/menuAdmin.php`  
**Descripción:** Algunos botones del menú de administración tienen `href=""` porque las rutas correspondientes están comentadas en el router.

**Afecta a:** "Insertar alumno", "Eliminar alumno", "Consultar alumno" en el panel de admin.

---

## 13. Historial de Cambios

### Versión 1.0 — 04 de mayo de 2026

| # | Cambio | Descripción |
|---|--------|-------------|
| 1 | **Corrección** | Error 404 en rutas `letras` y `otros` — Se implementaron los métodos y se creó `construccion.php` |
| 2 | **Corrección** | Error de sintaxis en `Controller.php` — Clase sin cerrar tras añadir nuevos métodos |
| 3 | **Corrección** | "Preguntas frecuentes" visible tras login — Se condicionó a `nivel_usuario == 0` |
| 4 | **Nuevo recurso** | Creación de `web/templates/construccion.php` |
| 5 | **Mejora UX** | Cambio de texto en la cabecera de búsqueda de alumno a "Ingrese ID del Alumno:" |

---

## 14. Guía de Instalación

### 14.1 Requisitos del servidor

- PHP 7.4 o superior (probado en 8.2)
- MySQL 5.7+ o MariaDB 10.4+
- Servidor web Apache (con mod_rewrite) o Nginx
- Extensión PHP: `pdo`, `pdo_mysql`

### 14.2 Instalación en entorno local (XAMPP / WAMP / Laragon)

```bash
# 1. Copiar el proyecto al directorio raíz del servidor
cp -r mariola/ /xampp/htdocs/mariola/

# 2. Acceder a phpMyAdmin y crear la base de datos
# Nombre: mariola (o cenfor_bd según el archivo SQL usado)

# 3. Importar el esquema SQL
# phpMyAdmin > Importar > Seleccionar 'cenfor_bd.sql'

# 4. Configurar las credenciales en:
# app/libs/Config.php
```

### 14.3 Instalación en servidor remoto (Linux/Ubuntu)

```bash
# 1. Subir archivos al servidor
rsync -avz mariola/ usuario@servidor:/var/www/mariola/

# 2. Configurar permisos
sudo chown -R www-data:www-data /var/www/mariola/
sudo chmod -R 755 /var/www/mariola/
sudo chmod -R 777 /var/www/mariola/app/log/   # Carpeta de logs

# 3. Crear base de datos y usuario MySQL
mysql -u root -p <<EOF
CREATE DATABASE mariola DEFAULT CHARACTER SET utf8mb4;
CREATE USER 'mariola'@'localhost' IDENTIFIED BY 'contraseña_segura';
GRANT ALL PRIVILEGES ON mariola.* TO 'mariola'@'localhost';
FLUSH PRIVILEGES;
EOF

# 4. Importar el esquema
mysql -u mariola -p mariola < cenfor_bd.sql

# 5. Configurar credenciales
nano /var/www/mariola/app/libs/Config.php
```

### 14.4 Configuración de `Config.php`

```php
class Config {
    public static $mvc_bd_hostname = "localhost";       // Host de la BD
    public static $mvc_bd_nombre   = "mariola";         // Nombre de la BD
    public static $mvc_bd_usuario  = "mariola";         // Usuario de la BD
    public static $mvc_bd_clave    = "contraseña_aqui"; // Contraseña
}
```

### 14.5 URL de acceso

```
http://localhost/mariola/web/           # Entorno local
http://mariola.local/                   # Con VirtualHost configurado
```

### 14.6 Credenciales de prueba (datos de ejemplo)

| Rol           | Usuario | Contraseña (sin hashear) |
|---------------|---------|--------------------------|
| Administrador | `ad`    | Definida en el registro  |
| Alumno        | `a`     | Definida en el registro  |

> **Nota:** Las contraseñas en la base de datos están hasheadas con bcrypt. Para conocer las contraseñas de prueba, es necesario haberlas establecido durante el registro o resetearlas.

---

## 15. Conclusiones y Mejoras Propuestas

### 15.1 Fortalezas del proyecto

1. **Arquitectura clara y escalable:** El patrón MVC y el sistema de enrutamiento centralizado permiten añadir nuevas rutas, asignaturas y funcionalidades de forma ordenada.
2. **Seguridad en contraseñas:** El uso de `password_hash()` (bcrypt) y `password_verify()` garantiza que las contraseñas nunca se almacenen en texto plano.
3. **Prevención de SQL Injection:** Todos los accesos a la base de datos usan PDO con sentencias preparadas y `bindParam()`.
4. **Diseño responsivo:** Bootstrap 5.3.3 asegura una experiencia adaptada a dispositivos móviles y escritorio.
5. **Modelo genérico de asignaturas:** La refactorización de métodos específicos a genéricos (`listarAsignatura($tabla)`) facilita añadir nuevas asignaturas sin duplicar código.

### 15.2 Mejoras recomendadas a corto plazo

| Prioridad | Mejora                          | Beneficio                                           |
|:---------:|---------------------------------|-----------------------------------------------------|
| 🔴 Alta   | Corregir bug en `modificarAlumno()` | Funcionalidad de edición de alumnos no operativa |
| 🔴 Alta   | Implementar `insertarMatematicas()` | Completar CRUD de recursos académicos            |
| 🔴 Alta   | Desactivar/redirigir `href=""` en menuAdmin | Evitar confusión al administrador         |
| 🟡 Media  | Agregar protección CSRF (tokens) | Seguridad ante peticiones falsificadas             |
| 🟡 Media  | Whitelist de tablas en modelo genérico | Prevenir accesos no autorizados a tablas     |
| 🟡 Media  | Implementar rutas comentadas en router | Completar CRUD de alumnos para el admin     |
| 🟢 Baja   | Añadir paginación en listados   | Rendimiento con muchos registros                    |
| 🟢 Baja   | Implementar recuperación de contraseña | Usabilidad para alumnos                     |
| 🟢 Baja   | Listado de alumnos en búsqueda  | Evitar necesidad de conocer el ID de antemano       |
| 🟢 Baja   | Completar secciones Letras y Otros | Ampliar el catálogo de materiales educativos    |

### 15.3 Valoración global

El proyecto presenta una **base técnica sólida** con una arquitectura bien estructurada y buenas prácticas de seguridad. Las principales áreas de mejora son funcionales (completar el CRUD del módulo de administración) y de seguridad preventiva (CSRF tokens). La refactorización hacia funciones genéricas demuestra una evolución positiva en el diseño del sistema.

---

*Informe generado automáticamente a partir del análisis del código fuente del proyecto mariola.*  
*Ruta del proyecto: `/var/www/mariola/`*
