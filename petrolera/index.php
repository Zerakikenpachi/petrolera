﻿<?php
include_once 'Negocio/PersonaNegocio.php';
?>

<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->

<head>
    <title>Petrolera</title>
    <meta name="description" content="We are a tech oriented store with the best deals and products." />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="follow, all" />
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Facebook Meta tags for Product -->
    <meta property="fb:app_id" content="283643215104248" />
    <meta property="og:title" content="Petrolera" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="images/logo.jpg" />
    <meta property="og:description" content="We are a tech oriented store with the best deals and products." />
    <meta property="og:url" content="index.php" />
    <meta property="og:site_name" content="Bootstrap" />
    <meta name="twitter:card" content="summary" />

    <link rel="alternate" hreflang="en" href="#" />
    <link rel="alternate" hreflang="es-CL" href="#" />
    <link rel="alternate" hreflang="es-CO" href="#" />
    <link rel="alternate" hreflang="pt-BR" href="#" />
    <link rel="alternate" hreflang="pt-PT" href="#" />
    <link rel="alternate" hreflang="es-MX" href="#" />
    <link rel="alternate" hreflang="es" href="#" />
    <link rel="canonical" href="index-html">

    <link rel="icon" href="images/favicon.png">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script type="application/ld+json">
                    {
                    "@context": "http://schema.org/"
                    ,
                    "@type": "WebSite",
                    "url": "http://bootstrap.jumpseller.com",
                    "potentialAction": {
                    "@type": "SearchAction",
                    "target": "http://bootstrap.jumpseller.com/search/{search_term_string}",
                    "query-input": "required name=search_term_string"
                    }
                    }
                </script>
    <script type="text/javascript">
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-12220401-1');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');
    </script>
    <script src="js/jumpseller-2.0.0.js" type="text/javascript" defer="defer"></script>
    <meta content="authenticity_token" name="csrf-param" />
    <meta content="xZQb7F7cY51Pcxbr9DCzA/DzY8Gpr+VDzS+NX1BHOqg=" name="csrf-token" />


    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/color_pickers.css" />
</head>

                    <div class="container">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h1 class="page-header"><small>Ingresa al</small> Módulo de Reporte de Incidentes</h1>
                            </div>
                        </div>
                        <!-- /.row -->
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="card mb-3">
                                    <div class="card-block">
                                        <form action="#" accept-charset="UTF-8" method="post" id="login">  <div id="credentials">
                                                <div id="credentials_email" class="field">
                                                    <label for="customer_credentials_email">Usuario</label>
                                                    <input type="Username" name="usuario" id="customer_email" class="text" />
                                                </div>
                                                <div id="credentials_password" class="field">
                                                    <label for="customer_credentials_password">Contraseña</label>
                                                    <input type="password" name="contrasena" id="customer_password" class="text" />
                                                </div>
                                                <div class="actions">
                                                    <input type="submit" value="Ingresar" class="button" name="btnlogin" />
                                                </div>

                                                <!--MOSTRAR EL ERROR-->
                                                    <?php
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="form-group has-error">
                                                            <label class="control-label" for="inputError">
                                                            <h1><?php echo $error; ?></h1>
                                                        </div>                            
                                                        <?php }
                                                    ?>
                                                <!--/MOSTRAR EL ERROR-->

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="customer-new" class="col-md-6 col-sm-6 col-xs-12">
                                <div class="card">
                                    <div class="card-header"><h2 class="card-title">¿Aún no tienes una Cuenta?</h2></div>
                                    <div class="card-block">
                                        <p>Registrate Gratis y Reporta tus Incidentes.</p>
                                        <a href="cuerpo/registrar.php" class="btn btn-secondary btn-block" title="Register as Customer">
                                            Registrarse
                                        </a>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>    
                    
   <!-- Footer -->
   <div class="container">
        <footer>
            <div class="row">
                <div class="col-sm-12">
                    <p class="powerd-by">&copy; 2018 Todos los Derechos Reservados por <a
                            href='#' title='Equipo 5' target='_blank' rel='nofollow'>Equipo 5</a>.</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->


    <!-- Bootstrap Core JavaScript -->
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate Tooltips -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            $('.carousel').carousel()
        })
    </script>
    <script src="js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>