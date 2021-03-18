<?php
if($_SESSION['Tipo'] == "Administrador"){
  echo '<ul class="sidebar navbar-nav toggled">
            <li class="nav-item active">
                <a class="nav-link" href="Panel_principal.php" id="color2">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Vista principal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Areas.php" id="color2">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Catalogo de Areas</span></a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="Usuarios.php" id="color2">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Catalogo de usuarios</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="Reportes.php" id="color2">
                    <i class="far fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
            </li>
        </ul>';
}
else{
 echo '<ul class="sidebar navbar-nav toggled">
            <li class="nav-item active">
                <a class="nav-link" href="Panel_principal.php" id="color2">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Vista principal</span>
                </a>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="Reportes.php" id="color2">
                    <i class="far fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
            </li>
        </ul>';}
?>