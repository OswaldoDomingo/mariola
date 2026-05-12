<?php

require_once '../app/modelo/classModelo.php'; // Asegúrate de que la ruta es correcta
require_once '../app/libs/Config.php';
include('../app/modelo/classAlumno.php');
include('../app/modelo/classAsignatura.php');


//ver si existe un usuario

$alumno= new Alumno();
// $array = $alumno->consultarAlumnos('a@gmail.es');
// print_r($array);
// echo "<br>";

//insertar un usuario

$alumno1=new Alumno();
// $array1= $alumno1->insertarUsuario('d','d','d','d@mail.es','d','d','d',1);
// $arra2=$alumno1->insertarUsuario('a','a','a','a@gamil.es','a','aa','a',2);
// print_r($array1);

// echo "<br>";
// print_r($arra2);

// $array3= $mate1->insertarCastellano('sintaxis','oraciones simples','https://youtu.be/RgGVn93bCNg?si=FcYtug3aitFCgNs9'  );
// print_r($array3);
// print_r($array4);

//eliminar usuario

// $array2=$alumno->eliminarUsuario(10);
// print_r($array2);
// echo "<br>";

$mate1 = new Asignatura();
// $array4= $mate1->insertarMatematicas('algebra','funciones','lalalal','1er ciclo eso'  );
// print_r($array4);

//listar

// $array5=$mate1->listarMatematicas();
// print_r($array5);


// foreach ($array5 as $clave => $valor) {
//     foreach ($valor as $value){
//         // print_r($value);
//         echo $value;
//     }
//     echo "<br>";
// }

// foreach ($array5 as $clave1 => $valor1) {
   
//     foreach ($valor1 as $clave2 => $valor2) {
     
           
//             echo "  $valor2<br>";
          
//         }
//         echo "<br>";
//     }

// $array6= $alumno1->actualizarUsuario(11, 'd','s','d','d@gmail.es','d','d','d',6);


// eliminar

// $array8=$mate1->eliminarMatematicas(3);

$alumno2= new Alumno();
// $array9=$alumno2->listarCursos();
// echo "<pre>";
// print_r($array9);
// echo "</pre>";

// Insertar en la tabla matematicas
// $array10= $mate1->insertarRecurso('matematicas', 'Bloque 1', 'Tema 1', 'Recurso 1');

// Insertar en la tabla castellano
// $array10= $mate1->insertarRecurso('castellano', 'Bloque 5', 'Tema 2', 'Recurso 2');

// Insertar en la tabla fisica
// $array11= $mate1->insertarRecurso('fisica', 'Bloque 9', 'Tema 3', 'Recurso 3');

// Insertar en la tabla fisica-quimica
// $array12= $mate1->insertarRecurso('fisicaquimica', 'Bloque 4', 'Tema 4', 'Recurso 4');

// $matematicas=$mate1->listarAsignatura('castellano');
// echo "<pre>";
// print_r($matematicas);
// echo "</pre>";

$array12=$mate1->eliminarRecurso('matematicas', 'id_matematicas',10 );




?>