# Avances del Proyecto - Mariola

## Fecha: 20 de mayo de 2026
- Solucionado el error de *Undefined variable: contenido* en `layout.php` añadiendo el operador Null Coalescing (`?? ''`).
- Creación del script para la automatización de commits quirúrgicos del proyecto.

## Fecha: 18 de mayo de 2026
- Centrar el contenido de la página de inicio de administrador.
- Eliminar del navegador del usuario "LETRAS" y "OTROS"
- En el menú de Administrador poner la opción de administrar usuarios centrando los botones
- Eliminar del menú de navegación "Insertar alumno", "Eliminar alumno", "Modificar alumno" y "Buscar alumno" 
- Añadir rutas a los botones de administración de usuarios para que redirijan a las páginas correspondientes.
- Corregir la modificación de alumnos para que se actualice por `id_alumno` y no por usuario.
- Añadir campo oculto `id_alumno` al formulario de modificación de alumnos.
- Hacer que la contraseña no sea obligatoria al modificar un alumno, conservando la contraseña actual si se deja vacía.
- Ajustar `actualizarUsuario()` para que devuelva el resultado real de la ejecución del `UPDATE`.


## Fecha: 04 de mayo de 2026

### Problemas Detectados y Solucionados

#### 1. Error 404 en rutas `letras` y `otros`
- **Qué no funcionaba**: Al acceder a `http://mariola.local/index.php?ctl=letras` y `http://mariola.local/index.php?ctl=otros`, aparecía un error 404 indicando que el controlador no existía.
- **Qué se ha cambiado**:
  - Se implementaron los métodos `letras()` y `otros()` en `app/controlador/Controller.php`.
  - Se creó el template `web/templates/construccion.php` para mostrar una página de "En construcción".
- **Cómo ha quedado**: Ahora al acceder a esas rutas, se muestra una página indicando que la sección está en construcción.

#### 2. Error de sintaxis en Controller.php
- **Qué no funcionaba**: La clase `Controller` quedó abierta (sin cerrar con `}`) después de implementar los métodos anteriores, causando un error de parseo.
- **Qué se ha cambiado**:
  - Se cerró correctamente la clase `Controller`.
  - Se restauró el método `insertarMatematicas()` que había sido eliminado accidentalmente.
- **Cómo ha quedado**: El archivo ahora compila correctamente sin errores de sintaxis.

#### 3. "Preguntas frecuentes" visible en la página de login
- **Qué no funcionaba**: Al intentar acceder a `index.php?ctl=iniciarSesion`, el sistema redirigía a usuarios logueados a `inicio`, donde se mostraba la sección de "Preguntas frecuentes", creando confusión.
- **Qué se ha cambiado**:
  - Se envolvió la sección de "Preguntas frecuentes" en `web/templates/inicio.php` con una condición PHP para que solo se muestre a usuarios invitados (`$_SESSION['nivel_usuario'] == 0`).
- **Cómo ha quedado**: Los usuarios logueados ya no ven la sección de preguntas frecuentes al ser redirigidos desde el login.

#### 4. Nuevo recurso creado
- **Qué se ha cambiado**: Se creó el archivo `web/templates/construccion.php`.
- **Cómo ha queda**: Nueva página template para indicar que una sección está en desarrollo.

#### 5. Cambio de texto en la cabecera de buscar alumno
- **Qué se ha cambiado**: Se cambió el título para que se sepa qué se ha de poner para buscar un alumno.
- **Cómo ha queda**: Ahora de lee "Ingrese ID del Alumno:" de esta forma se sabe que se ha de poner el ID.
- **Mejoras**: Pondría un listado de los alumnos para no tener que saber el ID del alumno por anticipado.
