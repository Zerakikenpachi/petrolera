<?php
session_start();
include_once '../Configuracion/ConexionDB.php';
include_once '../Modelo/PersonaDao.php';
include_once '../Entidad/PersonaDto.php';
ConexionDB::conectar();

switch ($_GET['accion']) {

    case "insertar": 

        $PersonaDto = new PersonaDto('', $_GET['cedula_persona'], $_GET['nombre_persona'], $_GET['cargo_persona'], $_GET['correo_persona'], $_GET['fecha_ingreso'], $_GET['usuario'], $_GET['contrasena'], $_GET['rol'] );
        $consulta = PersonaDao :: consultar(ConexionDB::obtener_conexion(), $PersonaDto->getCedula_persona());
        if($consulta->getCedula_persona() == ''){
            $insertado = PersonaDao :: insertar(ConexionDB::obtener_conexion(), $PersonaDto);
                ?>
                <script>                
                    alert('Se ha Agregado Correctamente la persona');             
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
        }else{
            ?>
                <script>                
                    alert('Ya hay una persona con el mismo numero de documento');               
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
        }
        ConexionDB::desconectar();

    break;
    
    case "editar": 

        $PersonaDto = new PersonaDto($_GET['idpersona'], $_GET['cedula_persona'], $_GET['nombre_persona'], $_GET['cargo_persona'], $_GET['correo_persona'], $_GET['fecha_ingreso'], $_GET['usuario'], '' , $_GET['rol'] );
        $consulta = PersonaDao :: consultarPorID(ConexionDB::obtener_conexion(), $PersonaDto->getIdpersona());
        if($consulta->getIdpersona() != ''){
            $editado = PersonaDao :: editar(ConexionDB::obtener_conexion(), $PersonaDto, $_GET['idpersona']);
                ?>
                <script>                
                    alert('Se ha Editado Correctamente la persona');             
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
                
        }else{
                ?>
                <script>                
                    alert('No hay Persona');               
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
            var opcion = confirm("¿Desea eliminar la Persona?");
            if (opcion == false) {
                document.location.href = '../cuerpo/listpersonas.php';
            } 
        </script>
        <?php

        $eliminado = PersonaDao :: eliminar(ConexionDB::obtener_conexion(), $_GET['idpersona']);
        if ($eliminado) {
            ?>
            <script>
                alert('Se ha Eliminado Correctamente la Persona');
                document.location.href = '../cuerpo/inicio.php';
            </script>
            <?php
            ConexionDB::desconectar();
            exit();
        }
        ConexionDB::desconectar();

    break;

    case "consultar": 

        $_SESSION['PersonaConsultada'] = PersonaDao :: consultar(ConexionDB::obtener_conexion(), $_GET['cedula_persona']);
        if($_SESSION['PersonaConsultada']->getCedula_persona() != ''){   
            
            
                if($_GET['subaccion'] == 'editar'){
                    ?>
                    <script>                             
                        document.location.href = '../cuerpo/editPersonas.php';
                    </script>
                    <?php
                }else if($_GET['subaccion']== 'visualizar'){
                    ?>
                    <script>                
                        alert('Se ha Consultado Correctamente la persona');             
                        document.location.href = '../cuerpo/inicio.php';
                    </script>
                    <?php
                }

               
                ConexionDB::desconectar();
                exit();
        }else{
            ?>
                <script>                
                    alert('La Perona no Existe en la Base de datos');               
                    document.location.href = '../cuerpo/inicio.php';
                </script>
                <?php
                ConexionDB::desconectar();
                exit();
        }
        ConexionDB::desconectar();

    break;

    case "mostrarTodos": 

        $_SESSION['arrayPersonas'] = PersonaDao  :: mostrarTodos(ConexionDB::obtener_conexion());
        ?>
        <script>
            document.location.href = '../cuerpo/listpersonas.php';// se redir a la list
        </script>
        <?php
        ConexionDB::desconectar();
        exit();

    break;

    case "cerrar_sesion":
        session_unset();//libera todas las variables de session
        session_destroy(); //destruye toda la informacion registrada de una session
        header("location:../index.php");//redirecciona a tal pagina
        exit();
    break;
}
