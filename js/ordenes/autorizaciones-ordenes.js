function orden_detalle(idOrden){
    
    var url = "../php/A_ordenes_detalle.php?idOrden="+idOrden;
    location.href= url;
}

function autorizacion_cxc(idOrden,idCliente){

    var url = "../includes/functions_autorizaciones.php?A_CXC=1&idOrden="+idOrden+"&idCliente="+idCliente;
    location.href= url;

}

function autorizacion_cst(idOrden,idCliente){

    var url = "../includes/functions_autorizaciones.php?A_CST=1&idOrden="+idOrden+"&idCliente="+idCliente;
    location.href= url;

}

function autorizacion_ing(idOrden,idCliente){

    var url = "../includes/functions_autorizaciones.php?A_ING=1&idOrden="+idOrden+"&idCliente="+idCliente;
    location.href= url;

}

function autorizacion_vta(idOrden,idCliente){

    var url = "../includes/functions_autorizaciones.php?A_VTA=1&idOrden="+idOrden+"&idCliente="+idCliente;
    location.href= url;

}