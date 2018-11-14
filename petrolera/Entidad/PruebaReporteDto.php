<?php

Class PruebaReporteDto{
    
    Private $idprueba_reporte;
    Private $id_reporte_incidente;
    Private $tipo;
    Private $contenido;
    Private $nombre;
    
    function __construct($idprueba_reporte, $id_reporte_incidente, $tipo, $contenido, $nombre) {
        $this->idprueba_reporte = $idprueba_reporte;
        $this->id_reporte_incidente = $id_reporte_incidente;
        $this->tipo = $tipo;
        $this->contenido = $contenido;
        $this->nombre = $nombre;
    }
    function getIdprueba_reporte() {
        return $this->idprueba_reporte;
    }

    function getId_reporte_incidente() {
        return $this->id_reporte_incidente;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdprueba_reporte($idprueba_reporte) {
        $this->idprueba_reporte = $idprueba_reporte;
    }

    function setId_reporte_incidente($id_reporte_incidente) {
        $this->id_reporte_incidente = $id_reporte_incidente;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}