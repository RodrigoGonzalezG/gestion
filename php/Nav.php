<?php

echo ' <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <span class="navbar-brand mr-1" id="color2">Control de turnos</span>

        <span class="navbar-brand ml-5" id="color2">Secretaría de Gobierno de la Ciudad de México</span>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <div class="input-group-append">

                </div>
            </div>
        </form>
        <span class="navbar-brand ml-5" id="color2">Usuario: '.$_SESSION['Nombre_persona'].'</span>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../Views/Perfil.php">Perfil</a>
                    <a class="dropdown-item" href="../php/Cerrar_sesion.php" data-toggle="modal">Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </nav>';

?>