<?php ob_start();
if (isset($params['mensaje'])) {

    echo $params['mensaje'];
}
?>

 <?php echo $_SESSION['usuario']?>



<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-lg-2 col-sm-4 mt-5 ">
            <a href="index.php?ctl=biologia" class="d-block text-center p-3 text-white bg-primary">Biología</a>
        </div>
        <div class="col-lg-2 col-sm-4 mt-5">
            <a href="index.php?ctl=fisica" class="d-block text-center p-3 text-white bg-success">Física</a>
        </div>
        <div class="col-lg-2 col-sm-4 mt-5">
            <a href="index.php?ctl=quimica" class="d-block text-center p-3 text-white bg-danger">Química</a>
        </div>
        <div class="col-lg-2 col-sm-4 mt-5">
            <a href="index.php?ctl=matematicas" class="d-block text-center p-3 text-white bg-warning">Matemáticas</a>
        </div>
        <div class="col-lg-2 col-sm-4 mt-5">
            <a href="index.php?ctl=fisica_quimica" class="d-block text-center p-3 text-white bg-info">fisica-quimica</a>
        </div>
    </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>