<?php
include_once '../Entidad/PersonaDto.php';
class PersonaDao {
    
    public function insertar($conexion, $PersonaDto) {
        $insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO persona (cedula_persona, nombre_persona, cargo_persona, correo_persona, fecha_ingreso, usuario, contrasena, rol ) VALUES (:cedula_persona, :nombre_persona,:cargo_persona,:correo_persona,:fecha_ingreso, :usuario, :contrasena, :rol )";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_persona', $PersonaDto->getCedula_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_persona', $PersonaDto->getNombre_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':cargo_persona', $PersonaDto->getCargo_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':correo_persona', $PersonaDto->getCorreo_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_ingreso', $PersonaDto->getFecha_ingreso(), PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $PersonaDto->getUsuario(), PDO::PARAM_STR);
                $sentencia->bindParam(':contrasena', $PersonaDto->getContrasena(), PDO::PARAM_STR);
                $sentencia->bindParam(':rol', $PersonaDto->getRol(), PDO::PARAM_STR);
                $insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $insertado;
    }
    public function editar($conexion, $PersonaDto, $idpersona) {
        $editado = false;
        if (isset($conexion)) {
            try {
                $sql = "UPDATE persona  SET cedula_persona = :cedula_persona, nombre_persona = :nombre_persona, cargo_persona = :cargo_persona, correo_persona = :correo_persona, fecha_ingreso = :fecha_ingreso, usuario = :usuario,  rol = :rol WHERE idpersona = :idpersona";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_persona', $PersonaDto->getCedula_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_persona', $PersonaDto->getNombre_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':cargo_persona', $PersonaDto->getCargo_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':correo_persona', $PersonaDto->getCorreo_persona(), PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_ingreso', $PersonaDto->getFecha_ingreso(), PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $PersonaDto->getUsuario(), PDO::PARAM_STR);
                $sentencia->bindParam(':rol', $PersonaDto->getRol(), PDO::PARAM_STR);
                $sentencia->bindParam(':idpersona', $idpersona, PDO::PARAM_INT);
                $editado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $editado;
    }

    public function consultar($conexion, $cedula_persona ) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM persona WHERE cedula_persona = :cedula_persona ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cedula_persona', $cedula_persona, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $personaDto = new PersonaDto($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7],$resultado[8]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();                
            }
        }
        return $personaDto;
    }

    public function consultarPorID($conexion, $idper ) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM persona WHERE idpersona = :idpersona ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':idpersona', $idper, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $personaDto = new PersonaDto($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4],$resultado[5],$resultado[6],$resultado[7],$resultado[8]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $personaDto;
    }


    public function eliminar($conexion, $idpersona) {
        $eliminado = false;
        if (isset($conexion)) {
            try {
                $sql = "DELETE FROM persona WHERE idpersona = :idpersona ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':idpersona', $idpersona, PDO::PARAM_STR);
                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                    ?>
                    <script>                
                        alert('Esta Persona no puede ser Eliminada porque está involucrada en Incidentes');             
                        document.location.href = '../cuerpo/inicio.php';
                    </script>
                    <?php
            }
        }
        return $eliminado;
    }
    public function mostrarTodos($conexion) {
        if (isset($conexion)) {
            try {                
                $sql = "SELECT * FROM persona";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $resultado;
    }
}