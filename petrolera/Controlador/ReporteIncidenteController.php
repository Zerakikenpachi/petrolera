<?php
include_once '../Entidad/PruebaReporteDto.php';
include_once '../Entidad/PersonaDto.php';
session_start();
include_once '../Configuracion/ConexionDB.php';
include_once '../Modelo/ReporteIncidenteDao.php';
include_once '../Entidad/ReporteIncidenteDto.php';
ConexionDB::conectar();

switch ($_GET['accion']) {

    case "insertar":

        $ReporteIncidenteDto = new ReporteIncidenteDto('', $_GET['nombre_reportero'], $_GET['cedula_reportero'], $_GET['fecha_reporte'], $_GET['nombre_pers_impl'], $_GET['descripcion'], $_GET['tipo_incidente'], $_GET['categoria_incidente'], $_GET['cedula_implicado']);
        
            //inserta reporte
            $insertado = ReporteIncidenteDao :: insertar(ConexionDB::obtener_conexion(), $ReporteIncidenteDto);
            //consulta reporte insertado
            $consultarReporteInsert = ReporteIncidenteDao :: consultarReporteInsert(ConexionDB::obtener_conexion(), $ReporteIncidenteDto->getCedula_implicado(), $ReporteIncidenteDto->getCedula_reportero(), $ReporteIncidenteDto->getDescripcion());
            $pruebaReporteDto = new PruebaReporteDto('', $consultarReporteInsert->getId_reporte_incidente(), $_SESSION['pruebaDto']->getTipo(),  $_SESSION['pruebaDto']->getContenido(),  $_SESSION['pruebaDto']->getNombre() );
            //añadimos la prueba al reporte del incidente
            $insertadoPrueba = ReporteIncidenteDao :: insertarPrueba(ConexionDB::obtener_conexion(), $pruebaReporteDto);
                ?>
                <script>                
                    alert('Se ha Agregado Correctamente el reporte de incidente');             
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
    break;

    case "editarPrueba":

             $_SESSION['pruebaDtoEditar'];
            //añadimos la prueba al reporte del incidente
            $insertadoPrueba = ReporteIncidenteDao :: editarPrueba(ConexionDB::obtener_conexion(), $_SESSION['pruebaDtoEditar']);
                ?>
                <script>                
                    alert('Se ha Actualizado Correctamente la prueba del reporte de incidente');             
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
    break;

    case "editar": 

        $ReporteIncidenteDto = new ReporteIncidenteDto('', $_GET['nombre_reportero'], $_GET['cedula_reportero'], $_GET['fecha_reporte'], $_GET['nombre_pers_impl'], $_GET['descripcion'], $_GET['tipo_incidente'], $_GET['categoria_incidente'], $_GET['cedula_implicado']);
        $consulta = ReporteIncidenteDao :: consultar(ConexionDB::obtener_conexion(), $ReporteIncidenteDto->getCedula_implicado());
        if($consulta->getId_reporte_incidente() != ''){
            $editado = ReporteIncidenteDao :: editar(ConexionDB::obtener_conexion(), $ReporteIncidenteDto, $_GET['id_reporte_incidente']);
                ?>
                <script>                
                    alert('Se ha Editado Correctamente el reporte de incidente');             
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
        }else{
                ?>
                <script>                
                     alert('No hay Reporte');              
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
        }
        ConexionDB::desconectar();

    break;

case "eliminar": 
    ?>    
    <script>
        var opcion = confirm("¿Desea eliminar el Reporte de Incidente?");
        if (opcion == false) {
            document.location.href = '../cuerpo/listReporteIncidentes.php';
        } 
    </script>
    <?php

     $eliminado = ReporteIncidenteDao :: eliminar(ConexionDB::obtener_conexion(), $_GET['id_reporte_incidente']);
      if ($eliminado) {
          ?>
          <script>
              alert('Se ha Eliminado Correctamente el reporte de incidente');
              document.location.href = '../cuerpo/inicio.php';
            </script>
          <?php
          ConexionDB::desconectar();
          exit();
      }
      ConexionDB::desconectar();
break;

case "consultar": 

    $_SESSION['ReporteIncidenteConsultado'] = ReporteIncidenteDao :: consultarReporteInsert(ConexionDB::obtener_conexion(), $_GET['cedula_implicado'],$_GET['cedula_reportero'],$_GET['descripcion']);
    if($_SESSION['ReporteIncidenteConsultado']->getId_reporte_incidente() != ''){   
        
        if($_GET['subaccion'] == 'editar'){
            ?>
            <script>                           
                document.location.href = '../cuerpo/editReporteIncidentes.php';
            </script>
            <?php
            ConexionDB::desconectar();
            exit();
        }else{

        }
            
    }else{
        ?>
            <script>                
                alert('El reporte de incidente no Existe en la Base de datos');               
                document.location.href = '../cuerpo/inicio.php';
            </script>
            <?php
            ConexionDB::desconectar();
            exit();
    }
    ConexionDB::desconectar();

break;



case "descargarPrueba": 
    $prueba = ReporteIncidenteDao :: consultarPrueba(ConexionDB::obtener_conexion(), $_GET['id_reporte_incidente']);
    $extenciones = array("application/msword"=>"doc","application/pdf"=>"pdf","image/jpeg"=>"jpg", "application/rar"=>"rar", "text/plain"=>"txt" );
    $tipo = $prueba->getTipo();
    $contenido = $prueba->getContenido();
    $nombre = $prueba->getNombre();

    header("Content-type: $tipo");
    header('Content-disposition: attachment; filename='.$nombre ); 
    echo $contenido;
break;


case "mostrarTodos": 

    $_SESSION['arrayReporteIncidentes'] = ReporteIncidenteDao  :: mostrarTodos(ConexionDB::obtener_conexion());
    ?>
    <script>
        document.location.href = '../cuerpo/listReporteIncidentes.php';// se redir a la list
    </script>
    <?php
    ConexionDB::desconectar();
    exit();

break;

case "mostrarMisReportes": 

    $_SESSION['arrayMisReporteIncidentes'] = ReporteIncidenteDao  :: mostrarMisReportes(ConexionDB::obtener_conexion(), $_SESSION['personaLogin']->getCedula_persona());
    ?>
    <script>
        document.location.href = '../cuerpo/misReportes.php';// se redir a la list
    </script>
    <?php
    ConexionDB::desconectar();
    exit();

break;

}
