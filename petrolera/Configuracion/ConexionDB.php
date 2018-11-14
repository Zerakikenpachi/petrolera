<?php

class ConexionDB {

    private static $conexion;

    public static function conectar() {
        if (!isset(self::$conexion)) {
            try {

                include_once 'ConfigDB.php';
                self::$conexion = new PDO("mysql:host=$nombre_servidor; dbname=$nombre_bd", $nombre_usuario, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
                
            }catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function desconectar() {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function obtener_conexion() {
        return self::$conexion;
    }

}