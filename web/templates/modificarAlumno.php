<?php ob_start(); ?>

<h3><?php echo isset($params["mensaje"]) ? $params["mensaje"] : ""; ?></h3>

<?php foreach ($errores as $error) {
    echo "<p class='text-danger'>$error</p>";
} ?>

<div id="contenido">

    <?php if ($id_alumno === null) { ?>
        <!-- Formulario para buscar al alumno -->
        <form action="index.php?ctl=modificarAlumno" method="post" name="bBuscarUsuario">
            <div class="mb-3">
                <label for="id_alumno" class="form-label">Ingrese ID del Alumno:</label>
                <input type="text" id="id_alumno" name="id_alumno" class="form-control" required>
            </div>
            <button type="submit" name="bBuscarUsuario" class="btn btn-primary">Buscar</button>
        </form>
    <?php } else { ?>
        <!-- Formulario para modificar los datos del alumno -->
        <!-- <form action="index.php?ctl=modificarAlumno&id_alumno=<?php echo $params[
            "id_alumno"
        ]; ?>" method="post" name="actualizarUsuario"> -->
        <form action="index.php?ctl=modificarAlumno" method="post" name="actualizarUsuario">
            <input type="hidden" name="id_alumno" value="<?php echo $params["id_alumno"]; ?>">

       <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $params[
                        "nombre"
                    ]; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $params[
                        "apellidos"
                    ]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $params[
                        "usuario"
                    ]; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="pass" class="form-control" value="<?php
        //echo $params['pass'];
        ?>">
                </div>
            </div>
              <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $params[
                        "telefono"
                    ]; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $params[
                        "email"
                    ]; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="centro" class="form-label">Centro:</label>
                    <textarea name="centro" id="centro" class="form-control" rows="1"><?php echo $params[
                        "centro"
                    ]; ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="curso" class="form-label">Curso:</label>
                    <select name="curso" id="curso" class="form-control">
                        <?php foreach ($params["cursos"] as $curso) { ?>
                            <option value="<?php echo $curso[
                                "id_curso"
                            ]; ?>" <?php echo $curso["id_curso"] ==
$params["curso"]
    ? "selected"
    : ""; ?>>
                                <?php echo $curso["nombre"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-auto py-3">

                <button type="submit" class="btn btn-secondary mx-3 px-3" name="bModificarAlumno">Modificar</button>
                </div>
            </div>
        </form>
    <?php } ?>

</div>

<?php $contenido = ob_get_clean(); ?>
<?php include "layout.php"; ?>
