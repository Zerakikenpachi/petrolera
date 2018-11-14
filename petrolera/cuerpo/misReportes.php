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



$arrayP = $_SESSION['arrayMisReporteIncidentes'];
?>


                    <div class="container">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h1 class="page-header" >Reporte de Incidentes</h1>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="actions">
                        <a href="addReporteIncidentes.php" class="button" id="registrar" >Agregar Registro de Reporte</a>
                        </div> 
                        <br>


                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                    <!-- encabezado -->
                        <thead>
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Nombre Reportero</th>
                                <th>Cédula</th>
                                <th>Fecha</th>
                                <th>Nombres Implicados</th>
                                <th>Descripción</th>                                
                                <th>Tipo Incidente</th>
                                <th>Catergoría</th>
                                <th>Cedula Implicado</th>
                                <th>Prueba</th>
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
                                    <td><?php echo $array->nombre_reportero;?></td>
                                    <td><?php echo $array->cedula_reportero; ?></td>
                                    <td><?php echo $array->fecha_reporte; ?></td>
                                    <td><?php echo $array->nombre_pers_impl; ?></td>
                                    <td><?php echo $array->descripcion; ?></td>                                    
                                    <td><?php echo $array->tipo_incidente; ?></td>
                                    <td><?php echo $array->categoria_incidente; ?></td>
                                    <td><?php echo $array->cedula_implicado; ?></td>
                                    <td><a href='../Controlador/ReporteIncidenteController.php?accion=descargarPrueba&id_reporte_incidente=<?php echo $array->id_reporte_incidente; ?>'>Descargar</a> </td>                                                   
                                    <td><a href="../Controlador/ReporteIncidenteController.php?accion=consultar&subaccion=editar&cedula_implicado=<?php echo $array->cedula_implicado; ?>" class="small-box-footer">Editar <i class="fa fa-pencil"></i></a></td>
                                    <?php
                                    if($_SESSION['personaLogin']->getRol() == 'Administrador de Reportes'){
                                    ?>
                                        <td><a href="../Controlador/ReporteIncidenteController.php?accion=eliminar&id_reporte_incidente=<?php echo $array->id_reporte_incidente; ?>" class="small-box-footer"  >Eliminar <i class="fa fa-remove"></i></a></td>
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