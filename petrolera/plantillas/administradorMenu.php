
<body>
    <!-- Navigation -->
    <div class="fixed-top">
        <nav class="navbar-light navbar-toggleable-md bg-faded">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarContainer"
                    aria-controls="navbarsContainer-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="index.html" title="Concesionario">
                    <img src="../images/logo.png" class="navbar-brand store-image" alt="Bootstrap" />
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarContainer">
 

                    <ul id="navbarContainerMobile" class="navbar-nav hidden-lg-up">
                        <li class="nav-item  ">
                            <a href="index.html" title="Inicio" class="level-1 trsn nav-link">Inicio</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="vistaClientes.html" title="Clientes" class="level-1 trsn nav-link">Clientes</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="vistaVehiculos.html" title="Vehiculos" class="level-1 trsn nav-link">Vehiculos</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="vistaVentas.html" title="Ventas" class="level-1 trsn nav-link">Ventas</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right nav-top">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle trsn nav-link" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false" class="nav-link">
                                <span><i class="fa fa-globe fa-fw"></i></span>
                                <span>Español (Colombia)</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="trsn nav-link" title="Español (Colombia)">Español (Colombia)</a></li>
                            </ul>
                        </li>

                

                        <li>
                            <a href="../cuerpo/viewPersonas.php" id="login-link" class="trsn nav-link" title="registro">
                                <i class="fa fa-user fa-fw"></i>
                                <span class="customer-name">
                                    <?php echo $_SESSION['personaLogin']->getNombre_persona()?>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="../Controlador/PersonaController.php?accion=cerrar_sesion" id="login-link" class="trsn nav-link" title="login">
                                <i class="fa  fa-unlock fa-fw"></i>
                                <span class="customer-name">
                                    Salir
                                </span>
                            </a>
                        </li>
                        
                    </ul>

                    <ul class="social list-inline hidden-lg-up">
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar-inverse bg-inverse navbar-toggleable-md">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarsContainer-2">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item  ">
                            <a href="../cuerpo/inicio.php" title="Inicio" class="level-1 trsn nav-link"><i class="fa fa fa-home"></i>Inicio</a>
                        </li>
                        <li class="nav-item  ">
                         <a href="../cuerpo/addReporteIncidentes.php" title="Nuevo Reporte" class="level-1 trsn nav-link"><i class="fa  fa-newspaper-o"></i>Nuevo Reporte</a>
                        </li>

                        <li class="nav-item  ">
                            <a href="../cuerpo/addPersonas.php" title="Nueva Persona" class="level-1 trsn nav-link"><i class="fa fa-address-card"></i>Nueva Persona</a>
                        </li>

                        <li class="nav-item  ">
                            <a href="../Controlador/ReporteIncidenteController.php?accion=mostrarTodos" title="Lista de Reportes" class="level-1 trsn nav-link"><i class="fa fa-pencil-square-o"></i>Lista de Reportes</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="../Controlador/PersonaController.php?accion=mostrarTodos" title="Lista de Personas" class="level-1 trsn nav-link"><i class="fa fa-users"></i>Lista de Personas</a>
                        </li>

                        <li class="nav-item  ">
                            <a href="../Controlador/ReporteIncidenteController.php?accion=mostrarMisReportes" title="Lista de Reportes" class="level-1 trsn nav-link"><i class="fa fa-pencil-square-o"></i>Mis Reportes</a>
                        </li>


                        <li class="nav-item  ">
                            <a href="../Chat/src/public/index.php" title="Lista de Reportes" class="level-1 trsn nav-link"><i class="fa fa-comments"></i>Mi Chat</a>
                        </li>
                    </ul>
                    <ul class="social navbar-toggler-right list-inline">
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end navigation -->