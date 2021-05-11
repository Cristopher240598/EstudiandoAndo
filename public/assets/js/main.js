var url = 'http://estudiandoando.com.devel';
window.addEventListener("load", function ()
{
    $('#buscadorTutoresPendientes').submit(function ()
    {
        $(this).attr('action', url + '/home/activate-tutor/pending/' + $('#buscadorTutoresPendientes #buscarTutoresPendientes').val());
    });

    $('#buscadorTutoresActivos').submit(function ()
    {
        $(this).attr('action', url + '/home/activate-tutor/active/' + $('#buscadorTutoresActivos #buscarTutoresActivos').val());
    });

    $('#buscadorTutoresInactivos').submit(function ()
    {
        $(this).attr('action', url + '/home/activate-tutor/removed/' + $('#buscadorTutoresInactivos #buscarTutoresInactivos').val());
    });

    $('#buscadorActividadesTutor').submit(function ()
    {
        $(this).attr('action', url + '/home/activities-tutor/' + $('#buscadorActividadesTutor #buscarActividadesTutor').val());
    });
    
//    $('#buscadorActividadesTutorado').submit(function ()
//    {
//        $(this).attr('action', url + '/home/activities-student/{schoolGrade}/' + $('#buscadorActividadesTutorado #buscarActividadesTutorado').val());
//    });

    $('#buscadorGradosEscolares').submit(function ()
    {
        $(this).attr('action', url + '/home/school-grades/' + $('#buscadorGradosEscolares #buscarGradosEscolares').val());
    });

});
