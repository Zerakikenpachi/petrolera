<?php
include_once("../plantillas/header.php");

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../Negocio/PersonaNegocio.php";

if($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes'){//validamos el inicio de sesión
    include_once '../plantillas/administradorMenu.php';
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

<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header"> Detalles de la Persona</h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <form action="#" accept-charset="UTF-8" method="post" id="details">  
                        <div id="customer_details">
                            <h4 class="title">Perfil del Usuario</h4>



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
                                <input type="hidden" name="idpersona"   class="text" value=""/>
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Cédula </label>
                                <input type="text" name="cedula_persona"   class="text" value="<?php
                                if (isset($cedula_persona)) {
                                    echo $cedula_persona;
                                }
                                ?>">
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Nombres </label>
                                <input type="text" name="nombre_persona"  class="text" value="<?php
                                if (isset($nombre_persona)) {
                                    echo $nombre_persona;
                                }
                                ?>">
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Cargo </label>
                                <input type="text" name="cargo_persona" class="text" value="<?php
                                if (isset($cargo_persona)) {
                                    echo $cargo_persona;
                                }
                                ?>">
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Correo Eléctronico </label>
                                <input type="text" name="correo_persona"   class="text" value="<?php
                                if (isset($correo_persona)) {
                                    echo $correo_persona;
                                }
                                ?>">
                            </div>

                            <div class="form-group">
                                <label>Fecha de Ingreso</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="fecha_ingreso" id="datepicker" value="<?php
                                    if (isset($fecha_ingreso)) {
                                        echo $fecha_ingreso;
                                    }
                                    ?>">
                                </div>
                            </div>
                   

                            <div class="form-group">
                                <label>Rol</label>
                                <div>
                                    <select class="form-control" name="rol" value="<?php
                                    if (isset($rol)) {
                                        echo $rol;
                                    }
                                    ?>">
                                        <option>Administrador de Reportes</option>
                                        <option>Empleado</option>
                                        <option>Proveedor</option>
                                    </select>
                                </div>
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Usuario </label>
                                <input type="text" name="usuario" class="text" value="<?php
                                if (isset($usuario)) {
                                    echo $usuario;
                                }
                                ?>">
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Contraseña </label>
                                <input type="password" name="contrasena" value=""  class="text" />
                            </div>

                            <div id="contacts_phone" class="field text-field">
                                <label for="customer_phone">Confirmar Contraseña </label>
                                <input type="password" name="confirmar_contrasena" value=""  class="text" />
                            </div>


                            <div class="actions">
                                <input type="submit" value="Agregar" class="button" name="btnregistrar" />
                            </div>


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