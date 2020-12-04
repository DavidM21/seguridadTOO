$(function(){
    $('#departamento').on('change',onSelectMunicipio);
});

function onSelectMunicipio(){
    var idDepartamento = $(this).val();

    //AJAX
    $.get('api/crearEmpleado/'+idDepartamento+'', function(data){
        var html_select= '<option value="">Seleccione un municipio</option>';
        for (var i=0; i<data.length; i++)
            html_select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
        $('#municipio').html(html_select);
    });
}

