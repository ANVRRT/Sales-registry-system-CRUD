function AjaxFunction(listado,inputFieldGet,inputFieldPrint)
{
    
    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
    // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() 
    {
        if(httpxml.readyState==4)
        {
            document.getElementById(inputFieldPrint).innerHTML=httpxml.responseText;
            // alert(inputFieldPrint.innerHTML=httpxml.responseText);
        }
    }
    var url="../includes/functions_catalogos.php";
    var entrada = document.getElementById(inputFieldGet).value;
    // alert(entrada);
    url=url+"?listado="+listado+"&entrada="+entrada;
    //alert(url);
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);

}
function AjaxFunction2(listado,inputFieldGet,inputFieldGetO,inputFieldPrint)
{
    
    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
    // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() 
    {
        if(httpxml.readyState==4)
        {
            document.getElementById(inputFieldPrint).innerHTML=httpxml.responseText;
            // alert(inputFieldPrint.innerHTML=httpxml.responseText);
        }
    }
    var url="../includes/functions_catalogos.php";
    var entrada = document.getElementById(inputFieldGet).value;
    var entrada2 = document.getElementById(inputFieldGetO).value;
    url=url+"?listado="+listado+"&entrada="+entrada+"&entrada2="+entrada2;
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);

}

function AjaxFunction8(listado,inputFieldGet,inputFieldGetO,inputFieldGet1,inputFieldGet2,inputFieldGet3,inputFieldGet4,inputFieldGet5,inputFieldGet6,inputFieldPrint)
{  
    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
    // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() 
    {
        if(httpxml.readyState==4)
        {
            document.getElementById(inputFieldPrint).innerHTML=httpxml.responseText;
            // alert(inputFieldPrint.innerHTML=httpxml.responseText);
        }
    }
    var url="../includes/functions_catalogos.php";
    var entrada = document.getElementById(inputFieldGet).value;
    var entrada2 = document.getElementById(inputFieldGetO).value;
    var entrada3 = document.getElementById(inputFieldGet1).value;
    var entrada4 = document.getElementById(inputFieldGet2).value;
    var entrada5 = document.getElementById(inputFieldGet3).value;
    var entrada6 = document.getElementById(inputFieldGet4).value;
    var entrada7 = document.getElementById(inputFieldGet5).value;
    var entrada8 = document.getElementById(inputFieldGet6).value;
    url=url+"?listado="+listado+"&entrada="+entrada+"&entrada2="+entrada2+"&entrada3="+entrada3+"&entrada4="+entrada4+"&entrada5="+entrada5+"&entrada6="+entrada6+"&entrada7="+entrada7+"&entrada8="+entrada8;
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);

}

function Jdescuento() {
    var descuento = document.getElementById("descuento").value;
    var precio    = document.getElementById("precio").value;
    var impDesc   = (descuento/100) * precio;
    document.getElementById("impDesc").value = impDesc;
}
function AjaxFunctionValue(listado,inputFieldGet,inputFieldPrint)
{
    
    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
    // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateck() 
    {
        if(httpxml.readyState==4)
        {
            document.getElementById(inputFieldPrint).value=httpxml.responseText;
            // alert(inputFieldPrint.innerHTML=httpxml.responseText);
        }
    }
    var url="../includes/functions_admin.php";
    var entrada = document.getElementById(inputFieldGet).value;
    // alert(entrada);
    url=url+"?listado="+listado+"&entrada="+entrada;
    //alert(url);
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);

}

function updateCliente(){
    $("listaPrecios").removeAttr("required");
    $("nomCliente").removeAttr("required");
    $("estatus").removeAttr("required");
    $("divisa").removeAttr("required");
    $("limCredito").removeAttr("required");
    
    var lp=$("#listaPrecios").val();
    var nom=$("#nomCliente").val();
    var estatus=$("#estatus").val();
    var rep=$("#idRepresentante").val();
    var analista=$("#idAnalista").val();
    var lim=$("#limCredito").val();
    var salOrden=$("#saldoOrden").val();
    var salFact=$("#saldoFactura").val();
    var cliente=$("#idCliente").val();
    var fun='updateCliente'; 
    $.ajax({
        type:"POST",
        url:"../includes/functions_catalogos.php",
        data:{funcion:fun,listaPrecios:lp,nombreCliente:nom,estatusCliente:estatus,idRepresentante:rep,idAnalista:analista,limCredito:lim,
            saldoOrden:salOrden,saldoFactura:salFact,idCliente:cliente},
        success:function(response){
            
            if(response=="Actualizado exitosamente"){
                window.location.href = "../php/C_cliente.php?error=success";
            }
            else{
                window.location.href = "../php/C_cliente.php?error=error";
            }
            
        }
    });

    
}

function updateArtV(){
    $("stock").removeAttr("required");
    $("codAviso").removeAttr("required");
    $("udVta").removeAttr("required");
    var fol=$("#folio").val();
    var art=$("#idArticulo").val();
    var cliente=$("#idCliente").val();
    var cod=$("#codAviso").val();
    var uni=$("#udVta").val();
    var fun='updateArtV'; 
    $.ajax({
        type:"POST",
        url:"../includes/functions_catalogos.php",
        data:{funcion:fun,folio:fol,artV:art,codAviso:cod,udVta:uni,idCliente:cliente},
        success:function(response){
            
            if(response=="Actualizado exitosamente"){
                window.location.href = "../php/C_articuloVendido.php?error=success";
            }
            else{
                window.location.href = "../php/C_articuloVendido.php?error=error";
            }
            
        }
    });
}

function updateCantEnt(){
    $("posicion").removeAttr("required");
    $("fechaMov").removeAttr("required");
    $("hora").removeAttr("required");
    $("secuencia").removeAttr("required");
    var ord=$("#idOrden").val();
    var fol=$("#folio").val();
    var tipo=$("#tipoReg").val();
    var pos=$("#posicion").val();
    var fech=$("#fechaMov").val();
    var hor=$("#hora").val();
    var sec=$("#secuencia").val();
    var fun='updateCantEnt'; 
    $.ajax({
        type:"POST",
        url:"../includes/functions_catalogos.php",
        data:{funcion:fun,idOrden:ord,folio:fol,tipoReg:tipo,posicion:pos,fechaMov:fech,hora:hor,secuencia:sec},
        success:function(response){
            
            if(response=="Actualizado exitosamente"){
                window.location.href = "../php/C_cantidadE.php?error=success";
            }
            else{
                window.location.href = "../php/C_cantidadE.php?error=error";
            }
            
        }
    });
}


function estatusValidaciones(idOrden){
    var fun='checkValidaciones';
    var orden=document.getElementById(idOrden).value;
    
    $.ajax({
        type:"POST",
        url:"../includes/functions_catalogos.php",
        data:{funcion:fun,idOrden:orden},
        success:function(validaciones){
            var res = validaciones.split(",");
            if(res[0]=='1'){
                $("#vFac").prop( "checked", true );
            }
            if(res[1]=='1'){
                $("#vCxC").prop( "checked", true );
            }
            if(res[2]=='1'){
                $("#vVta").prop( "checked", true );
            }
            if(res[3]=='1'){
                $("#vCst").prop( "checked", true );
            }
            if(res[4]=='1'){
                $("#vIng").prop( "checked", true );
            }
            if(res[5]=='1'){
                $("#vPln").prop( "checked", true );
            }
            if(res[6]=='1'){
                $("#vFEC").prop( "checked", true );
            }
            
        }
    });

}



function altaOrden(){
    
    var com=$("#idCompania").val();
    var cliente=$("#idCliente").val();
    var orden=$("#idOrden").val();
    var dir=$("#dirEnt").val();
    var art=$("#idArticulo").val();
    var fol=$("#folio").val();
    var pre=$("#precio").val();
    var cant=$("#cantidad").val();
    var codigo=$("#codAviso").val();
    var uni=$("#udVta").val();
    var obs=$("#observaciones").val();
    var fecha=$("#fechaSol").val();
    var fun='A_Orden';
    $.ajax({
        type:"POST",
        url:"../includes/functions_orden.php",
        data:{A_Orden:fun,idCompania:com,idCliente:cliente,idOrden:orden,dirEnt:dir,idArticulo:art,folio:fol,
        precio:pre,cantidad:cant,codAviso:codigo,udVta:uni,observaciones:obs,fechaSol:fecha},
        success:function(response){
            if(response=="Error saldo"){
                window.location.href = "../php/O_capturar.php?error=successSaldoAlert";
                alert ("Orden capturada, se ha excedido el saldo del cliente");
            }
            if(response=="Error Orden"){
                window.location.href = "../php/O_capturar.php?error=sqlerrorOrden";
            }
            if(response=="Error Reporte"){
                window.location.href = "../php/O_capturar.php?error=sqlerrorReporte";  
            }
            if(response=="Error Art"){
                window.location.href = "../php/O_capturar.php?error=sqlerrorArt";  
            }
            if(response=="Success saldo"){
                window.location.href = "../php/O_capturar.php?error=success";  
            }
  
        }
    });
}