var url = 'http://estudiandoando.com.devel';
window.addEventListener("load", function ()
{
    $('#buscadorMisForos').submit(function ()
    {
        $(this).attr('action', url + '/forums/my/' + $('#buscadorMisForos #buscarMisForos').val());
    });
    
    $('#buscadorForos').submit(function ()
    {
        $(this).attr('action', url + '/forums/forums/' + $('#buscadorForos #buscarForos').val());
    });

});
