<?php
session_start(); 

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classAlumno.php';
require_once __DIR__ . '/../app/modelo/classAsignatura.php';
require_once __DIR__ . '/../app/controlador/Controller.php';



if (!isset($_SESSION['nivel_usuario'])) {
    $_SESSION['nivel_usuario'] = 0;
}


/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 **/

 $map = array(
    'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel_usuario' => 0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel_usuario' => 0),
    'iniciarSesion' => array('controller' => 'Controller', 'action' => 'iniciarSesion', 'nivel_usuario' => 0),
    'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel_usuario' => 0),
    'ciencias' => array('controller' => 'Controller', 'action' => 'ciencias', 'nivel_usuario' => 1),
    'letras' => array('controller' => 'Controller', 'action' => 'letras', 'nivel_usuario' => 1),
    'otros' => array('controller' => 'Controller', 'action' => 'otros', 'nivel_usuario' => 1),
    'biologia' => array('controller' => 'Controller', 'action' => 'biologia', 'nivel_usuario' => 1),
    'fisica' => array('controller' => 'Controller', 'action' => 'fisica', 'nivel_usuario' => 1),
    'fisica_quimica' => array('controller' => 'Controller', 'action' => 'fisica_quimica', 'nivel_usuario' => 1),
    'quimica' => array('controller' => 'Controller', 'action' => 'quimica', 'nivel_usuario' => 1),
    'matematicas' => array('controller' => 'Controller', 'action' => 'matematicas', 'nivel_usuario' => 1),
    
    // 'insertarAlumno'=> array('controller' => 'Controller', 'action' => 'insertarAlumno', 'nivel_usuario' => 2),
    // 'eliminarAlumno'=> array('controller' => 'Controller', 'action' => 'eliminarAlumno', 'nivel_usuario' => 2),
    'modificarAlumno'=> array('controller' => 'Controller', 'action' => 'modificarAlumno', 'nivel_usuario' => 2),
    // 'buscarAlumno'=> array('controller' => 'Controller', 'action' => 'buscarAlumno', 'nivel_usuario' => 2),

    'insertarMatematicas'=> array('controller' => 'Controller', 'action' => 'insertarMatematicas', 'nivel_usuario' => 2),
    'modificarMatematicas'=> array('controller' => 'Controller', 'action' => 'modificarMatematicas', 'nivel_usuario' => 2),
    'eliminarMatematicas'=> array('controller' => 'Controller', 'action' => 'eliminarMatematicas', 'nivel_usuario' => 2),
    'consultarMatematicas'=> array('controller' => 'Controller', 'action' => 'consultarMatematicas', 'nivel_usuario' => 2),
    
    
    
    // 'demo' => array('controller' => 'Controller', 'action' => 'demo', 'nivel_usuario'=>0),   
    
    'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel_usuario' => 1),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel_usuario' => 0),
    
  
 );


// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] . '</p></body></html>';
        exit;
        /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, 
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien 
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'], $controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action']
        ));
    }else{
        call_user_func(array(
            new $controlador['controller'],
            'inicio'
            //AÑADIDO: PODRÍA SALIR EN EXAMEN   o podría enviarlo a la pagina de error u otra cosa
        )); 
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
    // console_log("entrarErrorInicio");
}


?>