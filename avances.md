# Avances del Proyecto - Mariola

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