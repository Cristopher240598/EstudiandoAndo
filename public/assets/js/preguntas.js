$(document).ready(function ()
{
    $('#botonBorrar').hide();
    var i = 1;
    $('#botonAgregarPregunta').click(function ()
    {
        $('#botonBorrar').show();
        $('#dynamic_field').append('<div class="form-group d-sm-flex align-items-sm-center borrarContenido" id="row' + i + '"><input class="form-control form-control-user " type="text" id="preguntaAgregada' + i + '" name="preguntaAgregada' + i + '" style="color: rgb(0,0,0);font-size: 18px;" placeholder="Pregunta abierta" required autocomplete="off" autofocus></div>');
        i++;
    });

    $(document).on('click', '.btn_remove', function ()
    {
        $('#botonBorrar').hide();
        $('div.borrarContenido').remove();
        i = 1;
    });

});