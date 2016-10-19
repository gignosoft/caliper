$(document).ready(function()
{
   // $('[data-toggle="tooltip"]').tooltip();
});

function cargaComboCiudad(url)
{
    var url = url;
    $.ajax({
        async:true,
        type: "GET",
        contentType: "application/x-www-form-urlencoded",
        url: url,
        success:cargaCombo,
        //timeout:10000,
        error:problemas
    });
}

function cargaCombo(datos)
{
    var x = $("#comboCiudad");
    x.html(datos);
}
function problemas()
{
    $("#comboCiudad").text('Problemas en el servidor.');
    return false;
}

function confirmarEliminar(url, dato, msj)
{
    var r = confirm(msj+" "+dato);
    if (r == true) {

        location.href=url;
    } else {
        return;
    }
}

/*|--------------------------------------------------------------------------
 | COMBO ASSET DINAMIC
 |------------------------------------------------------------------------*/
function cargaComboAsset(url)
{
    var url = url;
    $.ajax({
        async:true,
        type: "GET",
        contentType: "application/x-www-form-urlencoded",
        url: url,
        success:exitoAsset,
        //timeout:10000,
        error:problemas_asset
    });
}
function exitoAsset(datos)
{
    var x = $("#assets");
    x.html(datos);
}
function problemas_asset()
{
    $("#assets").text('Problemas en el servidor.');
    return false;
}






