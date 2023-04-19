$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2_general').select2({
        placeholder: "Seleccione una opción"
    });

});


$("#form_general").submit(function(event){
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission

    $.ajax({
        url : post_url,
        type: request_method,
        dataType: 'json',
        data : form_data
    }).done(function(response) { //
        if(response.res === 0){
            swal.fire({
                icon: 'error',
                title: 'Error de sistema, comuniquese con el administrador',
                showConfirmButton: false,
                timer: 3000
            });
        }else if(response.res === 1){
            swal.fire({
                icon: 'success',
                title: 'Registro insertado correctamente',
                showConfirmButton: false,
                timer: 2000
            }).then(function(result) {
                if (response.type === 'new'){
                    window.location.href = HOST_URL + '/bancooxigeno/item/tab/' + response.id + '/update' ;
                }else{
                    let current_tab = "head-tab1";
                    loadTab(current_tab,1);
                }
            });
        }else if(response.res === 2){
            swal.fire({
                icon: 'warning',
                title: 'Registro duplicado! El Establecimiento ya fu registrado el dia de hoy',
                showConfirmButton: false,
                timer: 3000
            });
        }

    });


});

/*$("#id_departamento").on('change', function () {
    $("#id_establecimiento").prop("disabled", false);
    establecimiento($(this).val());
});

function establecimiento (id){
    $.get(HOST_URL + '/rhd/item/' + id + '/establecimiento', function (data) {
        $("#id_establecimiento").empty();
        $("#id_establecimiento").append("<option></option>");
        $.each(data, function () {
            $("#id_establecimiento").append($("<option></option>").val(this['id']).html(this['nombre']));
        });
    });
}*/
