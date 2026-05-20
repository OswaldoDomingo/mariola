#!/bin/bash

# 1. Prevención de errores en el Layout principal
git add web/templates/layout.php
git commit -m "fix(layout): evitar warning de variable no inicializada" -m "Se añade el operador null coalescing (?? '') al imprimir la variable \$contenido en el layout maestro para tolerar llamadas sin buffer previo."

# 2. Creación de la página "En construcción" y corrección de 404
git add app/controlador/Controller.php web/templates/construccion.php
git commit -m "feat(rutas): añadir vista en construcción para secciones pendientes" -m "Implementados los métodos letras() y otros() en Controller.php que cargan el template construccion.php, solucionando así los errores 404."

# 3. Rediseño del panel de administrador y limpieza de menús
git add web/templates/inicioadm.php web/templates/menuAdmin.php web/templates/menuUser.php
git commit -m "ui(navegacion): limpieza de menús y mejora del panel admin" -m "- Se centra el contenido y los botones en la página inicioadm.php.
- Se eliminan del menú superior del administrador los enlaces directos (Insertar, Modificar, etc.) para centralizarlos en el panel.
- Se ocultan temporalmente 'LETRAS' y 'OTROS' del menú de usuario normal."

# 4. Corrección crítica en la modificación de alumnos
git add app/controlador/Controller.php web/templates/modificarAlumno.php
git commit -m "fix(admin): corregir flujo de actualización de alumnos" -m "- El UPDATE ahora se realiza de forma segura por id_alumno (añadido como input hidden) y no por nombre de usuario.
- La contraseña ya no es obligatoria al modificar; si se deja vacía, se conserva la existente."

# 5. Documentación y archivos markdown
git add avances.md informe_inicio.md presentacion.md realizar_commits.sh
git commit -m "docs: actualizar manuales, informes y bitácora del proyecto" -m "Se documentan los avances recientes, resolución de bugs y se incorpora el script de commits."

echo "✅ ¡Todos los commits quirúrgicos han sido creados con éxito!"