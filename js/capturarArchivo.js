const idsLabels = ["infoAgente", "infoAlmacen", "infoArtExistente", "infoArtVendido", "infoBloqueoCliente", "infoCantEntregada", "infoCliente", "infoCompania", "infoDirEntrega", "infoFactura", "infoInventario", "infoListPrecios"];

function changeDisplayText(popIndex) {
    const idsLabelsCopy = [...idsLabels];
    idsLabelsCopy.splice(popIndex, 1);

    for(var i=0; i<idsLabelsCopy.length; i++) {
        document.getElementById(idsLabelsCopy[i]).style.display="none";
    }
    
    document.getElementById(idsLabels[popIndex]).style.display="block";
}