<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav ms-auto text-white">
		<li class="nav-item ">
			<a href="index.php?ctl=home" class="nav-link text-white">INICIO</a>
		</li>
        <li class="nav-item ">
			<a href="index.php?ctl=insertarAlumno" class="nav-link text-white">Insertar alumno</a>
		</li>
        <li class="nav-item ">
			<a href="index.php?ctl=elimninarAlumno" class="nav-link text-white">Eliminar alumno</a>
		</li>
        <li class="nav-item ">
			<a href="index.php?ctl=modificarAlumno" class="nav-link text-white">Modificar alumno</a>
		</li>
        <li class="nav-item ">
			<a href="index.php?ctl=buscarAlumno" class="nav-link text-white">Buscar alumno</a>
		</li>
		<li class="nav-item ">
			<a href="index.php?ctl=salir" class="nav-link text-white">CERRAR SESION</a>
		</li>
	</ul>
</div>
<div class="text-white p-2">Bienvenido Admin <?php echo $_SESSION['usuario']?></div>
