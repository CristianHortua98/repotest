<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Alertas -->
        <?php 
        
            $alertas = ControladorTicket::ctrObtenerNotificacionTicketsSoporte($_SESSION["id_usuario"]);

            $cantidadAlertas = count($alertas);
        
        ?>
        <?php if($_SESSION["perfil"] == "SOPORTE" || $_SESSION["perfil"] == "ADMINISTRADOR"): ?>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php if($cantidadAlertas > 0): ?>

                    <span class="badge badge-danger badge-counter"><?php echo $cantidadAlertas; ?></span>

                <?php endif ?>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-menu pre-scrollable dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header text-primary">
                    Notificaciones Tickets
                </h6>

                <?php foreach($alertas as $key => $valueAlerta): ?>

                    <a class="dropdown-item d-flex align-items-center linkRedireccionTicket" idTicket="<?php echo $valueAlerta["id_ticket"]; ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fa fa-solid fa-ticket text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?php echo $valueAlerta["fecha_crea"]; ?></div>
                            <b class="text-primary">Nuevo Ticket</b> <br>
                            Asunto Ticket: <?php echo substr($valueAlerta["asunto_ticket"], 0, 20); ?>
                        </div>
                    </a>

                <?php endforeach ?>
        
            </div>
        </li>

        <?php endif ?>


        <?php 
        
            $alertasUsuario = ControladorTicket::ctrObtenerNotificacionTicketsUsuario($_SESSION["id_usuario"]);

            $cantidadAlertasUsuario = count($alertasUsuario);
        
        ?>
        <?php if($_SESSION["perfil"] == "SOPORTE" || $_SESSION["perfil"] == "ADMINISTRADOR" || $_SESSION["perfil"] == "USUARIO"): ?>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php if($cantidadAlertasUsuario > 0): ?>
                
                    <span class="badge badge-danger badge-counter"><?php echo $cantidadAlertasUsuario; ?></span>

                <?php endif ?>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-menu pre-scrollable dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header text-primary">
                    Notificaciones Tickets Terminados
                </h6>

                <?php foreach($alertasUsuario as $key => $valueAlerta): ?>

                    <a class="dropdown-item d-flex align-items-center linkRedireccionTicket" idTicket="<?php echo $valueAlerta["id_ticket"]; ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fa fa-solid fa-ticket text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?php echo $valueAlerta["fecha_crea"]; ?></div>
                            <b class="text-primary">Ticket Terminado</b> <br>
                            Asunto Ticket: <?php echo substr($valueAlerta["asunto_ticket"], 0, 20); ?>
                        </div>
                    </a>

                <?php endforeach ?>

            </div>
        </li>

        <?php endif ?>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nombre"]; ?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#modalEditarUsuarioPropio" idUsuario="<?php echo $_SESSION["id_usuario"]; ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Usuario
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="salir">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                </a>
            </div>
        </li>
    </ul>
</nav>

<!--=====================================
MODAL EDITAR USUARIOS
======================================-->
<div class="modal fade" id="modalEditarUsuarioPropio" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuarioPropio" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="modalEditarUsuarioPropio">Editar Mi Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-primary">Nombre Completo:</label>
                        <input type="text" class="form-control" name="editarNombreUsuarioMi" id="editarNombreUsuarioMi" value="<?php echo $_SESSION["nombre"]; ?>" required>
                        <input type="hidden" class="form-control" name="editarIdUsuarioMi" id="editarIdUsuarioMi" required value="<?php echo $_SESSION["id_usuario"]; ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-primary">Número Documento:</label>
                        <input type="number" class="form-control" name="editarNumeroDocumentoMi" id="editarNumeroDocumentoMi" required value="<?php echo $_SESSION["documento"]; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="text-primary">Correo Electronico:</label>
                        <input type="email" class="form-control" name="editarCorreoUsuarioMi" id="editarCorreoUsuarioMi" value="<?php echo $_SESSION["mail"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="text-primary">Telefono:</label>
                        <input type="text" class="form-control" name="editarTelefonoUsuarioMi" id="editarTelefonoUsuarioMi" required value="<?php echo $_SESSION["telefono"]; ?>">
                    </div>
                    <div class="form-group">
                        <label class="text-primary">Usuario Ingreso:</label>
                        <input type="text" class="form-control" name="editarUsuarioMi" id="editarUsuarioMi" readonly required value="<?php echo $_SESSION["usuario"]; ?>">
                    </div>
                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            <small>Si no desea cambiar su contraseña deje este campo vacio, de lo contrario digite la nueva contraseña.</small>
                        </div>
                        <label class="text-primary">Contraseña Ingreso:</label>
                        <input type="password" class="form-control" name="editarContrasenaUsuarioMi" id="editarContrasenaUsuarioMi" placeholder="Escriba la nueva contraseña..." >
                        <input type="hidden" class="form-control" name="passwordAntiguaMi" id="passwordAntiguaMi" value="<?php echo $_SESSION["contrasena"]; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="editarMiUsuarioMi">Guardar Mi Información</button>

                    <?php 

                        if(isset($_POST["editarMiUsuarioMi"])){

                            $guardarUsu = new ControladorUsuarios();
                            $guardarUsu->ctrEditarMiUsuario();

                        }
                    
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>