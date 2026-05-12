<?php ob_start(); ?>

<?php foreach ($errores as $error) {
    echo $error . "<br>";
} ?>

<h3>
<?php if (isset($params['mensaje'])) {

    echo $params['mensaje'];
}
?>
</h3>
<div id="contenido">

        <form ACTION="index.php?ctl=insertarAlumno" METHOD="post">

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
                        <textarea name="centro" id="centro" class="form-control" rows="1" value="<?php echo $params['centro'] ?>"></textarea>
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
                <div class="row mb-3 justify-content-center">
                    <div class="col-auto py-3">
                        <button type="submit" class="btn btn-secondary mx-3 px-3" name="bInsertarAlumno">Aceptar</button>
                        
                    </div>
                  
                </div>
            
        
        </form>
        </div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>