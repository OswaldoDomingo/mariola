<?php ob_start() ?>

<?php
if (isset($params['mensaje'])) {
    echo $params['mensaje'];
}
?>
<?php foreach ($errores as $error) {
    echo $error . "<br>";
}
?>

<section class="register flex-grow-1">
    <div id="contenido" class="container mt-5 ">
        <div class="form-contenido">
            <h2 class="text-center mb-4">Formulario de Registro</h2>
            <form action="index.php?ctl=registro" method="POST" name="formRegistro">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $params['nombre'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $params['apellidos'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $params['usuario'] ?>" required>
                    </div>
                    <div class="col-md-6"> 
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="pass" class="form-control" value="<?php echo $params['pass'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $params['telefono'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $params['email'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="centro" class="form-label">Centro:</label>
                        <textarea name="centro" id="centro" class="form-control" rows="1"><?php echo $params['centro'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="curso" class="form-label">Curso:</label>
                        <select name="curso" id="curso" class="form-control">
                            <option value="">elige una opción</option>
                            <?php foreach ($params['cursos'] as $curso) { ?>
                                <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="asignaturas" class="form-label pt-sm-3">Asignaturas:</label>
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap">
                            <div class="form-check col-6 col-md-3">
                                <input class="form-check-input" type="checkbox" name="asignaturas[]" value="matematicas" id="matematicas">
                                <label class="form-check-label" for="matematicas">Matemáticas</label>
                            </div>
                            <div class="form-check col-6 col-md-3">
                                <input class="form-check-input" type="checkbox" name="asignaturas[]" value="fisica-quimica" id="fisica-quimica">
                                <label class="form-check-label" for="fisica-quimica">Física-Química</label>
                            </div>
                            <div class="form-check col-6 col-md-3">
                                <input class="form-check-input" type="checkbox" name="asignaturas[]" value="biologia" id="biologia">
                                <label class="form-check-label" for="biologia">Biología</label>
                            </div>
                            <div class="form-check col-6 col-md-3">
                                <input class="form-check-input" type="checkbox" name="asignaturas[]" value="otros" id="otros">
                                <label class="form-check-label" for="otros">Otros</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="col-auto py-3">
                        <button type="submit" class="btn btn-secondary" name="bRegistro">Enviar</button>
                    </div>
                    <div class="container py-3">
                        <p class="pe-5 ">Si ya estás registrado, <a href="index.php?ctl=iniciarSesion"> pulsa aquí</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
