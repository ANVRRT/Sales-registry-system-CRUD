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
