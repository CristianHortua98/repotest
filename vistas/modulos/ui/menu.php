<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio">
        <div class="sidebar-brand-icon">
            <img src="vistas/img/iconoakee2.png" class="img-thumbnail">
        </div>
        <div class="sidebar-brand-text mx-4">HelpDesk</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="inicio">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <?php if($_SESSION["perfil"] == "ADMINISTRADOR"): ?>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Administracion
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuario" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-solid fa-gear"></i>
                <span>Administracion</span>
            </a>
            <div id="collapseUsuario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="usuarios">Panel Usuarios</a>
                    <a class="collapse-item" href="responsable-proyecto">Asignar Responsables</a>
                </div>
            </div>
        </li>

    <?php endif ?>


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Ticket
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTicket" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-solid fa-ticket"></i>
            <span>Tickets</span>
        </a>
        <div id="collapseTicket" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="crear-ticket">Crear Ticket</a>
                <a class="collapse-item" href="mis-tickets">Mis Tickets</a>
            </div>
        </div>
    </li>


    <?php if($_SESSION["perfil"] == "ADMINISTRADOR" || $_SESSION["perfil"] == "SOPORTE"): ?>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Soporte
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSoporte" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-solid fa-calendar-check"></i>
                <span>Gestionar Ticket</span>
            </a>
            <div id="collapseSoporte" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="bolsa-tickets">Bolsa Tickets</a>
                    <a class="collapse-item" href="tickets-pendiente-gestion">Ticket Pendiente</a>
                </div>
            </div>
        </li>

    <?php endif ?>

    <?php if($_SESSION["perfil"] == "ADMINISTRADOR"): ?>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Reportes
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReporte" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-solid fa-clipboard-list"></i>
                <span>Reportes</span>
            </a>
            <div id="collapseReporte" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="reportes">Reportes</a>
                </div>
            </div>
        </li>

    <?php endif ?>

</ul>