<?php

include_once 'UsuarioDto.php';

class UsuarioDao {
    
    public function insertar($conexion, $UsuarioDto) {
        $insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuario (contraseña, rol ) VALUES (:contraseña, :rol )";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':contraseña', $UsuarioDto->getContraseña(), PDO::PARAM_STR);
                $sentencia->bindParam(':rol', $UsuarioDto->getRol(), PDO::PARAM_STR);
                $insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $insertado;
    }
    
    
    public function editar($conexion, $UsuarioDto) {
        $editado = false;
        if (isset($conexion)) {
            try {
                $sql = "UPDATE usuario  SET contraseña = :contraseña, rol = :rol";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':idusuario', $UsuarioDto->getIdusuario(), PDO::PARAM_INT);
                $sentencia->bindParam(':contraseña', $UsuarioDto->getContraseña(), PDO::PARAM_STR);
                $sentencia->bindParam(':rol', $UsuarioDto->getRol(), PDO::PARAM_STR);
                $editado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }        
        return $editado;
    }
 
    public function consultar($conexion, $id) {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario WHERE idusuario = :id ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $usuarioDto = new UsuarioDto($resultado[0], $resultado[1], $resultado[2]);
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $usuarioDto;
    }
    
    public function eliminar($conexion, $id) {
        $eliminado = false;
        if (isset($conexion)) {
            try {
                $sql = "DELETE FROM usuario WHERE idusuario = :id ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
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
                $sql = "SELECT * FROM usuario";
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