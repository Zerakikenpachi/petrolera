<?php
include_once("../plantillas/header.php");

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

$arrayP = $_SESSION['arrayPersonas'];
?>


                    <div class="container">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h1 class="page-header" >Administrar Personas</h1>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="actions">
                            <a href="addPersonas.php" class="button" id="registrar" >Agregar Persona</a>
                        </div> 
                        <br>


                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                    <!-- encabezado -->
                        <thead>
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Cédulas</th>
                                <th>Nombres</th>
                                <th>Cargo</th>
                                <th>Correo Eléctronico</th>
                                <th>Fecha de Ingreso</th>
                                <th>Usuario</th>
                                <th>Editar</th>
                                <?php
                                    if($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes'){
                                    ?>
                                       <th>Eliminar</th>
                                    <?php
                                    }
                                    ?>                                
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <?php foreach($arrayP as $array){?>
                                <tr>
                                <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                                    <td><a href="#" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                    <td><?php echo $array->cedula_persona;?></td>
                                    <td><?php echo $array->nombre_persona; ?></td>
                                    <td><?php echo $array->cargo_persona; ?></td>
                                    <td><?php echo $array->correo_persona; ?></td>
                                    <td><?php echo $array->fecha_ingreso; ?></td>
                                    <td><?php echo $array->usuario; ?></td>                                           
                                    <td><a href="../Controlador/PersonaController.php?accion=consultar&subaccion=editar&cedula_persona=<?php echo $array->cedula_persona; ?>" class="small-box-footer"> <i class="fa fa-pencil"></i></a></td>
                                    <?php
                                    if($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes'){
                                    ?>

                                        <td><a href="../Controlador/PersonaController.php?accion=eliminar&idpersona=<?php echo $array->idpersona; ?>" class="small-box-footer" > <i class="fa fa-remove"></i></a></td>
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                </tr>                    
                                <?php } ?>
                        </tbody>
                        <!-- pie -->
                    </table>
                </div>


                    </div>
                    <hr>                    
                   
<?php
include_once("../plantillas/footer.php");
?>


<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            //cambiar el lenguaje a español forma 1
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar: ",
                "zeroRecords": "No hay Registros encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
