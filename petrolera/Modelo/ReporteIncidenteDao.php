<?php
include_once '../Entidad/ReporteIncidenteDto.php';
include_once '../Entidad/PruebaReporteDto.php';

class ReporteIncidenteDao {
    
    public function insertar($conexion, $ReporteIncidenteDto) {
        $insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO reporte_incidente ( nombre_reportero, cedula_reportero, fecha_reporte, nombre_pers_impl, descripcion, tipo_incidente, categoria_incidente, cedula_implicado )VALUES ( :nombre_reportero, :cedula_reportero, :fecha_reporte, :nombre_pers_impl, :descripcion, :tipo_incidente, :categoria_incidente, :cedula_implicado )";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre_reportero', $ReporteIncidenteDto->getNombre_reportero(), PDO::PARAM_STR);
                $sentencia->bindParam(':cedula_reportero', $ReporteIncidenteDto->getCedula_reportero(), PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reporte', $ReporteIncidenteDto->getFecha_reporte(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_pers_impl', $ReporteIncidenteDto->getNombre_pers_impl(), PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $ReporteIncidenteDto->getDescripcion(), PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_incidente', $ReporteIncidenteDto->getTipo_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':categoria_incidente', $ReporteIncidenteDto->getCategoria_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':cedula_implicado', $ReporteIncidenteDto->getCedula_implicado(), PDO::PARAM_STR);
                $insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $insertado;   
    }

    public function insertarPrueba($conexion, $PruebaReporteDto) {
        $insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO prueba_reporte ( id_reporte_incidente, tipo, contenido, nombre )VALUES ( :id_reporte_incidente, :tipo, :contenido, :nombre )";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_reporte_incidente', $PruebaReporteDto->getId_reporte_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $PruebaReporteDto->getTipo(), PDO::PARAM_STR);
                $sentencia->bindParam(':contenido', $PruebaReporteDto->getContenido(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $PruebaReporteDto->getNombre(), PDO::PARAM_STR);
                $insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $insertado;   
    }


    public function editarPrueba($conexion, $PruebaReporteDto) {
        $insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "UPDATE prueba_reporte SET  tipo = :tipo, contenido =:contenido, nombre = :nombre WHERE id_reporte_incidente = :id_reporte_incidente ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_reporte_incidente', $PruebaReporteDto->getId_reporte_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $PruebaReporteDto->getTipo(), PDO::PARAM_STR);
                $sentencia->bindParam(':contenido', $PruebaReporteDto->getContenido(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $PruebaReporteDto->getNombre(), PDO::PARAM_STR);
                $insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $insertado;   
    }


    public function editar($conexion, $ReporteIncidenteDto, $id_reporte_incidente) {
        $editado = false;
        if (isset($conexion)) {
            try { 
                $sql = "UPDATE reporte_incidente SET nombre_reportero = :nombre_reportero, cedula_reportero = :cedula_reportero, fecha_reporte = :fecha_reporte, nombre_pers_impl = :nombre_pers_impl, descripcion = :descripcion, tipo_incidente = :tipo_incidente, categoria_incidente = :categoria_incidente, cedula_implicado = :cedula_implicado WHERE id_reporte_incidente = :id_reporte_incidente";

                $sentencia = $conexion->prepare($sql);                
                $sentencia->bindParam(':nombre_reportero', $ReporteIncidenteDto->getNombre_reportero(), PDO::PARAM_STR);
                $sentencia->bindParam(':cedula_reportero', $ReporteIncidenteDto->getCedula_reportero(), PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reporte', $ReporteIncidenteDto->getFecha_reporte(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_pers_impl', $ReporteIncidenteDto->getNombre_pers_impl(), PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $ReporteIncidenteDto->getDescripcion(), PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_incidente', $ReporteIncidenteDto->getTipo_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':categoria_incidente', $ReporteIncidenteDto->getCategoria_incidente(), PDO::PARAM_STR);
                $sentencia->bindParam(':cedula_implicado', $ReporteIncidenteDto->getCedula_implicado(), PDO::PARAM_STR);
                $sentencia->bindParam(':id_reporte_incidente', $id_reporte_incidente, PDO::PARAM_INT);
                $editado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $editado;   
    }

    public function consultar($conexion, $cedula_implicado) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM reporte_incidente WHERE cedula_implicado = :cedula_implicado ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_implicado', $cedula_implicado, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $ReporteIncidenteDto = new ReporteIncidenteDto($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7],$resultado[8]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $ReporteIncidenteDto;        
    }
    

    public function consultarReporteInsert($conexion, $cedula_implicado, $cedula_reportero, $descripcion) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM reporte_incidente WHERE cedula_implicado = :cedula_implicado and cedula_reportero = :cedula_reportero and descripcion = :descripcion ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_implicado', $cedula_implicado, PDO::PARAM_STR);
                $sentencia->bindParam(':cedula_reportero', $cedula_reportero, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $ReporteIncidenteDto = new ReporteIncidenteDto($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7],$resultado[8]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $ReporteIncidenteDto;        
    }


    public function consultarPrueba($conexion, $id_reporte_incidente) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM prueba_reporte WHERE id_reporte_incidente = :id_reporte_incidente";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_reporte_incidente', $id_reporte_incidente, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $PruebaDto = new PruebaReporteDto($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $PruebaDto;        
    }

    public function eliminar($conexion, $id) {
        $eliminado = false;
        if (isset($conexion)) {
            //eliminamos las pruebas
            try {
                $sql = "DELETE FROM prueba_reporte WHERE id_reporte_incidente = :id ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
            //eliminamos el reporte
            try {
                $sql = "DELETE FROM reporte_incidente WHERE id_reporte_incidente = :id ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $eliminado;
    }
    
    public function mostrarTodos($conexion) {
        if (isset($conexion)) {
            try {                
                $sql = "SELECT * FROM reporte_incidente";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $resultado;
    }

    public function mostrarMisReportes($conexion, $cedula_reportero) {
        if (isset($conexion)) {
            try {                
                $sql = "SELECT * FROM reporte_incidente WHERE cedula_reportero = :cedula_reportero";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_reportero', $cedula_reportero, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $resultado;
    }
}