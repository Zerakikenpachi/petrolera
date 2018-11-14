<?php

include_once '../Modelo/Conn.php';
include_once '../Modelo/UsuarioDao.php';
include_once '../Entidad/UsuarioDto.php';
session_start();
Conn::conectar();

switch ($_GET['accion']) {

    case "insertar": 

    $UsuarioDto = new UsuarioDto('', $_GET['contraseña'], $_GET['rol']);
    $consulta = UsuarioDao :: consultar(Conn::obtener_conexion(), $UsuarioDto->getIdusuario());
    if($consulta->getIdusuario() == ''){
        $insertado = UsuarioDao :: insertar(Conn::obtener_conexion(), $UsuarioDto);
            ?>
            <script>                
                alert('Se ha Agregado Correctamente el usuario');             
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }else{
        ?>
            <script>                
                alert('Ya hay una usuario con el mismo id');               
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }
    Conn::desconectar();

break;

case "editar": 

$UsuarioDto = new UsuarioDto('', $_GET['contraseña'], $_GET['rol']);
$consulta = UsuarioDao :: consultar(Conn::obtener_conexion(), $UsuarioDto->getIdusuario());
    if($consulta->getIdusuario() == ''){
        $editado = UsuarioDao :: editar(Conn::obtener_conexion(), $UsuarioDto, $_GET['idusuario']);
            ?>
            <script>                
                alert('Se ha Editado Correctamente el usuario');             
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }else{
            ?>
            <script>                
                alert('Ya hay una usuario con el mismo registro');               
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }
    Conn::desconectar();

break;

case "eliminar": 

    $eliminado = UsuarioDao :: eliminar(Conn::obtener_conexion(), $_GET['getIdusuario']);
    if ($eliminado) {
        ?>
        <script>
            alert('Se ha Eliminado Correctamente el usuario');
            document.location.href = '../pagesBody/administradorIndex.php';
        </script>
        <?php
        Conn::desconectar();
        exit();
    }
    Conn::desconectar();

break;

case "consultar": 

    $_SESSION['UsuarioConsultado'] = UsuarioDao :: consultar(Conn::obtener_conexion(), $_GET['getIdusuario']);
    if($_SESSION['PersonaConsultada']->getIdusuario() != ''){            
            ?>
            <script>                
                alert('Se ha Consultado Correctamente el usuario');             
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }else{
        ?>
            <script>                
                alert('El usuario no Existe en la Base de datos');               
                document.location.href = '../pagesBody/administradorIndex.php';
            </script>
            <?php
            Conn::desconectar();
            exit();
    }
    Conn::desconectar();

break;

case "mostrarTodos": 

    $_SESSION['arrayUsuarios'] = UsuarioDao  :: mostrarTodos(Conn::obtener_conexion());
    ?>
    <script>
        document.location.href = '../pagesBody/listUsuarios.php';// se redir a la list
    </script>
    <?php
    Conn::desconectar();
    exit();

break;
}
