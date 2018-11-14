<?php
include_once ('../Entidad/ReporteIncidenteDto.php');
include_once("../plantillas/header.php");

if ($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes') {//validamos el inicio de sesión
    include_once '../plantillas/administradorMenu.php';
} else if ($_SESSION['personaLogin']->getRol() == 'Proveedor') {
    include_once '../plantillas/proveedorMenu.php';
} else if ($_SESSION['personaLogin']->getRol() == 'Empleado') {
    include_once '../plantillas/empleadoMenu.php';
} else {//cierre de la validación de inicio de sessión
    ?>
    <script>
        //se redirecciona a dicha pagina
        document.location.href = '../plantillas/ObjetoNoEncontrado.php';
    </script>
    <?php
}

$reporteIncidenteConsultadao = $_SESSION['ReporteIncidenteConsultado'];
//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../Negocio/ReporteIncidenteNegocio.php";
?>


<!-- Page Content -->

<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header"> Detalles del Reporte de Incidente</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <form action="#" accept-charset="UTF-8" method="post" id="details">  
                        <div id="customer_details">
                            <h4 class="title">Edite el Reporte de Incidente</h4>


                                <!--MOSTRAR EL ERROR-->
                            <?php
                            if (isset($error)) {
                                ?>
                                <div class="form-group has-error">
                                    <label class="control-label" for="inputError">
                                        <i class="fa fa-times-circle-o"></i> <?php echo $error; ?></label>
                                </div>                            
                            <?php }
                            ?>
                            <!--/MOSTRAR EL ERROR-->
                            
                                <!--oculto-->
                                <div id="contacts_phone" class="field text-field">
                                    <input type="hidden" name="id_reporte_incidente"   class="text" value="<?php echo $reporteIncidenteConsultadao->getId_reporte_incidente() ?>">
                                </div>

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Nombre Reportero </label>
                                    <input type="text" name="nombre_reportero"  class="text" value="<?php echo $reporteIncidenteConsultadao->getNombre_reportero() ?>">
                                </div>

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Cédula Reportero</label>
                                    <input type="text" name="cedula_reportero"   class="text" value="<?php echo $reporteIncidenteConsultadao->getCedula_reportero() ?>">
                                </div>

                                <div class="form-group">
                                    <label>Fecha de Ingreso</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="fecha_reporte" id="datepicker" value="<?php echo $reporteIncidenteConsultadao->getFecha_reporte() ?>">
                                    </div>
                                </div>

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Nombres de Personas Implicadas </label>
                                    <input type="text" name="nombre_pers_impl"  class="text" value="<?php echo $reporteIncidenteConsultadao->getNombre_pers_impl() ?>">
                                </div>

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Descripcion </label>
                                    <input type="text" name="descripcion" class="text" value="<?php echo $reporteIncidenteConsultadao->getDescripcion() ?>">
                                </div>
                          

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Tipo de Incidente </label>
                                    <input type="text" name="tipo_incidente"   class="text" value="<?php echo $reporteIncidenteConsultadao->getTipo_incidente() ?>">
                                </div>


                                <div class="form-group">
                                    <label>categoria incidente</label>
                                    <div>
                                        <select class="form-control" name="categoria_incidente" value="<?php echo $reporteIncidenteConsultadao->getCategoria_incidente() ?>">
                                            <option><?php echo $reporteIncidenteConsultadao->getCategoria_incidente() ?></option>
                                            <option>Medio</option>
                                            <option>Alto</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="contacts_phone" class="field text-field">
                                    <label for="customer_phone">Cédula Implicado</label>
                                    <input type="text" name="cedula_implicado"   class="text" value="<?php echo $reporteIncidenteConsultadao->getCedula_implicado() ?>">
                                </div>

                                <div class="actions">
                                    <input type="submit" value="Editar" class="button" name="btneditar" />
                                </div>
                        </div>
                    </form>
                        
                    <form action="../Negocio/ReporteIncidenteNegocio.php" method="post" id="details" enctype="multipart/form-data" > 

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Prueba Reporte </label>
                                <input type="file" name="prueba_reporte"   class="text" >
                            </div>

                             <!--oculto-->
                            <div id="contacts_phone" class="field text-field">
                                    <input type="hidden" name="id_reporte_incidentePrueba"   class="text" value="<?php echo $reporteIncidenteConsultadao->getId_reporte_incidente() ?>">
                            </div>
                        
                            <div class="actions">
                                    <input type="submit" value="Editar Prueba" class="button" name="btneditarPrueba" />
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<?php
include_once("../plantillas/footer.php");
?>


<!--SCRIPS NECESARIOS PARA EL DATE PICKER-->
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>