<?php

class Controller
{

    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario
    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }


    public function home()
    {

        $params = array(
            'mensaje' => 'el tesxto está en el controler home, en el array params de home',
            'mensaje2' => 'con menuHome',
            'mensaje3' => 'y en la vista inicio, le marco el orden en el que se van a imprimir',
            'fecha' => date('d-m-Y')
        );
        $menu = 'menuHome.php';

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }
    public function inicio()
    {
        if ($_SESSION['nivel_usuario'] > 1) {

            $params = array(
                'mensaje' => 'params de administrador',
                'mensaje2' => 'este texto entá en controler inicio dentro del if. Y las tablas, en la vista inicio.php',
                'fecha' => date('d-m-Y')
            );
            $menu = $this->cargaMenu();
            require __DIR__ . '/../../web/templates/inicioadm.php';
        } else {

            $params = array(
                'mensaje' => 'params de inicio',
                'mensaje2' => 'este texto entá en controler inicio',
                'fecha' => date('d-m-Y')
            );
            $menu = $this->cargaMenu();
            require __DIR__ . '/../../web/templates/inicio.php';
        }
    }


    public function registro()
    {

        //cargamos el menú 
        $menu = $this->cargaMenu();
        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }

        //inicializar la clase alumno para obtener el curso
        $m = new Alumno();
        $cursos = $m->listarCursos();

        //iniciamos el array params

        $params = array(
            'nombre' => '',
            'apellidos' => '',
            'usuario' => '',
            'email' => '',
            'pass' => '',
            'telefono' => '',
            'centro' => '',
            'curso' => '',
            'cursos' => $cursos  //pasar cursos para el select

        );
        //iniciamos el array para registrar los errores

        $errores = array();

        //empezamos a tratar el registro del formulario

        if (isset($_POST['bRegistro'])) {

            //recogemos, sanitizamos los datos

            $nombre = recoge('nombre');
            $apellidos = recoge('apellidos');
            $usuario = recoge('usuario');
            $email = recoge('email');
            $pass = recoge('pass');
            $telefono = recoge('telefono');
            $centro = recoge('centro');
            $curso = recoge('curso');


            //validamos

            cTexto($nombre, 'nombre', $errores);
            cTexto($apellidos, "apellidos", $errores);
            cUser($usuario, 'usuario', $errores);
            cUser($pass, 'pass', $errores);
            cEmail($email, 'email', $errores);
            cNum($telefono, 'telefono', $errores);
            cTexto($centro, 'centro', $errores);
            cSelect($curso, 'curso', $errores, array_column($cursos, 'nombre', 'id_curso'), false);

            if (empty($errores)) {
                // Si no hay errores, encriptamos la contraseña   

                try {

                    $m = new Alumno();
                    $pass = encriptar($pass);

                    //si la inserción es correcta, vamos a ctl iniciarSesion (el login)
                    if ($m->insertarUsuario($nombre, $apellidos, $usuario, $email, $pass, $telefono, $centro, $curso)) {

                        header('Location: index.php?ctl=iniciarSesion');
                    } else {

                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            } else {
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }

        //incluimos la vista del formulario

        require __DIR__ . '/../../web/templates/formRegistro.php';
    }


    public function iniciarSesion()
    {
        try {
            $params = array(
                'usuario' => '',
                'pass' => ''
            );
            $menu = $this->cargaMenu();


            if ($_SESSION['nivel_usuario'] > 0) {
                header("Location:index.php?ctl=inicio");
            }

            $errores = [];


            if (isset($_POST['biniciarSesion'])) { // Nombre del boton del login

                //recogemos, sanitizamos los datos introducidos por el usuario

                $usuario = recoge('usuario');
                $pass = recoge('pass');

                // validamos. Usamos las funciones que están en el archivo bGeneral

                if (cUser($usuario, "usuario", $errores)) {
                    // Si no ha habido problema creo modelo y hago consulta                    
                    $m = new Alumno();


                    if ($usuario = $m->consultarAlumnoPorUsuario($usuario)) {
                        // Compruebo si el password es correcto
                        if (comprobarhash($pass, $usuario['pass'])) {
                            // Obtenemos el resto de datos. los datos del usuario estabán en $usuario y ahora los tenemos en $_Session

                            $_SESSION['id_alumno'] = $usuario['id_alumno'];
                            $_SESSION['usuario'] = $usuario['usuario'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel_usuario'];
                            //HASTA AQUI

                            header('location:index.php?ctl=inicio');
                        }
                    } else {

                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                    }
                } else {

                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/formInicioSesion.php';
    }


    public function error()
    {

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/error.php';
    }

    public function salir()
    {

        session_destroy(); //destruimos la sesion

        header("location:index.php?ctl=home");
    }

    public function ciencias()
    {


        $params = array(
            'mensaje' => ''
        );
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/ciencias.php';
    }

    public function matematicas()
    {
        $this->mostrarAsignatura('matematicas', 'Matemáticas');
    }

    public function biologia()
    {
        $this->mostrarAsignatura('biologia', 'Biología');
    }

    public function fisica()
    {
        $this->mostrarAsignatura('fisica', 'Física');
    }

    public function fisica_quimica()
    {
        $this->mostrarAsignatura('fisicaquimica', 'Física-Química');
    }

    public function quimica()
    {
        $this->mostrarAsignatura('quimica', 'Química');
    }

    private function mostrarAsignatura($tabla, $titulo)
    {
        try {
            $asignatura = new Asignatura();
            $datos = $asignatura->listarAsignatura($tabla);
            $params = array(
                'datos' => $datos,
                'mensaje' => '',
                'titulo' => $titulo,
                'id_col' => ($tabla === 'matematicas') ? 'id_matematicas' : 
                            (($tabla === 'fisicaquimica') ? 'id_fisica-quimica' : 'id_' . $tabla)
            );
            if (!$params['datos'])
                $params['mensaje'] = 'no existen datos de la asignatura ' . $titulo;
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/asignatura.php';
    }

    public function insertarAlumno()
    {
    
 
        //cargamos el menú 
        $menu = $this->cargaMenu();
      
 
        //inicializar la clase alumno para obtener el curso
        $m = new Alumno();
        $cursos = $m->listarCursos();

        //iniciamos el array params

        $params = array(
            'nombre' => '',
            'apellidos' => '',
            'usuario' => '',
            'email' => '',
            'pass' => '',
            'telefono' => '',
            'centro' => '',
            'curso' => '',
            'cursos' => $cursos  //pasar cursos para el select

        );
        //iniciamos el array para registrar los errores

        $errores = array();

        //empezamos a tratar el registro del formulario

        if (isset($_POST['bInsertarAlumno'])) {

            //recogemos, sanitizamos los datos

            $nombre = recoge('nombre');
            $apellidos = recoge('apellidos');
            $usuario = recoge('usuario');
            $email = recoge('email');
            $pass = recoge('pass');
            $telefono = recoge('telefono');
            $centro = recoge('centro');
            $curso = recoge('curso');

            //validamos

            cTexto($nombre, 'nombre', $errores);
            cTexto($apellidos, "apellidos", $errores);
            cUser($usuario, 'usuario', $errores);
            cUser($pass, 'pass', $errores);
            cEmail($email, 'email', $errores);
            cNum($telefono, 'telefono', $errores);
            cTexto($centro, 'centro', $errores);
            cSelect($curso, 'curso', $errores, array_column($cursos, 'nombre', 'id_curso'), false);

            if (empty($errores)) {
                // Si no hay errores, encriptamos la contraseña   

                try {

                    $m = new Alumno();
                    $pass = encriptar($pass);

                    //si la inserción es correcta, vamos a ctl iniciarSesion (el login)
                    if ($m->insertarUsuario($nombre, $apellidos, $usuario, $email, $pass, $telefono, $centro, $curso)) {
                        $params['mensaje']="usuario insertado correctamente";
                        // header('Location: index.php?ctl=iniciarSesion');
                    } else {

                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            } else {
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }

        //incluimos la vista del formulario

        require __DIR__ . '/../../web/templates/insertarAlumno.php';
    }
    
    public function modificarAlumno($id_alumno = null) 
        {       
             // Cargamos el menú
                  $menu = $this->cargaMenu();
        
            // Inicializamos el array de parámetros
                  $params = array(
                         'usuario' => '',
                         'nombre' => '',
                         'apellidos' => '',
                         'email' => '',
                         'pass' => '',
                         'telefono' => '',
                         'centro' => '',
                         'curso' => '',
                         'cursos' => []
                 );
        
             $errores = array();
             
             if ($id_alumno === null) {
                 // Si no se ha ingresado un usuario, mostramos el formulario para ingresar el usuario
                          if (isset($_POST['bBuscarUsuario'])) {
                                  $id_alumno = recoge('id_alumno');
                                 //  print_r($id_alumno);me lo imprime
                              if (empty($id_alumno)) {
                                 $errores[] = "Debes ingresar un  id.";
                              } else {
                                 $m = new Alumno();
                                 $alumno = $m->consultarAlumnoPorId($id_alumno);
                                 // print_r($alumno);me lo imprime
                                     if ($alumno) {
                                     // Cargamos los datos del alumno
                                     $params = array_merge($params, $alumno);
                                     // print_r($params);lo imprime
                                     $params['cursos'] = $m->listarCursos();
                                     $params['id_alumno'] = $alumno['id_alumno']; // Asegúrate de que el ID del alumno está asignado
                                     } else {
                                      $errores[] = "No se encontró ningún alumno con el id usuario: $id_alumno.";
                                      }
                             }
                 }
             } else {
                 // Si ya se ha ingresado un usuario y se están actualizando los datos
             
             
             
                  if(isset($_POST['bModificarAlumno'])){
                      $params['mensaje']= "El formulario se está enviando correctamente.";
                      // Recogemos y sanitizamos los datos
                      $nombre = recoge('nombre');
                      
                      $apellidos = recoge('apellidos');
                      $email = recoge('email');
                      $pass = recoge('pass');
                      $telefono = recoge('telefono');
                      $centro = recoge('centro');
                      $curso = recoge('curso');
                     
                    
                     
                     // Validamos los datos
                     cTexto($nombre, 'nombre', $errores);
                     cTexto($apellidos, 'apellidos', $errores);
                     cEmail($email, 'email', $errores);
                     cUser($pass, 'pass', $errores);
                     cNum($telefono, 'telefono', $errores);
                     cTexto($centro, 'centro', $errores);
                     cSelect($curso, 'curso', $errores, array_column($params['cursos'], 'nombre', 'id_curso'), false);
         
                     
                     if (empty($errores)) {
                         try {
                             $m = new Alumno();
                             $pass = encriptar($pass);
                             
                             if ($m->actualizarUsuario($params['usuario'], $nombre, $apellidos, $usuario, $email, $pass, $telefono, $centro, $curso)) {
                                 $params['mensaje'] = "Datos modificados correctamente.";
                       
                                 
                             } else {
                                 $params['mensaje'] = "No se pudo modificar los datos.";
                             
                             }
                         } catch (Exception $e) {
                             error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logException.txt");
                             header('Location: index.php?ctl=error');
                         } catch (Error $e) {
                             error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                             header('Location: index.php?ctl=error');
                         }
                     } else {
                         $params['mensaje'] = "Hay errores en el formulario.";
                     }
                 }
             }
         
             // Incluimos la vista del formulario
             require __DIR__ . '/../../web/templates/modificarAlumno.php';
         }

    public function letras()
    {
        require __DIR__ . '/../../web/templates/construccion.php';
    }

    public function otros()
    {
        require __DIR__ . '/../../web/templates/construccion.php';
    }

    public function insertarMatematicas()
    {
    }
}

