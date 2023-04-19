$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.select2_general').select2({
        placeholder: "Seleccione una opción",
        dropdownParent: $("#form_modal")
    });

});

$("#form_lista").submit(function(event){
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission

    $.ajax({
        url : post_url,
        type: request_method,
        dataType: 'json',
        data : form_data
    }).done(function(response){ //
        if (response.res === 1){
            $('#form_modal').trigger("reset");
            $('#form_modal').modal('hide');
            table.draw();
        }else{
            /*let current_tab = "head-tab1";
            loadTab(current_tab,1);*/
        }



        //let current_tab = "head-tab1";
        //loadTab(current_tab,1);


        /*if (response === 1){
            swal.fire({
                type: 'success',
                title: 'Su trabajo ha sido guardado',
                showConfirmButton: false,
                timer: 2000
            });
            $('#form_modal').trigger("reset");
            $('#form_modal').modal('hide');
            table.draw();
        } else{
            swal.fire({
                type: 'error',
                title: 'El formulario de apertura ya fue generado!',
                showConfirmButton: false,
                timer: 2000
            });
        */


    });


});
