<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
    <title>El bajo de Mariola</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- cdn para iconos bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- estilos añadidos -->
    

    <link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css[0]; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css[1]; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css[2]; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'css/' . Config::$mvc_vis_css[3]; ?>" />

</head>

<body>

    <section id="nav-bar ">
        <nav class="navbar navbar-expand-lg pt-0 ">
            <div class="container-fluid bg-secondary loginform-nav">
                <a class="navbar-brand text-white fw-bold" href="/">CENFORλ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <i class="bi bi-list"></i>
                </button>


                <?php

                if (!isset($menu)) {
                    $menu = 'menuHome.php';
                }
                include $menu;
                ?>
            </div>

        </nav>

    </section>

    <div class="container-fluid">
        <div class="container">
            <div id="contenido">
                <?php echo $contenido ?>
            </div>
        </div>
    </div>
    <!-- AÑADIDO -->


    <!-- FIN AÑADIDO -->
    <footer class="footer bg-secondary text-white">
    <div class="container-custom">
        <div class="row justify-content-around align-items-center">

            <div id="contacto" class="col-12 col-md-6 footer-box text-center text-md-start mb-3 mb-md-0">
                <p><b>CONTACTA CON NOSOTROS</b></p>
                <p><i class="bi bi-geo-alt"></i> C/ Vicente Zaragozá, 16 Bajo, Silla</p>
                <p><i class="bi bi-telephone"></i> +34 012567894</p>
                <p><i class="bi bi-envelope-at"></i> micorreo@gmail.com</p>
            </div>

            <div class="col-12 col-md-6 footer-box-iframe text-center text-md-start pt-4">
                <p><b>PUEDES ENCONTRARNOS EN</b></p>
                <div class="iframe-container">
                    <iframe class="custom-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3084.974771466704!2d-0.414154124909615!3d39.356807919468004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604cfe0dbde0a7%3A0x702c7ff0b2db7d7e!2sC.%20Vicente%20Zaragoza%2C%2016%2C%2046460%20Silla%2C%20Valencia%2C%20Espa%C3%B1a!5e0!3m2!1ses!2s!4v1719827298355!5m2!1ses!2s"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
    </div>

    <div class="container-custom d-flex justify-content-between align-items-center mt-5 py-3 border-highlight">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="me-2 text-white">
                <span>CENFORLAMBDA 2024</span>
            </a>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex text-white">
            <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-twitter"></i></a></li>
            <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-instagram"></i></a></li>
            <li class="ms-3"><a class="text-white" href="#"><i class="bi bi-facebook"></i></a></li>
        </ul>
    </div>

</footer>
    </section>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        
</body>

</html>