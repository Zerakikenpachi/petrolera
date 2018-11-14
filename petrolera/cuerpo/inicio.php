
<?php
include_once("../plantillas/header.php");

if($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes'){//validamos el inicio de sesión
    include_once '../plantillas/administradorMenu.php';
}else if($_SESSION['personaLogin']->getRol() == 'Proveedor') {
    include_once '../plantillas/proveedorMenu.php';
}else if($_SESSION['personaLogin']->getRol() == 'Empleado'){
    include_once '../plantillas/empleadoMenu.php';
}else{//cierre de la validación de inicio de sessión
    ?>
    <script>
        //se redirecciona a dicha pagina
        document.location.href = '../plantillas/ObjetoNoEncontrado.php';
    </script>
    <?php
}
?>


    <!-- Page Content -->
    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image:url('../images/slider-demo.jpg');">
            </div>
            <div class="carousel-item" style="background-image:url('../images/slider-demo-2.jpg');">
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Page Content -->
    <div class="container">
        
        <!-- Products Section -->
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-6">
                <h2 class="page-header">EPC</h2>
            </div>

            <!-- Featured Products -->
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="caption">
                    <h4 class="pull-left"><a href="#"></a></h4>
                    <h4 class="pull-right price-mob">
                        <span class="product-block-not-available"></span>
                    </h4>
                    <div class="clearfix"></div>
                    <p >
                    EPC es un sistema de información orientado a gestionar incidentes y posibles incidentes en sus instalaciones.<br><br>

Este módulo permite registrar a los empleados o provedores los incidentes o riesgos de incidente que se presentan en su labor diaria. Estos incidentes pueden ser registrados utilizado computadores, tablets o dispositivos móviles. <br><br>

Usted está conectado como un usuario administrador de reportes  y por lo tanto está habilitado para parametrizar la herramienta de acuerdo a las condiciones propias de la operación de su empresa y de forma apropiada deberá hacer uso de las siguientes opciones, en el orden indicado a continuación:
Reportes de incidentes. Corresponde al registro de todos los reportes realizados, también se podrá hacer la busqueda de un reporte especifico, listar las notificaciones sobre la demora en atender un incidente, notificar a los gestores sobre la demora en la atención y generar nuevos registros.
                    </p>
                </div>
            </div>

           
        </div><!-- /.row -->
    </div>
    <hr>

<?php
include_once("../plantillas/footer.php");
?>
 