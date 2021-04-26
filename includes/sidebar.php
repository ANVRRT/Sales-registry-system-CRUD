<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header("location: ../php/login.php");
    exit();
}

function permissions($permissions, $permisoschck)
{
    foreach ($permissions as $permiso) {
        foreach ($permisoschck as $permisochck) {
            if ($permiso == $permisochck) {
                return true;
            }
        }
    }
    return false;
}

function roles($role, $roleschck)
{
    foreach ($roleschck as $accessrole) {
        if ($role == $accessrole) {
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
    <?php
    
    // echo "<div class='sidebar-brand-text mx-3'>".$_SESSION["idCompania"]."</div>";
    echo "<div class='sidebar-brand-text mx-3'>Papeles Corrugados</div>";
    ?>

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
        Sistema LaModerna
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

    if ((roles($_SESSION["rol"], array("ADM", "CXC","PLN", "ING", "CST", "VTA","DIR"))) || (permissions($_SESSION["permisos"], array("po_autorizarOrdenCXC","po_autorizarOrdenVTA","po_autorizarOrdenCST","po_autorizarOrdenING","po_autorizarOrdenPLN","po_autorizarOrdenADM")))) {
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
        echo "<a class='collapse-item' href='A_ordenes_base.php'>Listado ordenes base</a>";
        echo "  </div>
            </div>
        </li>";
    }

    if ((roles($_SESSION["rol"], array("ADM", "AGE", "CXC", "PLN", "VTA", "EMB", "DIR"))) || (permissions($_SESSION["permisos"], array("po_capturar","po_modificar","po_estatus","po_procesadas","po_proceso")))) {
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
        if ((roles($_SESSION["rol"], array("ADM", "AGE"))) || (permissions($_SESSION["permisos"], array("po_capturar")))) {
            echo "<a class='collapse-item' href='O_capturar.php'>Capturar Orden</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "AGE"))) || (permissions($_SESSION["permisos"], array("po_modificar")))) {
            echo "<a class='collapse-item' href='O_actualizar.php'>Modificar Orden</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM","AGE","CXC","PLN","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("po_estatus")))) {
            echo "<a class='collapse-item' href='O_estatus.php'>Estatus de ordenes</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "AGE", "PLN", "VTA", "EMB", "DIR"))) || (permissions($_SESSION["permisos"], array("po_proceso")))) {
            echo "<a class='collapse-item' href='O_venta_proceso.php'>Ordenes en proceso</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "AGE", "VTA", "EMB", "DIR"))) || (permissions($_SESSION["permisos"], array("po_procesadas")))) {
            echo "<a class='collapse-item' href='O_venta_procesada.php'>Ordenes procesadas</a>";
        }

        echo "
            </div>
            </div>
        </li>
        ";
    }

    if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_permisos","padm_roles","padm_usuarios","padm_registro")))) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#admin' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-users-cog'></i>
                <span>Administracion </span>
            </a>
            <div id='admin' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Altas y bajas:</h6>
                ";
        if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_permisos")))) {
            echo "<a class='collapse-item' href='ADM_permisos.php'>Permisos</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_roles")))) {
            echo "<a class='collapse-item' href='ADM_roles.php'>Roles</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_usuarios")))) {
            echo "<a class='collapse-item' href='ADM_usuarios.php'>Usuarios y <br> Roles de Usuarios</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_registro")))) {
            echo "<a class='collapse-item' href='register.php'>Creación de Usuarios</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "ADC"))) || (permissions($_SESSION["permisos"], array("padm_parametros")))) {
            echo "<a class='collapse-item' href='ADM_parametros.php'>Parametros</a>";
        }
        
        echo "
                </div>
            </div>
        </li>
        ";
    }
    if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("psadm")))) {

        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseSA' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-user-tie'></i>
                <span>Super Admin</span>
            </a>
            <div id='collapseSA' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Super Usuario:</h6>
                    <a class='collapse-item' href='ADM_sadmin.php'>Control de Administrador</a>
                </div>
            </div>
        </li>
        ";
    }

    if ((roles($_SESSION["rol"], array("ADM","ADC","AGE","CST","ING","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("pb_artCliente","pb_ordenVenta")))) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseB' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-search'></i>
                <span>Busquedas</span>
            </a>
            <div id='collapseB' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Busquedas:</h6>
            ";
        if ((roles($_SESSION["rol"], array("ADM","ING"))) || (permissions($_SESSION["permisos"], array("pb_artCliente")))) {
            echo "<a class='collapse-item' href='BC_articuloCliente.php'>Busqueda Artículo <br> Cliente</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM", "ADC","AGE","CST","ING","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("pb_ordenVenta")))) {
            echo "<a class='collapse-item' href='BO_venta.php'>Busqueda Orden</a>";
        }
        echo "
                </div>
            </div>
        </li>
        ";

    }
    if ((roles($_SESSION["rol"], array("ADM","CXC","REA"))) || (permissions($_SESSION["permisos"], array("pc_compania","pc_inventario","pc_almacen","pc_clientes","pc_agente","pc_artExistente","pc_artVendido","pc_dirEnt","pc_listaPrecios","pc_factura","pc_cantEntregada","pc_bloq_Cliente","ps_archivos")))) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-book'></i>
                <span>Catálogos</span>
            </a>
            <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Altas y bajas:</h6>
            ";
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_compania")))) {
            echo "<a class='collapse-item' href='C_compania.php'>Compañia</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_inventario")))) {
            echo "<a class='collapse-item' href='C_inventario.php'>Inventario</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_almacen")))) {
            echo "<a class='collapse-item' href='C_almacen.php'>Almacen</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_clientes")))) {
            echo "<a class='collapse-item' href='C_cliente.php'>Cliente</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_agente")))) {
            echo "<a class='collapse-item' href='C_agente.php'>Agente</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_artExistente")))) {
            echo "<a class='collapse-item' href='C_articuloExistente.php'>Artículo Existente</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM","REA"))) || (permissions($_SESSION["permisos"], array("pc_artVendido")))) {
            echo "<a class='collapse-item' href='C_articuloVendido.php'>Artículo Vendido</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_dirEnt")))) {
            echo "<a class='collapse-item' href='C_dirEnt.php'>Dir. Entrega</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_listaPrecios")))) {
            echo "<a class='collapse-item' href='C_listaPrecios.php'>Lista Precios</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_factura")))) {
            echo "<a class='collapse-item' href='C_factura.php'>Facturas</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("pc_cantEntregada")))) {
            echo "<a class='collapse-item' href='C_cantidadE.php'>Cant. Entregada</a>";
        } 
        if ((roles($_SESSION["rol"], array("ADM","CXC"))) || (permissions($_SESSION["permisos"], array("pc_bloqCliente")))) {
            echo "<a class='collapse-item' href='C_bloqueoCliente.php'>Bloqueo Cliente</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM"))) || (permissions($_SESSION["permisos"], array("ps_archivos")))) {
            echo "<a class='collapse-item' href='O_capturarArchivo.php'>Capturar desde Archivo</a>";
        }

            
        echo "
                </div>
            </div>
        </li>
        ";
    }
    
    if ((roles($_SESSION["rol"], array("ADM","AGE","PLN","CST","VTA","DIR","EMB"))) || (permissions($_SESSION["permisos"], array("pr_tiempoDepto","pr_ordenes","p_reportes")))) {
        echo "
        <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseR' aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-file-pdf'></i>
                <span>Reportes</span>
            </a>
            <div id='collapseR' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                <div class='bg-white py-2 collapse-inner rounded'>
                    <h6 class='collapse-header'>Reportes:</h6>
            ";
        if ((roles($_SESSION["rol"], array("ADM","PLN","DIR"))) || (permissions($_SESSION["permisos"], array("pr_tiempoDepto")))) {
            echo "<a class='collapse-item' href='R_tiempo_Departamento.php'>Reporte por tiempo <br> departamento</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM","AGE","CST","VTA","EMB","DIR"))) || (permissions($_SESSION["permisos"], array("pr_ordenes")))) {
            echo "<a class='collapse-item' href='R_ordenes.php'>Reporte de todas <br> las ordenes</a>";
        }
        if ((roles($_SESSION["rol"], array("ADM","DIR"))) || (permissions($_SESSION["permisos"], array("pr_reportes")))) {
            echo "<a class='collapse-item' href='R_vistaReportes.php'>Reportes generales<br> y gráficos</a>";
        }
        echo "
                </div>
            </div>
        </li>
        ";
    }
    

    ?>





    <!-- Nav Item - Utilities Collapse Menu -->
    

    <!-- Divider -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>