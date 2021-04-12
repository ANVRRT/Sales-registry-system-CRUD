function returnDataIntoPOW(folioRO,idOrden,folio,idArticulo,cantidad,precio,fSolicitud,fEntrega){
    // alert(fSolicitud);
    alert(folioRO);
    document.getElementById("PO_ORD").value = idOrden;
    document.getElementById("PO_FOLRO").value = folioRO;
    document.getElementById("PO_FOL").value = folio;
    document.getElementById("PO_ART").value = idArticulo;
    document.getElementById("PO_CANT").value = cantidad;
    document.getElementById("PO_PRECIO").value = precio;
    document.getElementById("PO_FCOMPRA").value = fSolicitud;
    document.getElementById("PO_FCLIENTE").value = fEntrega;
}

function Autorizar_VTA(){
    orden = document.getElementById("PO_ORD").value;
    folioRO = document.getElementById("PO_FOLRO").value;
    folio = document.getElementById("PO_FOL").value;
    articulo = document.getElementById("PO_ART").value;
    cantidad = document.getElementById("PO_CANT").value;
    precio = document.getElementById("PO_PRECIO").value;
    fsolicitud = document.getElementById("PO_FCOMPRA").value;
    fentrega = document.getElementById("PO_FCLIENTE").value

    // location.href="reporte04_alumnos_una_carrera.php?car="+car;
    location.href="../includes/functions_autorizaciones.php?MA_VTA=1&folioRO="+folioRO+"&idOrden="+orden+"&folio="+folio+"&articulo="+articulo+"&cantidad="+cantidad+"&precio="+precio+"&fsolicitud="+fsolicitud+"&fentrega="+fentrega;


}