<?php ob_start() ?>

<?php if(isset($params['mensaje'])){
echo $params['mensaje'];
}
?>
			
<?php foreach ($errores as $error) {
	echo $error."<br>"; }
?>

<section class="login h-100 ">
    <div id="contenido" class=" container-fluid  justify-content-center">
        <div class="login-contenido ">
            <h2 class="text-center py-5 ">Iniciar Sesión</h2>
        </div>
        <div class="container">
            <form action="index.php?ctl=iniciarSesion" method="POST" NAME="formInicioSesion" class="w-50 mx-auto">
                <div class="mb-3">
                    <label for="username" class="form-label fs-4">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="e-mail" required>
                </div>
        
                <div class="mb-3">
                    <label for="password" class="form-label fs-4">Contraseña</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <input type="submit" value="Enviar" name="biniciarSesion" class="btn btn-secondary my-3 "> <br>
                <p>Si no estás registrado, <a href="index.php?ctl=registro"> pulsa aquí</a></p>
            </form>
        </div>
    </div>
</section>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
