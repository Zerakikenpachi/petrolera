<?php
include_once '../Entidad/PruebaReporteDto.php';

if (isset($_POST['btnregistrar']) || isset($_POST['btneditar'])  ) {

    $id_reporte_incidente = trim($_POST['id_reporte_incidente']);
    $nombre_reportero = trim($_POST['nombre_reportero']);
    $cedula_reportero = trim($_POST['cedula_reportero']);
    $fecha_reporte = trim($_POST['fecha_reporte']);
    $nombre_pers_impl= trim($_POST['nombre_pers_impl']);
    $descripcion = trim($_POST['descripcion']);
    $tipo_incidente = trim($_POST['tipo_incidente']);
    $categoria_incidente = trim($_POST['categoria_incidente']);
    $cedula_implicado = trim($_POST['cedula_implicado']);

    if (empty($nombre_reportero)) {//nombre_reportero
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($nombre_reportero) > 90) {
        $error = "Ingrese máximo 90 caracteres en el Nombre del Reportero";
    } else if (empty($cedula_reportero)) {//cedula_reportero
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($cedula_reportero) > 10) {
        $error = "Ingrese máximo 10 caracteres en el Nro. de Documento";
    } else if (!is_numeric($cedula_reportero)) {
        $error = "Ingrese un valor númerico en el campo Nro. de Documento";
    } else if (empty($fecha_reporte)) {//fecha_reporte
        $error = "Seleccione una Fecha";
    } else if (empty($nombre_pers_impl)) {//nombre_pers_impl
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($nombre_pers_impl) > 90) {
        $error = "Ingrese máximo 90 caracteres en el Nombre de la Persona Implicada";
    } else if (empty($descripcion)) {//descripcion
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($descripcion) > 500) {
        $error = "Ingrese máximo 500 caracteres en la Descripción";
    } else if (empty($tipo_incidente)) {//tipo_incidente
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($tipo_incidente) > 60) {
        $error = "Ingrese máximo 60 caracteres en el Tipo de Incidente";
    } else if (empty($cedula_implicado)) {//cedula_implicado
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($cedula_implicado) > 10) {
        $error = "Ingrese máximo 10 caracteres en el Nro. de Documento";
    } else if (!is_numeric($cedula_implicado)) {
        $error = "Ingrese un valor númerico en el campo Nro. de Documento";
    } else if ($categoria_incidente!= 'Bajo' && $categoria_incidente  != 'Medio'&& $categoria_incidente  != 'Alto' ) { //categoria_incidente
        $error = "Seleccione una categoria de incidente correcta";
    }else{

    
        if (isset($_POST['btnregistrar'])){
                $prueba_reporte = $_FILES['prueba_reporte']["tmp_name"];

                $tamanio = $_FILES["prueba_reporte"]["size"]; 
                $tipo    = $_FILES["prueba_reporte"]["type"]; 
                $nombre  = $_FILES["prueba_reporte"]["name"]; 
                    

                $fp = fopen($prueba_reporte, "r"); 
                $contenido = fread($fp,filesize($prueba_reporte)); 
                $contenido = addslashes($contenido); 
                fclose($fp);


                $contenidoArchivo = $contenido; 
                $tipoArchivo = $tipo;
                $nombreArchivo = $nombre;

                session_start();
                $_SESSION['pruebaDto'] = $pruebaReporteDto = new PruebaReporteDto('', '', $tipoArchivo, $contenidoArchivo, $nombreArchivo);

                ?>
                    <script>
                        //se redirecciona a dicha pagina
                        document.location.href = '../Controlador/ReporteIncidenteController.php?accion=insertar&cedula_implicado=<?php echo ($cedula_implicado)?>&nombre_reportero=<?php echo ($nombre_reportero)?>&cedula_reportero=<?php echo ($cedula_reportero)?>&fecha_reporte=<?php echo ($fecha_reporte)?>&nombre_pers_impl=<?php echo ($nombre_pers_impl)?>&descripcion=<?php echo ($descripcion)?>&tipo_incidente=<?php echo ($tipo_incidente)?>&categoria_incidente=<?php echo ($categoria_incidente)?>&cedula_implicado=<?php echo ($cedula_implicado)?>';
                    </script>
                <?php
    
        }else if(isset($_POST['btneditar'])) {

                    ?>
                    <script>
                        //se redirecciona a dicha pagina
                        document.location.href = '../Controlador/ReporteIncidenteController.php?accion=editar&id_reporte_incidente=<?php echo ($id_reporte_incidente)?> cedula_implicado=<?php echo ($cedula_implicado)?>&nombre_reportero=<?php echo ($nombre_reportero)?>&cedula_reportero=<?php echo ($cedula_reportero)?>&fecha_reporte=<?php echo ($fecha_reporte)?>&nombre_pers_impl=<?php echo ($nombre_pers_impl)?>&descripcion=<?php echo ($descripcion)?>&tipo_incidente=<?php echo ($tipo_incidente)?>&categoria_incidente=<?php echo ($categoria_incidente)?>&cedula_implicado=<?php echo ($cedula_implicado)?>';
                    </script>
                    <?php

        }


    }
}

if (isset($_POST['btneditarPrueba'])){
    $id_reporte_incidentePrueba = trim($_POST['id_reporte_incidentePrueba']);
    $prueba_reporte = $_FILES['prueba_reporte']["tmp_name"];

                $tamanio = $_FILES["prueba_reporte"]["size"]; 
                $tipo    = $_FILES["prueba_reporte"]["type"]; 
                $nombre  = $_FILES["prueba_reporte"]["name"]; 
                    

                $fp = fopen($prueba_reporte, "r"); 
                $contenido = fread($fp,filesize($prueba_reporte)); 
                $contenido = addslashes($contenido); 
                fclose($fp);


                $contenidoArchivo = $contenido; 
                $tipoArchivo = $tipo;
                $nombreArchivo = $nombre;

                session_start();
                $_SESSION['pruebaDtoEditar'] = $pruebaReporteDto = new PruebaReporteDto('', $id_reporte_incidentePrueba, $tipoArchivo, $contenidoArchivo, $nombreArchivo);

                ?>
                    <script>
                        //se redirecciona a dicha pagina
                        document.location.href = '../Controlador/ReporteIncidenteController.php?accion=editarPrueba';
                    </script>
                <?php

}