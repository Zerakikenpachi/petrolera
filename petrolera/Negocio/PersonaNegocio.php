<?php

if (isset($_POST['btnregistrar']) || isset($_POST['btneditar'])  ) {
    $idpersona = trim($_POST['idpersona']);
    $cedula_persona = trim($_POST['cedula_persona']);
    $nombre_persona = trim($_POST['nombre_persona']);
    $cargo_persona = trim($_POST['cargo_persona']);
    $correo_persona= trim($_POST['correo_persona']);
    $fecha_ingreso = trim($_POST['fecha_ingreso']);
    $usuario = trim($_POST['usuario']);
    $rol = trim($_POST['rol']);

    if (empty($cedula_persona)) {//cedula_persona
        $error = "Ingrese un Nro. de Documento";
    } else if (strlen($cedula_persona) > 10) {
        $error = "Ingrese máximo 10 caracteres en el Nro. de Documento";
    } else if (!is_numeric($cedula_persona)) {
        $error = "Ingrese un valor númerico en el campo Nro. de Documento";
    } else if (empty($nombre_persona)) {  //nombre_persona
        $error = "Ingrese un Nombre";
    } else if (strlen($nombre_persona) > 90) {
        $error = "Ingrese máximo 90 caracteres en el Nombre de la Persona";
    } else if (empty($cargo_persona)) {//cargo_persona
        $error = "Ingrese un Cargo";
    } else if (strlen($cargo_persona) > 30) {
        $error = "Ingrese máximo de 130 caracteres en el Cargo de la Persona";
    } else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $correo_persona)) {//correo_persona
        $error = "Ingrese un Correo Válido";
    } else if (empty($fecha_ingreso)) {//fecha_ingreso
        $error = "Seleccione una Fecha";
    } else if (empty($usuario)) {//usuario
        $error = "Ingrese un Usuario";
    } else if (strlen($usuario) > 45) {
        $error = "Ingrese máximo 45 caracteres en el Usuario";
    }else if ($rol!= 'Administrador de Reportes' && $rol  != 'Proveedor'&& $rol  != 'Empleado' ) { //tipo_usuario
        $error = "Seleccione un Tipo de Usuario correcto";
    }else{

        if (isset($_POST['btnregistrar'])){

            $contrasena = trim($_POST['contrasena']);
            $confirmar_contrasena = trim($_POST['confirmar_contrasena']);

            if($contrasena != $confirmar_contrasena){
                $error = "Las contraseñas no coinciden";
            }else if(empty($confirmar_contrasena)){
                $error = "Ingrese una Contraseña";
            }else if(strlen($confirmar_contrasena) > 45){
                $error = "Ingrese máximo 45 caracteres en la Contraseña";
            }else{
                ?>
                    <script>
                        //se redirecciona a dicha pagina
                        document.location.href = '../Controlador/PersonaController.php?accion=insertar&cedula_persona=<?php echo ($cedula_persona)?>&nombre_persona=<?php echo ($nombre_persona)?>&cargo_persona=<?php echo ($cargo_persona)?>&correo_persona=<?php echo ($correo_persona)?>&fecha_ingreso=<?php echo ($fecha_ingreso)?>&usuario=<?php echo ($usuario)?>&contrasena=<?php echo ($contrasena)?>&rol=<?php echo ($rol)?>';
                    </script>
                <?php
            }

        }else if(isset($_POST['btneditar'])) {

                    ?>
                    <script>
                        //se redirecciona a dicha pagina
                        document.location.href = '../Controlador/PersonaController.php?accion=editar&idpersona=<?php echo ($idpersona)?> &cedula_persona=<?php echo ($cedula_persona)?>&nombre_persona=<?php echo ($nombre_persona)?>&cargo_persona=<?php echo ($cargo_persona)?>&correo_persona=<?php echo ($correo_persona)?>&fecha_ingreso=<?php echo ($fecha_ingreso)?>&usuario=<?php echo ($usuario)?>&rol=<?php echo ($rol)?>';
                    </script>
                    <?php

        }
            


    }
}


if (isset($_POST['btnlogin'])) {

    session_start();
    include_once 'Entidad/PersonaDto.php';
    include_once 'Configuracion/ConexionDB.php';
    ConexionDB::conectar();

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    if (empty($usuario)) {//usuario
        $error = "Ingrese un Usuario";
    } else if (strlen($usuario) > 45) {
        $error = "Ingrese máximo 45 caracteres en el Usuario";
    }else if(empty($contrasena)){//constraseña
        $error = "Ingrese una Contraseña";
    }else if(strlen($contrasena) > 45){
        $error = "Ingrese máximo 45 caracteres en la Contraseña";
    }else{

        //se consulta si el usuario con contraseña tal son correctos
                try {
                    $sql = "SELECT * FROM Persona WHERE usuario = :usuario and contrasena = :contrasena ";
                    $conexion = ConexionDB::obtener_conexion();
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                    $sentencia->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                    $sentencia->execute();
                    $resultado = $sentencia->fetch();//el resultado es un array donde [0] es la colum 0
                    $personaConsul = new PersonaDto(//se crea el obj ConsumoDto con el resultado obtenido
                            $resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6], $resultado[7], $resultado[8]
                    );
                } catch (PDOException $ex) {
                    print 'ERROR ' . $ex->getMessage();
                }

        if($personaConsul->getIdpersona() != ''){
            //creamos la variable de SESSION de el usuario que ingresó
            $_SESSION['personaLogin'] = $personaConsul;              
                ?>
                <script>
                    //se redirecciona a dicha pagina
                    document.location.href = 'cuerpo/inicio.php';
                </script>
                <?php
    
        }else{
            $error = "Usuario o Contraseña incorrectos";
        }
        ConexionDB::desconectar();
    }
}    