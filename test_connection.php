<?php
require_once __DIR__ . '/app/libs/Config.php';
require_once __DIR__ . '/app/libs/bGeneral.php';
require_once __DIR__ . '/app/libs/bSeguridad.php';
require_once __DIR__ . '/app/modelo/classModelo.php';
require_once __DIR__ . '/app/modelo/classAsignatura.php';

try {
    $m = new Asignatura();
    $res = $m->listarMatematicas();
    echo "Success! Found " . count($res) . " rows.\n";
    print_r($res);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
