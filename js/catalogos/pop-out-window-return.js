function returnDataIntoPOW(idOrden,idArticulo,cantidad,precio,fSolicitud,fEntrega){
    document.getElementById("PO_ORD").value = idOrden;
    document.getElementById("PO_ART").value = idArticulo;
    document.getElementById("PO_CANT").value = cantidad;
    document.getElementById("PO_PRECIO").value = precio;
    document.getElementById("PO_FCOMPRA").value = fSolicitud;
    document.getElementById("PO_FCLIENTE").value = fEntrega;
}

function Autorizar_VTA(){
    orden = document.getElementById("PO_ORD").value;
    articulo = document.getElementById("PO_ART").value;
    cantidad = document.getElementById("PO_CANT").value;
    precio = document.getElementById("PO_PRECIO").value;
    fsolicitud = document.getElementById("PO_FCOMPRA").value;
    fentrega = document.getElementById("PO_FCLIENTE").value

    location.href="reporte04_alumnos_una_carrera.php?car="+car;
    location.href="../includes/functions_autorizaciones.php?car="+car;


}