<?php

// Incluir los archivos necesarios
require_once '../app/modelo/classModelo.php'; // Asegúrate de que la ruta es correcta
require_once '../app/libs/Config.php';

try {
    // Crear una instancia de la clase Modelo para probar la conexión
    $conexion = new Modelo();
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Si ocurre un error, se captura aquí y se muestra el mensaje
    echo "Error de conexión: " . $e->getMessage();
}

?>
