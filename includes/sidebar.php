<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header("location: ../php/login.php");
    exit();
}

function permissions($permissions,$permisoschck){
    foreach($permissions as $permiso){
        foreach($permisoschck as $permisochck){
            if($permiso == $permisochck){
                return true;
            }
        }
    }
    return false;
}

function roles($role,$roleschck){
    foreach($roleschck as $accessrole){
        if($role == $accessrole){
            return true;
        }
    }
    return false;
}
?>
<ul style="height: 100%; vertical-align:middle;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" ">

    <!-- Sidebar - Brand -->
    <a class=" sidebar-brand d-flex align-items-center justify-content-center" href="./index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-box-open"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Cartones Corrugados</div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="./index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Catálogos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->

    <!-- if ((($_SESSION["rol"] == "ADM") || ($_SESSION["rol"] == "AGE")) || (permissions($_SESSION["permisos"],"po_capturar")) ) { -->
    <?php
    if ( (roles($_SESSION["rol"], array("ADM","AGE","CXC","PNL","ING","CST","VTA"))) || (permissions($_SESSION["permisos"],array("po_capturar"))) ) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseA' aria-expanded='true' aria-controls='collapseA'>
                <i class='fas fa-check-double'></i>
                <span>Autorizaciones</span>
            </a>
            <div id='collapseA' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Autorizaciones:</h6>
        ";
        if ( (roles($_SESSION["rol"], array("ADM","CXC","PNL","ING","CST","VTA"))) || (array("po_capturar")) ) {
            echo "<a class='collapse-item' href='A_ordenes_base.php'>Listado ordenes base</a>";
        }
        echo "  </div>
            </div>
        </li>";
    }

    if ( (roles($_SESSION["rol"], array("ADM","AGE","ING","PLN","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
        echo "
        <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseO' aria-expanded='true' aria-controls='collapseO'>
            <i class='fas fa-clipboard-list'></i>
            <span>Ordenes</span>
        </a>
        <div id='collapseO' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
            <div class='bg-white py-2 collapse-inner rounded'>
                <h6 class='collapse-header'>Ordenes:</h6>
        
        ";
        if ( (roles($_SESSION["rol"], array("ADM","AGE","PLN","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
            echo "<a class='collapse-item' href='O_venta_proceso.php'>Ordenes en proceso</a>";

        }
        if ( (roles($_SESSION["rol"], array("ADM","AGE","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
            echo "<a class='collapse-item' href='O_venta_procesada.php'>Ordenes procesadas</a>";
        
        }
        if ( (roles($_SESSION["rol"], array("ADM","AGE"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
            echo "<a class='collapse-item' href='O_capturar.php'>Capturar Orden</a>";
        }
        if ( (roles($_SESSION["rol"], array("ADM","ADC","AGE","ING","CST","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
            echo "<a class='collapse-item' href='BO_venta.php'>Buscar Orden</a>";
        }
        echo "
            </div>
            </div>
        </li>
        ";
    }

    if ( (roles($_SESSION["rol"], array("ADM","ADC"))) || (permissions($_SESSION["permisos"],array("h"))) ) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#admin' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-users-cog'></i>
                <span>Administracion</span>
            </a>
            <div id='admin' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Altas y bajas:</h6>
                    <a class='collapse-item' href='ADM_permisos.php'>Permisos</a>
                    <a class='collapse-item' href='ADM_roles.php'>Roles de Usuarios</a>
                </div>
            </div>
        </li>
        ";
    }
    ?>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseB" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-search"></i>
            <span>Busquedas</span>
        </a>
        <div id="collapseB" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Busquedas:</h6>
                <a class="collapse-item" href="BC_articuloCliente.php">Busqueda Artículo <br> Cliente</a>
                <a class="collapse-item" href="BO_venta.php">Buscar Orden</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-book"></i>
            <span>Catálogos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Altas y bajas:</h6>
                <a class="collapse-item" href="C_compania.php">Compañia</a>
                <a class="collapse-item" href="C_inventario.php">Inventario</a>
                <a class="collapse-item" href="C_almacen.php">Almacen</a>
                <a class="collapse-item" href="C_cliente.php">Cliente</a>
                <a class="collapse-item" href="C_agente.php">Agente</a>
                <a class="collapse-item" href="C_articuloExistente.php">Artículo Existente</a>
                <a class="collapse-item" href="C_articuloVendido.php">Artículo Vendido</a>
                <a class="collapse-item" href="C_dirEnt.php">Dir. Entrega</a>
                <a class="collapse-item" href="C_listaPrecios.php">Lista Precios</a>
                <a class="collapse-item" href="C_factura.php">Facturas</a>
                <a class="collapse-item" href="C_cantidadE.php">Cant. Entregada</a>
                <a class="collapse-item" href="C_bloqueoCliente.php">Bloqueo Cliente</a>
                <a class="collapse-item" href="O_capturarArchivo.php">Capturar desde Archivos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php
    if (roles($_SESSION["rol"], array("ADM"))){
        echo"

            <!-- Heading -->
        <div class='sidebar-heading'>
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
                <i class='fas fa-fw fa-folder'></i>
                <span>Pages</span>
            </a>
            <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Login Screens:</h6>
                    <a class='collapse-item' href='../php/login.php'>Login</a>
                    <a class='collapse-item' href='../php/register.php'>Register</a>
        ";
                    
                    if (isset($_SESSION["idUsuario"])) {
                        echo "<a class='collapse-item' href='../includes/logout.inc.php'>Desloggeate bro</a>";
                    } else {
                        echo "<a class='collapse-item' href='../php/Login.php' >Loggeate bro</a>";
                    }

        echo "
                    <a class='collapse-item' href='forgot-password.html'>Forgot Password</a>
                    <div class='collapse-divider'></div>
                    <h6 class='collapse-header'>Other Pages:</h6>
                    <a class='collapse-item' href='404.html'>404 Page</a>
                    <a class='collapse-item' href='blank.html'>Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class='nav-item'>
            <a class='nav-link' href='charts.html'>
                <i class='fas fa-fw fa-chart-area'></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class='nav-item'>
            <a class='nav-link' href='O_venta.php'>
                <i class='fas fa-fw fa-table'></i>
                <span>Tables</span></a>
        </li>


        ";
    }

    ?>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>