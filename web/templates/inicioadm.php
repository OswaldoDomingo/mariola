<?php ob_start() ?>



<!--OPCION ADMINISTRADOR-->


<div class="container-fluid mt-5">

    <!--   CON  ICONOS -->


    <div class="container mt-5">
        <div class="d-flex align-items-center">

            <div>
                <!-- <a href="index.php?ctl=insertarAlumno" class="btn btn-success me-2"> -->
                <a href="" class="btn btn-success me-2">
                    
                    <i class="bi bi-plus-circle"></i> <!-- Icono de añadir -->añadir
                </a>
                <!-- <a href="index.php?ctl=modificarAlumno" class="btn btn-warning me-2"> -->
                <a href="index.php?ctl=modificarAlumno" class="btn btn-warning me-2">
                    <i class="bi bi-pencil-square"></i> <!-- Icono de modificar -->modificar
                </a>
                <!-- <a href="index.php?ctl=eliminarAlumno" class="btn btn-danger me-2"> -->
                <a href="" class="btn btn-danger me-2">
                    <i class="bi bi-trash"></i> <!-- Icono de eliminar -->eliminar
                </a>
                <!-- <a href="index.php?ctl=buscarAlumno" class="btn btn-info"> -->
                <a href="" class="btn btn-info">
                    <i class="bi bi-search"></i> <!-- Icono de consultar -->consultar
                </a>
            </div>
        </div>
    </div>


    <!--   SIN ICONOS
        <div class=" mt-5 ">
        <h2 class="text-center text-white bg-secondary">ALUMNOS</h2>
            <ul class="list-group">
                <li class="list-group-item">
            <a href="index.php?ctl=insertarAlumno" class="d-block  p-3 ">añadir alumnos</a>

                </li>
                <li class="list-group-item">
                <a href="index.php?ctl=modificarAlumno" class="d-block  p-3 text-white bg-secondary">Modificar Alumno</a>
                </li>
                <li class="list-group-item"><a href="index.php?ctl=eliminarAlumno" class="d-block  p-3 ">Eliminar Alumno</a></li>
                <li class="list-group-item"><a href="index.php?ctl=buscarAlumno" class="d-block p-3 text-white bg-secondary">Consultar Alumnos</a></li>
                
            </ul>
        </div> -->


        <!-- SIN ICONOS -->
    <!-- <div class=" mt-5 ">
        <h2 class="text-center text-white bg-secondary">ASIGNATURAS</h2>


        <ul class="list-group d-flex flex-row flex-wrap">
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Biología</a>
            </li>
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Matematicas</a>
            </li>
        </ul>

        <ul class="list-group d-flex flex-row flex-wrap">
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 text-white bg-secondary">Fisica</a>
            </li>
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 text-white bg-secondary">Quimica</a>
            </li>
        </ul>

        <ul class="list-group d-flex flex-row flex-wrap">
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Fisica-quimica</a>
            </li>
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Lengua</a>
            </li>
        </ul>

        <ul class="list-group d-flex flex-row flex-wrap">
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 text-white bg-secondary">Valenciano</a>
            </li>
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 text-white bg-secondary">Ingles</a>
            </li>
        </ul>

        <ul class="list-group d-flex flex-row flex-wrap">
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Historia</a>
            </li>
            <li class="list-group-item col-6">
                <a href="index.php?ctl=" class="d-block p-3 ">Otros</a>
            </li>
        </ul>


    </div> -->

    <!-- CON ICONOS -->

    <div class="mt-5">
    <h2 class="text-center text-white bg-secondary">ASIGNATURAS</h2>

    <ul class="list-group d-flex flex-row flex-wrap">
        <li class="list-group-item col-6">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php?ctl=" class="d-block p-3">Biología</a>
                <div>
                    <a href="index.php?ctl=insertarBiologia" class="btn btn-success btn-sm me-1">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a href="index.php?ctl=modificarBiologia" class="btn btn-warning btn-sm me-1">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="index.php?ctl=eliminarBiologia" class="btn btn-danger btn-sm me-1">
                        <i class="bi bi-trash"></i>
                    </a>
                    <a href="index.php?ctl=consultarBiologia" class="btn btn-info btn-sm">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="list-group-item col-6">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php?ctl=" class="d-block p-3">Matemáticas</a>
                <div>
                    <a href="index.php?ctl=insertarMatematicas" class="btn btn-success btn-sm me-1">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a href="index.php?ctl=modificarMatematicas" class="btn btn-warning btn-sm me-1">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="index.php?ctl=eliminarMatematicas" class="btn btn-danger btn-sm me-1">
                        <i class="bi bi-trash"></i>
                    </a>
                    <a href="index.php?ctl=consultarMatematicas" class="btn btn-info btn-sm">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div>
        </li>
    </ul>

    <!-- Repite la misma estructura para las demás asignaturas -->
    <!-- Fisica -->
    <ul class="list-group d-flex flex-row flex-wrap">
        <li class="list-group-item col-6">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php?ctl=" class="d-block p-3 ">Fisica</a>
                <div>
                    <a href="index.php?ctl=insertarFisica" class="btn btn-success btn-sm me-1">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a href="index.php?ctl=modificarFisica" class="btn btn-warning btn-sm me-1">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="index.php?ctl=eliminarFisica" class="btn btn-danger btn-sm me-1">
                        <i class="bi bi-trash"></i>
                    </a>
                    <a href="index.php?ctl=consultarFisica" class="btn btn-info btn-sm">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="list-group-item col-6">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php?ctl=" class="d-block p-3 text-white bg-secondary">Química</a>
                <div>
                    <a href="index.php?ctl=insertarQuimica" class="btn btn-success btn-sm me-1">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a href="index.php?ctl=modificarQuimica" class="btn btn-warning btn-sm me-1">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="index.php?ctl=eliminarQuimica" class="btn btn-danger btn-sm me-1">
                        <i class="bi bi-trash"></i>
                    </a>
                    <a href="index.php?ctl=consultarQuimica" class="btn btn-info btn-sm">
                        <i class="bi bi-search"></i>
                    </a>
                </div>
            </div>
        </li>
    </ul>

    <!-- Sigue con las otras asignaturas como Fisica-quimica, Lengua, etc. -->

</div>

</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>