<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrosel y modificar <footer></footer>
    </title>

    <!-- Bootstrap stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css stylesheet -->

    <link rel="stylesheet" href="css/style.css">

    <!-- google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!--     HEADER START-->

    <header class="header p-3 position-absolute start-0 top-0 end-0">
        <!--la posicion es para que se vea por encima del video. el resto es para que ocupe todo el ancho -->
        <div class="d-flex justify-content-between align-items-center">
            <a href="/" class="text-decoration-none text-white fs-5 fw-bold">CENFORλ</a>
            <div>

                <button class="navbar-toggler text-white dropdown-nav" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>Menu
                </button>
            </div>
        </div>
    </header>

    <!--     HEADER END-->

    <!--  FLYOUT NAVIGATION START-->
    <nav class="collapse navbar-collapse dropdown-nav" id="navbar">
        <div class=" dropdown-nav__container container d-flex align-items-start align-items-md-center">
            <div class="row align-items-start ">
                <h1 class="h2 mb-4">Nuestros servicios ...</h1>

                <div class="col-12 col-md-4 mt-4">
                    <a href="login_plantilla.html" class="row text-decoration-none">
                        <div class="col-12  mb-4">
                            <img src=".image/bachiller.jpg" alt="Coffe Flavour" class="img-fluid fixed-image-size"
                                width="553" height="746" Loading="lazy">
                        </div>
                        <div class="col-12">
                            <h3>USUARIOS</h3>
                            <p>Accede a todo el material que utilizamos en el centro: vídeos, esquemas, resumenes,
                                fichas
                                para reforzar los conocimientos.</p>
                            <!-- <p>Learn More <i class="bi bi-arrow-right-short"></i></p> -->
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 mt-4">
                    <a href="formulario_plantilla.html" class="row text-decoration-none">

                        <div class="col-12  mb-4">
                            <img src=".image/login.jpg" alt="Coffe Flavour" class="img-fluid fixed-image-size"
                                width="684" height="831" Loading="lazy">
                        </div>
                        <div class="col-12 ">
                            <h3>REGISTRATE</h3>
                            <p>Si quieres disfrutar de todos los recursos, regístrate.</p>
                            <!-- <p>learn more <i class="bi bi-arrow-right-short"></i></p> -->
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 mt-4">
                    <a href="asignaturas_temas_plantilla.html" class="row text-decoration-none">

                        <div class="col-12  mb-4">
                            <img src=".image/clase.jpg" alt="Coffe Flavour" class="img-fluid fixed-image-size"
                                width="553" height="746" Loading="lazy">
                        </div>
                        <div class="col-12">
                            <h3>ASIGNATURAS. DEMO</h3>
                            <p>Nos adaptamos a las necesidades de los chavales, pero nos centramos principalmente en el
                                de ciencias. </p>
                            <!-- <p>learn more <i class="bi bi-arrow-right-short"></i></p> -->
                        </div>
                    </a>
                </div>






            </div>


            <button class="navbar-toggler  dropdown-nav__closeNavBtn" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg></button>

        </div>

    </nav>

    <!--  FLYOUT NAVIGATION END-->

    <!-- HERO START -->

    <section class="hero">
        <div class="hero__overlay"></div>

        <video playsinline="playsinline" autoplay="autoplay" muted="" loop="loop" loading="lazy" class="hero__video">

            <source src="video/73007-545277076_small.mp4" type="video/mp4">
        </video>

        <div class="hero__content h-100 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width ms-auto">
                <div class="text-white">
                    <h1 class="hero__heading fw-bold mb-4 "> “Education is the most powerful weapon which you can use to
                        change the world".</h1>
                    <p class="lead fw-bold  mb-4 blockquote">Nelson Mandela.</p>
                    <!-- <a href="#" class="mt-2 btn btn-lg btn-outline-light" role="button">Buy now</a> -->
                </div>
            </div>
        </div>
        <!--   explore  -->
        <a href="#scroll-down" class="">

            Explore <i class="bi bi-arrow-down-short"></i>
        </a>

    </section>
    <!-- <a id="scroll-down"></a> esto es para hacer escroll, pero casi no se aprecia. -->
    <!-- HERO end -->

    <!-- CARRUSEL-->


    <section id="carrusel" class="py-5 ">
        <div id="" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="h2 mb-4 text-center fw-bold">Ayudamos a tus hijos a conseguir mejores resultados
                            académico
                        </h2>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="carousel-container">
                        <h2 class="h2 mb-4 text-center fw-bold">Fomentamos la autonomía y la confianza.</h2>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="carousel-container">
                        <h2 class="h2 mb-4 text-center fw-bold">Nuestro objetivo es que no nos necesites en el futuro.
                        </h2>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="carousel-container">
                        <h2 class="h2 mb-4 text-center fw-bold">Nos adaptamos a las necesidades de cada alumno.</h2>
                    </div>
                </div>




            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!--FIN  CARRUSEL-->

    <!--PRUEBA CARDS-->

    <section id="cards-section" class="py-5">
        <div class="container">
            <div class="container-cards">
                <!-- Card 1 -->
                <div class="card card-left">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h2 class="card-title">¿Por qué elegirnos?</h2>
                                <p class="card-text line-spacing fw-bold">Llevamos más de 20 años en el mundo de la
                                    enseñanza. <br>Tenemos la habilidad de conectar con nuestros alumnos.
                                    <br>Disponemos de los recursos necesarios: <br>aula climatizada, <br>equipos
                                    audiovisuales, <br>espacios cómodos. <br> Conseguimos que no nos vean como un centro
                                    de enseñanza, sino como un sitio al que acuden para recibir ayuda en las áreas que
                                    necesiten.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card card-right">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h2 class="card-title">¿Cómo trabajamos?</h2>
                                <p class="card-text line-spacing fw-bold">Nos adaptamos a las necesidades de cada
                                    alumno. Esto es gracias al número reducido que tienen los grupos.
                                    <br>Existen clases individuales y clases en grupos. <br>Trabajamos con el propio
                                    material del alumno, pero si lo vemos conveniente les facilitamos fichas propias
                                    junto con material extra para poder alcanzar sus objetivos.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="container card">
        <h5 class="line-spacing fw-bold">A lo largo de estos años hemos visto que la falta de motivación, ansiedad, baja
            autoestima, miedo al fracaso... son los problemas más comunes relacionados con el
            estudio. Es por ello que ofrecemos un servicio de orientación y acompañamiento que
            les ayude a que todo el sistema de aprendizaje funcione de manera más eficaz y
            armoniosa.</h5>
    </div>

    <!--FIN PRUEBA CARDS-->
    <!--  section one start  ----------------->


    <!-- 
    <section class="steps steps--background">
        <div class="container-custom">
            <div class="row">

                <div class="col-12 col-sm-6 d-md-flex justify-content-md-center">
                    <img src="image/teach.jpg" class="img-fluid  steps__section-thumbnail" alt=""
                        width="3022" height="2016" loading="lazy">
                </div>

                <div class="col-12 col-sm-6 align-self-center justify-content-md-center ">
                    <div class="steps_content-width">
                        
                        <h1 class="h2 mb-4">Nuestro principal objetivo</h1>
                        <p class="mb-4 line-spacing fs-6">Ayudamos a tus hijos a conseguir mejores resultados académico y a confiar en ellos mismos. Fomentamos la autonomía y la confianza. Nuestro objetivo es que no nos necesites en el futuro.

                            Para nosotros tener una buena base es primordial. Descubrimos cuál debe ser su punto de partida y empezamos desde ahí.
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!--  section one end  ----------------->

    <!--  section two start  ----------------->

    <!-- 
    <section class="steps container-custom ">

        <div class="row">

            <div class="col-12 col-sm-6 d-md-flex justify-content-md-center order-sm-1">
                <img src="image/words .jpg" class="img-fluid  steps__section-thumbnail" alt=""
                    width="1077" height="600" loading="lazy">
            </div>

            <div class="col-12 col-sm-6 align-self-center justify-content-md-center ">
                <div class="steps_content-width">
                    
                    <h1 class="h2 mb-4">¿Por qué elegirnos?</h1>
                    <p class="mb-4 line-spacing fs-6">Durante más de 20 años nos dedicamos a la enseñanza. Conocemos el temario y tenemos la habilidad de conectar con nuestros alumnos. 
                        En el centro disponemos de todo lo necesario para que puedan desarrollar sus habilidades: aula climatizada, equipos audiovisuales y espacios cómodos.
                    Conseguimos que no nos vean como un centro de enseñanza, si no como un sitio al que acuden para recibir ayuda en las áreas que necesiten.</p>
                    
                </div>
            </div>
        </div>

    </section> -->

    <!--  section two end  ----------------->

    <!--  section three start  ----------------->
    <!-- 

    <section class="steps steps--background ">
        <div class="container-custom">
            <div class="row">

                <div class="col-12 col-sm-6 d-md-flex justify-content-md-center ">
                    <img src="image/study.jpg" class="img-fluid  steps__section-thumbnail" alt=""
                        width="3022" height="2014" loading="lazy">
                </div>

                <div class="col-12 col-sm-6 align-self-center justify-content-md-center ">
                    <div class="steps_content-width">
                
                        <h1 class="h2 mb-4">¿Cómo trabajamos?</h1>
                        <p class="mb-4 line-spacing fs-6">El trato que ofrecemos es individual. Ayudamos a cada alumno en sus dudas. Existen clases individuales y clases en grupos. Los grupos son reducidos y nos adaptamos a sus necesidades.
                            Trabajamos con el propio material del alumno, pero si lo vemos conveniente les facilitamos fichas propias junto con material extra para poder alcanzar sus objetivos.
                            A lo largo de estos años hemos visto que la falta de motivación, ansiedad, baja autoestima, miedo al fracaso... son los problemas más comunes relacionados con el estudio. Es por ello que ofrecemos un servicio de orientación y acompañamiento que les ayude a que todo el sistema de aprendizaje funcione de manera más eficaz y armoniosa.
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!--  section three end  ----------------->





    <!-- --------------  Preguntas frecuentes----------->
    <section id="preguntas">
        <div class="container">
            <!-- <h3 class="title"> Preguntas frecuentes </h3> -->
            <h2 class="card-title">Preguntas frecuentes</h2>

            <div class="row preguntas align-items-center">
                <div class="col-4 order-sm-1">
                    <img src=".image/preguntas.jpg" class="img-fluid ">
                </div>
                <div class="col-8 ">
                    <div class="accordion" id="accordionPanelsStayOpenExample">

                        <!--PREGUNTA 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header " id="panelsStayOpen-headingOne">
                                <button class="accordion-button custom-accordion-header " type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <span class="span-accordion "> 1.- </span> Pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <i class="bi bi-patch-question"></i>

                                </button>
                            </h2>

                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until the
                                    collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>

                        <!--PREGUNTA 2 -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed custom-accordion-header" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <span class="span-accordion"> 2.- </span> pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <i class="bi bi-patch-question"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>

                        <!--PREGUNTA 3 -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed custom-accordion-header" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <span class="span-accordion"> 3.- </span> pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <i class="bi bi-patch-question"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>

                        <!--PREGUNTA 4 -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed custom-accordion-header" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <span class="span-accordion"> 4.- </span> pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <i class="bi bi-patch-question"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <!--PREGUNTA 5 -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed custom-accordion-header" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    <span class="span-accordion"> 5.- </span> pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <i class="bi bi-patch-question"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <!--PREGUNTA 6 -->


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed custom-accordion-header" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    <span class="span-accordion"> 6.- </span> pregunta
                                    <!-- <i class="bi bi-plus-lg"></i> -->
                                    <!-- <i class="bi bi-patch-question-fill"></i> -->
                                    <i class="bi bi-patch-question"></i>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the
                                    collapse plugin adds the appropriate classes that we use to style each element.
                                    These
                                    classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables.
                                    It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>












    <!-- SVG Waves -->
    <!-- <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
    <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
    </defs>
    <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3"></use>
    </g>
    <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0"></use>
    </g>
    <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9"></use>
    </g>
</svg> -->


    <!---------------- section 4 columns start ----------->
    <section class="bg-secondary text-white py-4">
        <div class="container-custom my-4">
            <div class="row">
                <div class="col-12 col-sm-3 mb-4">
                    <img src="image/primaria.jpg" alt=" " class="img-fluid mb-4" width="7011" height="4679"
                        loading="lazy">
                    <h3>PRIMARIA </h3>
                    <p class="line-spacing">Clases de refuerzo en grupo para alumnos de primaria.
                        <span class="highlight">Grupos reducidos.<br>Máximo 6 alumnos. </span><br>Ayudamos a tu hijo con
                        el seguimiento de sus deberes y a preparar las pruebas de evaluación.
                    </p>

                    <!-- <a class="highlight" href="aprendiendo_a_aprender.html">Más información <i class="bi bi-arrow-right"></i></a> -->
                </div>

                <div class="col-12 col-sm-3 mb-4">
                    <img src="image/secundaria.jpg" alt="health-benefits" class="img-fluid mb-4" width="4200"
                        height="2800" loading="lazy">
                    <h3>SECUNDARIA</h3>
                    <p class="line-spacing">Reforzamos las asignaturas en las que tu hijo tiene más dificultad. <span
                            class="highlight">Grupos reducidos.<br>Máximo 6 alumnos. </span><br> Impartimos asignaturas
                        de ciencias, aunque también les ayudamos en el área de las lenguas.<br>
                    </p>
                    <!-- <a class="highlight" href="aprendiendo_a_aprender.html">Más información <i class="bi bi-arrow-right"></i></a> -->

                </div>
                <div class="col-12 col-sm-3 mb-4">
                    <img src="image/bachiller.jpg" alt="essential-nutrients" class="img-fluid mb-4" width="6048"
                        height="4024" loading="lazy">
                    <h3>BACHILLER</h3>
                    <p class="line-spacing">Nos especializamos en las asignaturas de matemáticas, física, química y
                        biología.<span class="highlight"> Grupos reducidos y específicos de cada asignatura. Máximo 6
                            alumnos. </span><br>Intentamos, si es posible, que los alumnos sean del mismo centro y con
                        las mismas asignaturas. Así la evolución es mayor. </p>
                    <!-- <a class="highlight" href="aprendiendo_a_aprender.html">Más información <i class="bi bi-arrow-right"></i></a> -->

                </div>
                <div class="col-12 col-sm-3 mb-4">
                    <img src="image/particular.jpg" alt="essential-nutrients" class="img-fluid mb-4" width="4500"
                        height="3000" loading="lazy">
                    <h3>CLASES PARTICULARES</h3>
                    <p class="line-spacing">Apoyo particular en los diferentes nivels. <br> Dirigido a alumnos que
                        necesitan una mayor atención y dedicación, o alumnos que por circunstancias no pueden asistir a
                        los horarios del grupo.</p>
                    <!-- <a class="highlight" href="aprendiendo_a_aprender.html">Más información <i class="bi bi-arrow-right"></i></a> -->

                </div>
            </div>
        </div>

    </section>
    <!--seccion llamanos-->
    <section class="llamanos bg-secondary text-white py-4">
        <div class="container">
            <h1 class=" highlight line-spacing">Si necesita más información, para aclarar cualquier duda, estaremos
                encantados de atenderle. <br><br><em> "Invertir en la educación de su hijo es invertir en su
                    futuro."</em></h1>
        </div>

    </section>
    <!---------------- section 3 columns end ----------->

    <!---------------- footer start ----------->

    <section class="footer bg-secondary text-white">
        <div class="container-custom">
            <div class="row  justify-content-around align-items-center">
                <div id="contacto" class="col-12 col-md-6 footer-box text-center text-md-start mb-3 mb-md-0">

                    <p><b>CONTACTA CON NOSOTROS</b></p>
                    <p><i class="bi bi-geo-alt"></i> C/ Vicente zarazogá, 16 Bajo, Silla</p>
                    <p><i class="bi bi-telephone"></i> +34 012567894</p>
                    <p><i class="bi bi-envelope-at"></i> micorreo@gmail.com</p>
                </div>


                <div class="col-12 col-md-6 footer-box-iframe text-center text-md-start pt-4">


                    <p><b>PUEDES ENCONTRARNOS EN </b></p>
                    <div class="iframe-container ">
                        <iframe class="custom-iframe"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3084.974771466704!2d-0.414154124909615!3d39.356807919468004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604cfe0dbde0a7%3A0x702c7ff0b2db7d7e!2sC.%20Vicente%20Zaragoza%2C%2016%2C%2046460%20Silla%2C%20Valencia%2C%20Espa%C3%B1a!5e0!3m2!1ses!2s!4v1719827298355!5m2!1ses!2s"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>

            </div>
        </div>




        <div class="container-custom d-flex justify-content-between align-items-center mt-5  py-3 border-highlight">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="me-2 text-white">

                    <span> CENFORLAMBDA 2024</span>

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
    <!---------------- footer end ----------->





    <!-- Bootstrap Js -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--reproduccion automatica del audio-->

    <audio autoplay>
        <source src="audio/winter-relax-12060.mp3" type="audio/mp3">
        Tu navegador no soporta el elemento de audio.
    </audio>
    <!-- SÍ FUNCIONA PERO HAY QUE ESPERAR UN POQUITO-->


</body>

</html>