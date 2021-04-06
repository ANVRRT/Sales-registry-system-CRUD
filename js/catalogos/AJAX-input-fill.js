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
    // alert(entrada);
    url=url+"?listado="+listado+"&entrada="+entrada+"&entrada2="+entrada2;
    //alert(url);
    httpxml.onreadystatechange=stateck;
    httpxml.open("GET",url,true);
    httpxml.send(null);

}
function addArticulo(){
    //alert("Boton de agregar artículo");
}