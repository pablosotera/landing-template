<?php
$_idVenta = $_GET['idVenta'];
$_curso = $_GET['curso'];
include("includes/funcionsDB.php");
$venta = getVenta($_idVenta, $_curso);
$cursoP = getCursoDetalle($_curso);
$monto = $cursoP['PRECIO_UNITARIO'];

$botones = [];
$arraycursosid = explode('|', $venta['CURSO']);

foreach ($arraycursosid as $value) {
    $curso = getCursoDetalle($value);
    $botones[] = [
        'desc' => $curso['TITULO'],
        'urlDownload' => $curso['URL_DOWNLOAD'],
        'urlFacebook' => $curso['URL_FACEBOOK_GROUP'],
    ];
}

if (isset($_GET['test'])) {
    echo "<pre style='color:white'>";
    print_r($arraycursosid);
    echo "</pre>";

    echo "<pre style='color:white'>";
    print_r($botones);
    echo "</pre>";

    echo "<pre style='color:white'>";
    print_r($venta);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" >
        <title>Pago exitoso</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="i/favicon.png" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&amp;family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&amp;subset=latin&amp;display=swap" rel="stylesheet">
        <!-- Bootstrap 4.5.0 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Slick 1.8.1 jQuery plugin CSS (Sliders) -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!-- Fancybox 3 jQuery plugin CSS (Open images and video in popup) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <!-- AOS 2.3.4 jQuery plugin CSS (Animations) -->
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <!-- Startup CSS (Styles for all blocks) - Remove ".min" if you would edit a css code -->
        <link href="css/style.min.css" rel="stylesheet" />
        <!-- jQuery 3.5.1 -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link href="vendor/css/spinner.css" rel="stylesheet">
        <!-- Facebook Pixel Code PA -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '482478579871610');
            fbq('track', 'PageView');</script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=482478579871610&ev=PageView&noscript=1"
                   /></noscript>
    <!-- End Facebook Pixel Code -->
</head> 
<body class="bg-dark">
    <script>
        fbq('track', 'Purchase', {
            value: <?= $monto ?>,
            currency: 'ARS',
        },{'eventID': '<?= $_curso . '-' . $_idVenta ?>'});
    </script>
    
    <section class="bg-dark color-white py-5 " style="padding-bottom: 15px;">
        <div class="container" id="gr">
            <img src="cursos/img/logo.png" id="gr" class="img-fluid pt-md-5" /> 
        </div>
        <div class="container text-center" id="ch">
            <img src="cursos/img/logo.png" class="img-fluid pt-md-5 " /> 
        </div>
    </section>

    <div class="container rounded  bg-dark text-white py-5  " style="">
        <div class="order-md-2 px-3">
            <h1 class="  ">¡Te damos la bienvenida a Academia Argentina!</h1>
            <p class="lead mt-2">
                Para ver el material ahora, clickeá el siguiente botón
            </p>

            <div class="tb_es_btn_wrapper mt-4">
                <a href="instrucciones.php?idVenta=<?= $_idVenta ?>&curso=<?= $_curso ?>">  
                    <button type="button" class="col-md-8 py-3 lead  bg-success text-white text-uppercase">👉 <b>Ver instrucciones</b></button>
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termstitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termstitle">Términos y Condiciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4.5.0 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Fancybox 3 jQuery plugin JS (Open images and video in popup) -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- Slick 1.8.1 jQuery plugin JS (Sliders) -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- AOS 2.3.4 jQuery plugin JS (Animations) -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <!-- Maskedinput jQuery plugin JS (Masks for input fields) -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <!-- Startup JS (Custom js for all blocks) -->
    <script src="js/script.js"></script>
    <!-- Startup JS (Custom js for all blocks) -->

    <style>

        @media screen and (max-width: 600px) {
            #gr {
                display: none; } }

        @media screen and (min-width: 600px) {
            #ch {
                display: none; } }

        @media screen and (max-width: 900px) {
            #xl {
                display: none; } }

    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-66DGSBF34L"></script>
    <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'G-66DGSBF34L');
    </script>
</body>
</html>
